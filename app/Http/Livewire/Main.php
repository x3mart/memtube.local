<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Seo;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use App\Models\Video;
use Illuminate\Support\Str;

class Main extends Component
{
    public $user, $videos, $viewed, $order, $videosCount, $meta;
    public $sort = 'date';
    public $limit = 8;
    public $search = '';
    public $mode = 'all';
    public $favorite;
    public $download;


    protected $listeners = ['setToFavorites', 'setToDownloads', 'favoriteCanceled', 'setSearch'];

    public function mount()
    {
        $this->setUserData();
        $this->meta = Seo::whereHas('page', function (Builder $query) {
            $query->where('slug', 'allvideosmainpage');
        })->first();
    }

    public function setUserData()
    {
        if(auth()->user()){
            $this->user = User::find(auth()->user()->id);
            // $this->viewed = $this->user->viewed;
            $this->favorite = $this->user->favorites;
            // dd($this->favorite);
        } else {
            // $this->viewed = session('viewed_112');
        }
    }

    public function favoriteCanceled()
    {
        $this->setUserData();
    }

    public function setToFavorites(){
        $this->setUserData();
        $this->resetLimit();
        $this->mode = 'favorite';
    }

    public function setToDownloads(){
        $this->setUserData();
        $this->resetLimit();
        $this->mode = 'download';
    }

    public function setToAll(){
        $this->setUserData();
        $this->resetLimit();
        $this->mode = 'all';
    }

    protected function resetLimit()
    {
        $this->limit = 8;
    }

    protected function getVideoList()
    {
        $this->setOrder();
        if($this->mode === 'favorite'){
            $allVideos = $this->user->favorites();
        }
        if($this->mode === 'download'){
            $allVideos = $this->user->downloads();
        }
        if($this->mode === 'all'){
            $allVideos = new  Video;
        }
        $constrain = $allVideos;
        if ($this->search) {
            $words = Str::of(trim($this->search))->explode(' ');
            foreach ($words as $word){
                $allVideos = Video::search($word)->constrain($constrain);
                $constrain = Video::whereIn('id', $allVideos->get()->pluck('id'));
            }
        }
        $this->videosCount = $constrain->count();
        $this->videos = $constrain
                        ->with('tags', 'page')
                        ->orderBy($this->order, 'DESC')
                        ->take($this->limit)
                        ->get();
    }

    protected function setOrder()
    {
        switch ($this->sort){
            case 'date':
                $this->order = 'created_at';
            break;
            case 'top':
                $this->order = 'views';
            break;
        }
    }

    public function moreVideos()
    {
        $this->limit = $this->limit + 8;
    }

    public function setSearch($tag)
    {
        $this->search = $tag;
    }

    public function render()
    {
        $this->getVideoList();

        return view('livewire.main')
            ->layout('layouts.main', ['meta' => $this->meta])
            ->slot('content');
    }
}

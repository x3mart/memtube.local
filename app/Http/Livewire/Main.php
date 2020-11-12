<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Video;

class Main extends Component
{
    public $user, $videos, $viewed, $order, $videosCount;
    public $sort = 'date';
    public $limit = 8;
    public $search = '';
    public $mode = 'all';
    protected $favorite;
    protected $download;


    protected $listeners = ['setToFavorites', 'setToDownloads'];

    public function mount()
    {
        $this->setUserData();
    }

    protected function setUserData()
    {
        if(auth()->user()){
            $this->user = User::find(auth()->user()->id);
            // $this->download = $this->user->downloads();
            $this->viewed = $this->user->viewed;
            // $this->favorite = $this->user->favorites();
        } else {
            $this->viewed = session('viewed_112');
        }
    }

    public function setToFavorites(){
        $this->mode = 'favorite';
    }

    public function setToDownloads(){
        $this->mode = 'download';
    }

    public function setToAll(){
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
            $this->resetLimit();
            $allVideos = $this->user->favorites();
        }
        if($this->mode === 'download'){
            $this->resetLimit();
            $allVideos = $this->user->downloads();;
        }
        if($this->mode === 'all'){
            $this->resetLimit();
            $allVideos = new  Video;
        }
        // dd($allVideos);
        $this->videos = $allVideos->where('title', 'like','%'.$this->search.'%')->orWhereHas('tags', function($query){
            $query->where('tag', 'like', $this->search.'%');
        })->with('tags')->get()->sortByDesc($this->order)->take($this->limit);
        $this->videosCount = $allVideos->count();
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

    public function render()
    {
        $this->getVideoList();
        
        return view('livewire.main');
    }
}

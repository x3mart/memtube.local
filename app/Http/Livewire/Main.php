<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Video;

class Main extends Component
{
    public $user, $videos, $downloads, $viewed, $favorites, $order, $videosCount;
    public $sort = 'date';
    public $limit = 8;
    public $search = '';

    public function mount()
    {
        session()->flash('viewed_112', true);
        $this->user = $this->setUserData();
    }

    protected function setUserData()
    {
        if(auth()->user()){
            $this->user = User::find(auth()->user()->id);
            $this->downloads = $this->user->downloads;
            $this->viewed = $this->user->viewed;
            $this->favorites = $this->user->favorites;
        } else {
            $this->viewed = session('viewed_112');
        }
    }

    protected function getVideoList()
    {
        $this->setOrder();
        $allVideos = Video::where('title', 'like','%'.$this->search.'%')->orWhereHas('tags', function($query){
            $query->where('tag', 'like', $this->search.'%');
        })->with('tags');
        $this->videos = $allVideos->get()->sortByDesc($this->order)->take($this->limit);
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

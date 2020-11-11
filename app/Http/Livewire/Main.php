<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Video;

class Main extends Component
{
    public $user, $videos, $search, $downloads, $viewed, $favorites, $order;
    public $sort = 'date';
    public $limit =8;

    public function mount()
    {
        session()->flash('viewed_112', true);
        $this->user = $this->setUserData();
        $this->setOrder();
        $this->getVideoList();

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
        $this->videos = Video::all()->sortByDesc($this->order)->take($this->limit);
    }

    protected function setOrder()
    {
        switch ($this->sort){
            case 'date':
                $this->order = 'created_at';
            break;
            case 'top':
                $this->order = 'viewed';
            break;
        }
    }

    public function moreVideos()
    {
        $this->limit = $this->limit = 8;
        $this->videos = $this->getVideoList();
    }

    public function render()
    {
        return view('livewire.main');
    }
}

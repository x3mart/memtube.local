<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Video;

class Main extends Component
{
    public $user, $videos, $search, $downloads, $viewed, $favorites;
    public $sort = 'date';

    public function mount()
    {
        $this->user = $this->setUserData();
        $this->videos = Video::all()->sortByDesc('created_at')->take(8);
    }

    protected function setUserData()
    {
        if(auth()->user()){
            $this->user = User::find(auth()->user()->id);
            $this->downloads = $this->user->downloads;
            $this->viewed = $this->user->viewed;
            $this->favorites = $this->user->favorites;
        }

    }

    public function render()
    {
        return view('livewire.main');
    }
}

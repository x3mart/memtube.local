<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Video;

class Main extends Component
{
    public $user, $videos, $search, $downloaded, $viewed, $favorite;
    public $sort = 'date';

    public function mount()
    {
        $this->user = $this->setUser();
        $this->videos = Video::all()->sortByDesc('created_at')->take(8);
    }

    protected function setUser()
    {

    }

    public function render()
    {
        return view('livewire.main');
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\Video;
use Livewire\Component;

class AdminVideoEdit extends Component
{
    public $videos, $title, $tags;


    public function mount()
    {
        $this->videos = Video::with('tags')->get();
    }

    public function render()
    {
        return view('livewire.admin-video-edit');
    }
}

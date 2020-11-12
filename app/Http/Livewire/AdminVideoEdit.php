<?php

namespace App\Http\Livewire;

use App\Models\Video;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminVideoEdit extends Component
{
    use WithFileUploads;

    public $videos, $title, $tags, $photo;

    protected $listeners = ['videoDeleted'];

    public function mount()
    {
        $this->checkIsAdmin();
        $this->getVideos();
    }

    protected function checkIsAdmin()
    {
        if(!!auth()->user() && !!auth()->user()->isAdmin){
            return true;
        }
        return redirect()->to('/');
    }

    protected function getVideos()
    {
        $this->videos = Video::with('tags')->get();
    }

    public function videoDeleted()
    {
        $this->videos = $this->getVideos();
    }

    public function saveNewVideo()
    {
        // dd($this->video);
        $this->photo->store('photos');
    }

    public function render()
    {
        return view('livewire.admin-video-edit');
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\Video;
use Livewire\Component;

class AdminVideoEdit extends Component
{
    public $videos, $tags;

    protected $listeners = ['videoDeleted', 'videoCreated'];

    public function mount()
    {
        $this->checkIsAdmin();
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

    }

    public function videoCreated()
    {
        
    }

    public function render()
    {
        $this->getVideos();
        return view('livewire.admin-video-edit');
    }
}

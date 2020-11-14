<?php

namespace App\Http\Livewire;

use App\Models\Video;
use Livewire\Component;
use Livewire\WithPagination;

class AdminVideoEdit extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $tags;

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

    // protected function getVideos()
    // {
    //     $this->videos =
    // }

    public function videoDeleted()
    {

    }

    public function videoCreated()
    {

    }

    public function render()
    {
        return view('livewire.admin-video-edit',
        ['videos' => Video::with('tags')
                    ->orderBy('created_at','DESC')
                    ->paginate(8)]);
    }
}

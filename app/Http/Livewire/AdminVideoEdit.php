<?php

namespace App\Http\Livewire;

use App\Models\Video;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class AdminVideoEdit extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search, $showEditSeo = false;

    protected $listeners = ['videoDeleted', 'videoCreated', 'endEditSeo'];

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

    protected function getVideoList()
    {
        $constrain = new Video;
        if ($this->search) {
            $words = Str::of(trim($this->search))->explode(' ');
            foreach ($words as $word){
                $this->videos = Video::search($word)->constrain($constrain);
                $constrain = Video::whereIn('id', $this->videos->get()->pluck('id'));
            }
        }
        $this->videos = $constrain->with('tags')->orderBy('created_at','DESC');
    }

    public function endEditSeo()
    {
        $this->showEditSeo = false;
    }

    public function editSeo()
    {
        $this->showEditSeo = true;
    }

    public function videoDeleted()
    {

    }

    public function videoCreated()
    {

    }

    public function render()
    {
        $this->getVideoList();
        return view('livewire.admin-video-edit',
        ['videos' => $this->videos->paginate(20)])
                    ->layout('layouts.app')
                    ->slot('content');
    }
}

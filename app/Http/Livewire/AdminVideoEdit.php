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

    public $tags, $search;

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

    protected function getVideoList()
    {
        $tags = Str::of($this->search)->explode(' ');
        $this->videos = Video::where('title', 'like','%'.Str::lower($this->search).'%')->orWhereHas('tags', function($query) use ($tags){
            $query->whereIn('tag', $tags);
        });
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
        ['videos' => $this->videos->with('tags')
                    ->orderBy('created_at','DESC')
                    ->paginate(8)])
                    ->extends('layouts.app')
                    ->section('content');
    }
}

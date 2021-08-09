<?php

namespace App\Http\Livewire;

use App\Models\Page;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class SingleVideo extends Component
{
    public $meta, $slug, $isFavorite, $favorites, $mode, $video, $page;

    public function mount($slug)
    {
        $this->page = Page::where('slug', $slug)->first();
        $this->video = $this->page->video;
        $this->meta = $this->page->seo;
        $this->isFavorite = $this->checkIsFavorite();
    }

    protected function checkIsFavorite()
    {
        if(!auth()->user()){
            return false;
        }
        return auth()->user()->favorites->contains($this->video);
    }

    public function toogleFavorite()
    {
        if(!!$this->isFavorite){
            $this->video->inFavorite()->detach();
            $this->isFavorite = false;
            if($this->mode == 'favorite'){
                $this->emitUp('favoriteCanceled');
            }
        } else {
            $this->video->inFavorite()->attach(auth()->user());
            $this->isFavorite = true;
        }
    }

    public function export()
    {
        if(!$this->video->whoDownloads->contains(auth()->user())){
            $this->video->whoDownloads()->attach(auth()->user());
        }
        return Storage::disk('local')->download($this->video->path);
    }

    public function increment()
    {
        $this->video->views = $this->video->views + 1;
        $this->video->save();
    }

    public function render()
    {
        return view('livewire.single-video', ['video' => $this->video, 'page' => $this->page])
            ->layout('layouts.main', ['meta' => $this->meta])
            ->slot('content');;
    }
}

<?php

namespace App\Http\Livewire\Main;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class CardVideo extends Component
{
    public $video;
    public $favorites;
    public $isFavorite;
    public $mode;

    public function mount()
    {
        $this->isFavorite = $this->checkIsFavorite();
    }


    protected function checkIsFavorite()
    {
        if(!auth()->user()){
            return false;
        }
        return $this->favorites->contains($this->video);
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
        return view('livewire.main.card-video');
    }
}

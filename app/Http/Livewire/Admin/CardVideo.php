<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class CardVideo extends Component
{
    public $video, $tag, $title, $titleEdit;

    public function editTitle()
    {
        $this->title = $this->video->title;
        $this->titleEdit = true;
    }

    public function saveTitle()
    {
        $this->video->title = $this->title;
        $this->video->save();
        $this->titleEdit = false;
    }

    public function deleteTag($tag)
    {
        $this->video->tags()->detach($tag);
    }

    public function deleteVideo()
    {
        DB::transaction(function () {
            $downloads = $this->video->whoDownloads()->pluck('id');
            $favorites = $this->video->inFavorite()->pluck('id');
            $tags = $this->video->tags()->pluck('id');
            $this->video->tags()->detach($tags);
            $this->video->whoDownloads()->detach($downloads);
            $this->video->inFavorite()->detach($favorites);
            Storage::delete($this->video->path);
            $this->video->delete();
        });
        $this->emitUp('videoDeleted');
    }

    public function render()
    {
        return view('livewire.admin.card-video');
    }
}

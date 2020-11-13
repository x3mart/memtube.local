<?php

namespace App\Http\Livewire\Admin;

use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;

class CardVideo extends Component
{
    public $video, $tag, $title, $titleEdit, $tags, $addTags;

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
        $this->video->load('tags');
    }

    public function addTags()
    {
        $tagsNames = Str::of($this->tags)->explode(' ');
        foreach ($tagsNames as $item){
            if($item != '' && !$this->video->tags()->where('tag', $item)->first()){
                if(!Tag::where('tag', $item)->first()){
                    $tag = Tag::create(['tag' => $item]);
                } else {
                     $tag = Tag::where('tag', $item)->first();
                }
                $this->video->tags()->attach($tag);
            }
        }
        $this->video->load('tags');
        $this->addTags = false;
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

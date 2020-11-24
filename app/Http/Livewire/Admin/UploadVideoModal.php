<?php

namespace App\Http\Livewire\Admin;

use App\Models\Tag;
use App\Models\Video;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

use Livewire\Component;

class UploadVideoModal extends Component
{
    use WithFileUploads;

    public $video, $title, $tags;
    public $showModal = false;

    protected $listeners = ['createVideo'];

    public function saveNewVideo()
    {
        $this->validate([
            'video' => 'mimes:mp4,mp4v,mpg4,mkv|required',
            'title' => 'string|required',
            'tags'  => 'string|nullable',
        ]);
        $img = $this->video->storeAs('video', Str::of($this->title)->slug('_').'_'.time().'.'.$this->video->getClientOriginalExtension());
        $newVideo = Video::create(['title' => Str::lower($this->title), 'path' => $img, 'slug' => $img]);
        $tagsNames = Str::of($this->tags)->explode(' ')->filter();
        foreach ($tagsNames as $item){
            if(!Tag::where('tag', $item)->first()){
                $tag = Tag::create(['tag' => $item]);
            } else {
                $tag = Tag::where('tag', $item)->first();
            }
            $newVideo->tags()->attach($tag);
        }
        $this->showModal = false;
        $this->emitUp('videoCreated');
    }

    public function createVideo()
    {
        $this->showModal = true;
    }

    public function render()
    {
        return view('livewire.admin.upload-video-modal');
    }
}

<?php

namespace App\Http\Livewire\Admin;

use App\Models\Tag;
use App\Models\Video;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;
use FFMpeg\Format\Video\X264;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
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
            'video' => 'required|file|mimetypes:video/mp4,video/mpeg,video/x-matroska,video/quicktime,video/x-flv,video/3gpp,video/x-msvideo,video/x-ms-wmv,video/x-ms-asf',
            'title' => 'string|required',
            'tags'  => 'string|nullable',
        ]);
        $name = Str::of($this->title)->slug('_').'_'.time();
        $loadedVideo = $this->video->storeAs('video', $name.'.'.$this->video->getClientOriginalExtension());
        if ($this->video->getMimeType() != 'video/mp4'){
            FFMpeg::open($loadedVideo)
                    ->export()
                    ->toDisk('video')
                    ->inFormat(new X264('aac'))
                    ->save($name.'.mp4');
            Storage::delete($loadedVideo);
        }
        $newVideo = Video::create(['title' => Str::lower($this->title), 'path' => 'video/'.$name.'.mp4', 'slug' => $name, 'views' => 0]);
        $media = FFMpeg::open($newVideo->path);
        $duration = $media->getDurationInSeconds();
        $media->getFrameFromSeconds($duration/2)
                ->export()
                ->toDisk('thumbnails')
                ->save($name.'.jpg');
        $img = Image::make('thumbnails/'.$newVideo->slug.'.jpg');
        $img ->resize(255, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save();
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

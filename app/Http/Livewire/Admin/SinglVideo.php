<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;


class SinglVideo extends Component
{
    use WithFileUploads;

    public $page, $title, $page_video_id, $video, $page_seo, $photo;

    public function mount($video)
    {
        $this->showPageModal=true;
        $this->video = $video;
        $this->page = $this->get_page();
        $this->title = $this->get_title();
        $this->page_seo = $this->get_seo();
    }

    public function get_page()
    {
        if (!!$this->video->page) {
            return $this->video->page;
        }
        $page = $this->video->page()->create([
            'title' => $this->video->title,
            'slug' => $this->video->slug,
        ]);
        return $page;
    }

    public function get_title(){
        return $this->page->title;
    }

    public function get_seo()
    {
        if (!!!$this->page->seo){
            return $this->page->seo()->create();
        }
        return $this->page->seo;
    }

    protected $messages = [
        'title.unique' => 'Страница с таким названием уже существует.',
    ];

    protected $rules = [
            'title' => 'required|unique:pages',
            'page.body' => 'string',
            'page_seo.title' => 'string',
            'page_seo.keywords' => 'string',
            'page_seo.description' => 'string',
        ];


    public function savePage()
    {
        $this->validate([
            'title' => 'required|unique:pages,title,'.$this->page->id,
            'page.body' => 'string',
            'page_seo.title' => 'string',
            'page_seo.keywords' => 'string',
            'page_seo.description' => 'string',
        ]);
        $this->page->slug = Str::of($this->title)->slug('-');
        $this->page->title = $this->title;
        $this->page->update();
        $this->page_seo->save();
        $this->endEditPage();
    }

    public function endEditPage()
    {
        $this->emitUp('endEditPage');
    }

    public function savePhoto()
    {
        $this->validate([
            'photo' => 'image|max:20480', // 20MB Max
        ]);
        $this->link = $this->photo->store('summernote');
        $img = Image::make($this->link);
        if ($img->width() > 800){
            $img->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save();
        }
        $this->emit('photoSaved', $this->link);
    }

    public function deletePhoto($name)
    {
        Storage::delete($name);
    }

    public function render()
    {
        return view('livewire.admin.singl-video');
    }
}

<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Page;
use App\Models\Seo;
use Illuminate\Database\Eloquent\Builder;

class VideoSeo extends Component
{
    public $meta;

    public function mount()
    {
        $this->meta = $this->get_meta();
    }

    public function get_meta()
    {
        $meta = Seo::whereHas('page', function (Builder $query) {
            $query->where('slug', 'allvideosmainpage');
        })->first();
        if (!$meta){
            $page = Page::create([
                'title' => 'allvideosmainpage',
                'slug' => 'allvideosmainpage',
            ]);
            $meta = $page->seo()->create();
        }
        return $meta;
    }

    protected $rules = [
        'meta.title' => 'string',
        'meta.description' => 'string',
        'meta.keywords' => 'string',
    ];

    public function saveSeo()
    {
        $this->meta->save();
        $this->emitUp('endEditSeo');
    }

    public function cancelEditSeo()
    {
        $this->emitUp('endEditSeo');
    }

    public function render()
    {
        return view('livewire.admin.video-seo');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'path',
        'slug',
        'views',
    ];

    use Searchable;

    public $asYouType = true;

    public function toSearchableArray()
    {
        $array = [
            'id' => $this->id,
            'title' => $this->title,
            'tags' => $this->tags()->get(['tag'])->implode('tag', ' ')
        ];

        return $array;
    }


    /**
     * Get that Video's Tags.
     */
    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'videos_tags');
    }

    /**
     * Get Users who haves this Video in favorites
     */
    public function inFavorite()
    {
        return $this->belongsToMany('App\Models\User', 'favorites');
    }

    /**
     * Get Users who downloads this Video
     */
    public function whoDownloads()
    {
        return $this->belongsToMany('App\Models\User', 'downloads');
    }

    /**
     * Get Users who views this Video
     */
    public function whoViews()
    {
        return $this->belongsToMany('App\Models\User', 'views');
    }
}

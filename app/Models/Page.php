<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'body',
    ];

    public function seo()
    {
        return $this->hasOne(Seo::class);
    }

    public function video()
    {
        return $this->belongsTo(Video::class);
    }
}

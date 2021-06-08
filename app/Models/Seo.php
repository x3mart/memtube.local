<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'keywords',
        'description',
    ];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}

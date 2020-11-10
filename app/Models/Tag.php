<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'tag',
    ];

    /**
     * Get Viodeos that haves this Tag
     */
    public function videos()
    {
        return $this->belongsToMany('App\Models\Video');
    }
}

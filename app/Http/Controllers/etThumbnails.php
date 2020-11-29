<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;

class etThumbnails extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $videos = Video::all();

    foreach ($videos as $video) {
        $media = FFMpeg::open($video->path);
        $duration = $media->getDurationInSeconds();
        $media->getFrameFromSeconds($duration/2)
                ->export()
                ->toDisk('thumbnails')
                ->save($video->slug.'.png');
    }
    }
}

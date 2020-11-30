<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;
use Intervention\Image\Facades\Image;


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
            $media->getFrameFromSeconds(floor($duration/2))
                    ->export()
                    ->toDisk('thumbnails')
                    ->save($video->slug.'.jpg');
            $media = null;
            $img = Image::make('thumbnails/'.$video->slug.'.jpg');
            $img ->resize(255, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save();
            $img = null;
        }
        return redirect()->route('admin');
    }

}

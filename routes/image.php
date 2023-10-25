<?php

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use Intervention\Image\Facades\Image;

Route::get('resize/{src}/{filename}/{w?}/{h?}', function($src, $filename, $w=100, $h=100){
    $filepath = null;
    switch($src){
        case 'image':
            $filepath = 'files/image/' . $filename;
            break;
    }
    $mime = getimagesize($filepath)['mime'];
    $extension = pathinfo($filepath, PATHINFO_EXTENSION);
    $cacheimage = Image::cache(function($image) use($src, $filepath, $w, $h, $extension){
        return $image->make($filepath)->resize(500, $w, function ($constraint) {
            $constraint->aspectRatio();
        })->encode($extension, 90);

    },10); // cache for 10 minutes
    return Response::make($cacheimage, 200, array('Content-Type' => $mime));
});

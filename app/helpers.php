<?php

if(! function_exists('uploadImage')) {
    function uploadImage($image, $path) {
        $img = Image::make($image->path());
        $img->fit(1000, 1000, function ($const) {
            $const->aspectRatio();
        });
        $img->save(storage_path($path), 100);
    }
}

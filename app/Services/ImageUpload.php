<?php

namespace App\Services;


use Intervention\Image\Facades\Image;

class ImageUpload
{
    public static function upload($path, $width, $height)
    {
        Image::make($path)->resize($width, $height)->save();
    }
}

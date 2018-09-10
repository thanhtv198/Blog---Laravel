<?php

namespace App\Traits;

trait UploadFileTrait
{
    public function uploadImage($image, $path)
    {
        if (!is_null($image)) {
            $image->move($path);
        }
    }
}
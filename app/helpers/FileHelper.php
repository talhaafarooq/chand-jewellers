<?php

namespace App\helpers;

class FileHelper
{
    public static function uploadFile($file, $path)
    {
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs($path, $fileName, 'public');
        $picture = $path . '/' . $fileName;
        return $picture;
    }
}

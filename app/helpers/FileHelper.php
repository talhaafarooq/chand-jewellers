<?php

namespace App\helpers;

use Illuminate\Support\Facades\Storage;

class FileHelper
{
    public static function uploadFile($file, $path)
    {
        // $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
        // $file->storeAs($path, $fileName, 'public');
        // $picture = $path . '/' . $fileName;
        // return $picture;
        $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
        // $file->move(base_path('uploads/'.$path), $fileName);
        $file->move(public_path('uploads/'.$path), $fileName);
        $picture = 'uploads/'. $path . '/' . $fileName;
        return $picture;
    }

    public static function removeFile($filePath)
    {
        if (Storage::exists('public/'.$filePath)) {
            Storage::delete('public/'.$filePath);
        }
    }
}

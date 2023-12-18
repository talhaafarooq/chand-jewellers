<?php

namespace App\Observers;

use App\helpers\FileHelper;
use App\Models\SubCategory;

class SubCategoryObserver
{
    public function deleting(SubCategory $subCategory)
    {
        FileHelper::removeFile($subCategory->image);
        $subCategory->products()->productImages()->delete();
        $subCategory->products()->delete();
    }
}

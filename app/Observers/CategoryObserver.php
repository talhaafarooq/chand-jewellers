<?php

namespace App\Observers;

use App\helpers\FileHelper;
use App\Models\Category;

class CategoryObserver
{
    public function deleting(Category $category)
    {
        FileHelper::removeFile($category->image);
        $category->subCategories()->delete();
    }
}

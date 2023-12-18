<?php

namespace App\Observers;

use App\helpers\FileHelper;
use App\Models\Category;

class CategoryObserver
{
    public function deleting(Category $category)
    {
        FileHelper::removeFile($category->image);

        // Delete related product images
        $category->products->each(function ($product) {
            $product->productImages()->delete();
        });

        // Delete related products
        $category->products()->delete();

        // Delete related subcategories
        $category->subCategories()->delete();
    }
}

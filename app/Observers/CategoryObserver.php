<?php

namespace App\Observers;

use App\helpers\FileHelper;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryObserver
{
    public function creating(Category $category)
    {
        $category->slug = Str::slug($category->name);
    }

    public function deleting(Category $category)
    {
        FileHelper::removeFile($category->image);
        // Delete related subcategories
        $category->subCategories()->delete();

        // Delete related products
        $category->products()->delete();

        // Delete related product images
        $category->products->each(function ($product) {
            $product->productImages()->delete();
            $product->orderDetails()->delete();
            $product->orderDetails->each(function ($orderDetail) {
                $orderDetail->order()->delete();
            });
        });
    }
}

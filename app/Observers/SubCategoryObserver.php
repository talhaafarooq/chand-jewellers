<?php

namespace App\Observers;

use App\helpers\FileHelper;
use App\Models\SubCategory;

class SubCategoryObserver
{
    public function deleting(SubCategory $subCategory)
    {
        FileHelper::removeFile($subCategory->image);
        // Delete related products
        $subCategory->products()->delete();

        // Delete related product images
        $subCategory->products->each(function ($product) {
            $product->productImages()->delete();
            $product->orderDetails()->delete();
            $product->orderDetails->each(function ($orderDetail) {
                $orderDetail->order()->delete();
            });
        });
    }
}

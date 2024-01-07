<?php

namespace App\Observers;

use App\Models\Product;

class ProductObserver
{
    public function deleting(Product $product){
        $product->productImages()->delete();
        $product->wishlists()->delete();

        // Delete associated orderDetails records
        $product->orderDetails()->delete();

        // Delete associated order records
        $product->orderDetails->each(function ($orderDetail) {
            $orderDetail->order()->delete();
        });
    }
}

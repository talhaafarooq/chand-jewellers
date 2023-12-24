<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function addToWishlist($productId){
        $product = Product::findOrFail($productId);
        $checkWistlistExist = Wishlist::where('product_id',$product->id)->where('user_id',auth()->user()->id)->exists();
        if(!$checkWistlistExist)
        {
            Wishlist::create([
                'product_id'=>$product->id,
                'user_id'=>auth()->user()->id
            ]);
            return redirect()->back()->with('success','Product added to wishlist!');
        }else{
            return redirect()->back()->with('success','Product added to wishlist!');
        }
    }
}

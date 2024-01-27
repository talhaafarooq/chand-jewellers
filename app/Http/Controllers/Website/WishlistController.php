<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function wishlist()
    {
        $wishlistProducts = Wishlist::with('product:id,name,slug,front_img,new_price')->where('user_id',auth()->user()->id)->get();
        return view('website.wishlist',compact('wishlistProducts'));
    }

    public function addToWishlist($productSlug){
        $product = Product::whereSlug($productSlug)->firstOrFail();
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

    public function removeItemToWishlist($productId){
        $product = Product::findOrFail($productId);
        $checkWistlistExist = Wishlist::where('product_id',$product->id)->where('user_id',auth()->user()->id)->firstOrFail();
        if($checkWistlistExist)
        {
            $checkWistlistExist->delete();
            return redirect()->back()->with('success','Item deleted to wishlist!');
        }else{
            return redirect()->back()->with('failure','Item Not Found!');
        }
    }
}

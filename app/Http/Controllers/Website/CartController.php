<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'slug' => 'required|exists:products,slug',
            'qty'=>'required|numeric'
        ]);
        if($validator->fails())
        {
            return redirect()->back()->with('failure','Something went wrong!');
        }

        $product = Product::where('slug',$request->slug)->firstOrFail();
        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'quantity' => $request->qty,
            'price' => $product->new_price == null ? 0 : $product->new_price,
            'attributes' => array(
                'image' => $product->front_img,
                'slug' => $product->slug,
            )
        ]);
        return redirect()->back()->with('success','Item add to cart successfully!');
    }
}

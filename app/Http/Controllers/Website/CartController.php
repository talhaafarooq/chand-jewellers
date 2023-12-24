<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Settings;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function cart()
    {
        $settings = Settings::select('currency','shipping')->first();
        return view('website.cart',compact('settings'));
    }

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

    public function updateCart(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'slugs' => 'required|array',
            'slugs.*'=>'exists:products,slug',
            'qty'=>'required|array',
            'qty.*'=>'numeric'
        ]);
        if($validator->fails())
        {
            return redirect()->back()->with('failure','Something went wrong!');
        }

        
        $cart = Cart::getContent();
        for ($i = 0; $i < count($request->slugs); $i++) {
            $product = Product::where('slug',$request->slugs[$i])->firstOrFail();
            $cart[$product->id]->quantity = $request->qty[$i];
        }
        return redirect()->back()->with('success','Cart updated successfully!');
    }

    public function removeCart($slug)
    {
        $product = Product::where('slug',$slug)->firstOrFail();
        Cart::remove($product->id);
        return redirect()->back()->with('success','Cart Item deleted successfully!');
    }
}

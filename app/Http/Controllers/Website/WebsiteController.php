<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Settings;
use App\Models\Subscribers;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        $settings = Settings::select('currency')->first();
        $newArrivalProducts = Product::select('name','slug','front_img','back_img','old_price','new_price')->take(12)->orderBy('id','desc')->get();
        return view('website.index',compact('settings','newArrivalProducts'));
    }

    public function aboutUs()
    {
        return view('website.about');
    }

    public function contactUs()
    {
        return view('website.contact');
    }

    public function subscribeWebsite(Request $request)
    {
        $validation = $this->validate($request, [
            'email' => 'required'
        ]);

        if($validation)
        {
            $subscriber = Subscribers::where('email', $request->email)->count();
            if ($subscriber == 0) {
                Subscribers::create(['email' => $request->email]);
            }
            return redirect()->back()->with('success', 'Subscribe successfully');
        }else{
            return redirect()->back()->with('failure', 'Something went wrong.');
        }
    }

    public function productDetails($slug)
    {
        $product = Product::with('category:id,name','subCategory:id,name','productImages')->where('slug',$slug)->firstOrFail();
        $settings = Settings::select('currency')->first();
        return view('website.product-detail',compact('product','settings'));
    }
}

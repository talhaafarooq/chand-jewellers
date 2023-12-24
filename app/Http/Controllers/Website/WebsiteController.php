<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Subscribers;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        $products = Product::take(12)->orderBy('id','desc')->get();
        return view('website.index',compact('products'));
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
}

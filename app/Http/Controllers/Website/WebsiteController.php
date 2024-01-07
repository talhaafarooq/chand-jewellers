<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\ContactUs;
use App\Models\Product;
use App\Models\Subscribers;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        $newArrivalProducts = Product::select('id', 'name', 'slug', 'front_img', 'back_img', 'old_price', 'new_price')
            ->where('status', 0)
            ->take(12)
            ->orderByDesc('id')
            ->get();
        return view('website.index', compact('newArrivalProducts'));
    }

    public function aboutUs()
    {
        return view('website.about');
    }

    public function contactUs()
    {
        return view('website.contact');
    }

    public function sendContactMessage(ContactRequest $request)
    {
        ContactUs::create($request->only('name', 'email', 'subject', 'message'));
        return redirect()->back()->with('successs',"Hello $request->name! Your message has been received. We will get back to you at email.");
    }

    public function subscribeWebsite(Request $request)
    {
        $validation = $this->validate($request, [
            'email' => 'required'
        ]);

        if ($validation) {
            $subscriber = Subscribers::where('email', $request->email)->count();
            if ($subscriber == 0) {
                Subscribers::create(['email' => $request->email]);
            }
            return redirect()->back()->with('success', 'Subscribe successfully');
        } else {
            return redirect()->back()->with('failure', 'Something went wrong.');
        }
    }

    public function productDetails($slug)
    {
        $product = Product::with('category:id,name', 'subCategory:id,name', 'productImages')
            ->where('slug', $slug)
            ->where('status', 0)
            ->firstOrFail();
        return view('website.product-detail', compact('product'));
    }
}

<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\FeedbackRequest;
use App\Models\ContactUs;
use App\Models\Feedback;
use App\Models\Product;
use App\Models\Subscribers;
use Illuminate\Http\Request;
use Cart;

class WebsiteController extends Controller
{
    public function index()
    {
        $newArrivalProducts = Product::select('id', 'name', 'slug', 'front_img', 'back_img', 'old_price', 'new_price')
            ->status(0)
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
        ContactUs::create($request->only('name', 'email', 'subject', 'cell_no', 'message'));
        return redirect()->back()->with('successs', "Hello $request->name! Your message has been received. We will get back to you at email.");
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
            ->with(['feedbacks' => function ($query) {
                $query->orderByDesc('id');
            }])
            ->where('slug', $slug)
            ->where('status', 0)
            ->firstOrFail();
        $relatedProducts = Product::select('id', 'name', 'slug', 'front_img', 'back_img', 'old_price', 'new_price')
            ->status(0)
            ->where('slug', '!=', $slug)
            ->take(12)
            ->orderByDesc('id')
            ->get();
        return view('website.product-detail', compact('product', 'relatedProducts'));
    }

    public function submitFeedback(Request $request)
    {
        if ($request->isMethod('POST')) {
            $validation = $this->validate($request, [
                'name' => 'required|min:1|max:255',
                'email' => 'required|min:1|max:255',
                'website' => 'sometimes|min:1|max:255',
                'rating' => 'required|min:1|max:255'
            ]);

            if ($validation) {
                Feedback::create($request->only('product_id', 'name', 'email', 'website', 'message', 'rating'));
                return redirect()->back()->with('success', 'Feedback posted successfully');
            } else {
                return redirect()->back()->with('failure', 'Something went wrong.');
            }
        } else {
            return redirect()->back()->with('failure', 'Something went wrong.');
        }
    }

    public function buyNow($slug)
    {
        $product = Product::where('slug', $slug)->status(0)->first();
        if($product)
        {
            Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'quantity' => 1,
                'price' => $product->new_price == null ? 0 : $product->new_price,
                'attributes' => array(
                    'image' => $product->front_img,
                    'slug' => $product->slug,
                )
            ]);
            return redirect()->route('website.checkout')->with('success','Item added to cart successfully!');
        }
        abort(404);
    }
}

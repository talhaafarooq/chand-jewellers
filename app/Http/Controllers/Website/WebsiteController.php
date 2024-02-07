<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Mail\SendForgotPasswordMail;
use App\Models\AboutUs;
use App\Models\Category;
use App\Models\ContactUs;
use App\Models\Feedback;
use App\Models\Order;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Subscribers;
use App\Models\User;
use Illuminate\Http\Request;
use Cart;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class WebsiteController extends Controller
{
    public function index(Request $request)
    {
        $newArrivalProducts = Product::select('id', 'name', 'slug', 'front_img', 'back_img', 'old_price', 'new_price')
            ->status(0)
            ->take(12)
            ->orderByDesc('id')
            ->get();
        $randomProducts = Product::select('id', 'name', 'slug', 'front_img', 'back_img', 'old_price', 'new_price')
            ->inRandomOrder()
            ->status(0)
            ->take(12)
            ->orderByDesc('id')
            ->get();
        $subcategoriesWithTotalProducts = SubCategory::withCount('products as totalProducts')->get();
        if ($request->has('category') && $request->category != null) {
            $category = Category::where('slug', $request->get('category'))->firstOrFail();
            $productByCategories = Product::select('id', 'name', 'slug', 'front_img', 'back_img', 'old_price', 'new_price')
                ->where('category_id', $category->id)
                ->inRandomOrder()
                ->status(0)
                ->take(12)
                ->orderByDesc('id')
                ->get();
        }
        if ($request->has('subcategory') && $request->subcategory != null) {
            $subCategory = SubCategory::where('slug', $request->get('subcategory'))->firstOrFail();
            $productByCategories = Product::select('id', 'name', 'slug', 'front_img', 'back_img', 'old_price', 'new_price')
                ->where('sub_category_id', $subCategory->id)
                ->inRandomOrder()
                ->status(0)
                ->take(12)
                ->orderByDesc('id')
                ->get();
        }
        return view('website.index', compact('newArrivalProducts', 'randomProducts', 'subcategoriesWithTotalProducts'));
    }

    public function aboutUs()
    {
        $aboutUs = AboutUs::findOrFail(1);
        return view('website.about', compact('aboutUs'));
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
            ->where('sub_category_id', $product->sub_category_id)
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
        if ($product) {
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
            return redirect()->route('website.checkout')->with('success', 'Item added to cart successfully!');
        }
        abort(404);
    }

    public function trackOrder(Request $request)
    {
        $order = null;
        $orderNo = null;
        $subTotal = null;
        $status = null;
        $trackingNo = null;
        $trackingCompany = null;
        if ($request->has('orderno')) {
            $order = Order::with('orderDetails.product')->where('order_no', $request->orderno)->firstOrFail();
            $subTotal = $order->orderDetails->sum('price');
            $orderNo = $request->orderno;
            $status = $order->status->value;
            $trackingNo = $order->tracking_no;
            $trackingCompany = $order->tracking_company;
        }
        return view('website.track-order', compact('order', 'subTotal', 'orderNo', 'status', 'trackingNo', 'trackingCompany'));
    }

    public function products(Request $request)
    {
        $products = array();
        if ($request->has('subcategory')) {
            $subcategory = SubCategory::where('slug', $request->get('subcategory'))->firstOrFail();
            $products = Product::where('sub_category_id', $subcategory->id)
                ->inRandomOrder()
                ->status(0)
                ->orderByDesc('id')
                ->get();
        }
        return view('website.category-subcategory-products', compact('subcategory', 'products'));
    }

    public function forgotPassword()
    {
        return view('auth.passwords.email');
    }

    public function verifyEmail(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|exists:users,email'
        ]);

        try {
            $user = User::where('email', $request->email)->firstOrFail();
            $code = rand(000000, 999999);

            Mail::to($user->email)->send(new SendForgotPasswordMail($user, $code)); // Replace with actual mailing logic
            // Mail::to('talhafarooq522446@gmail.com')->send(new SendForgotPasswordMail($user, $code)); // Replace with actual mailing logic
            DB::table('password_resets')->insert([
                'email' => $user->email,
                'token' => $code
            ]);

            return response()->json([
                'message' => 'Email successfully sent. Please check your email for instructions.',
                'status' => true
            ]);
        } catch (ValidationException $exception) {
            return response()->json([
                'message' => $exception->validator->getMessageBag()->toArray(),
                'status' => false
            ]);
        } catch (Exception $ex) {
            return response()->json([
                'message' => 'Email not sent. Please try again later.',
                'status' => false
            ]);
        }
    }

    public function verifyCode(Request $request)
    {
        $this->validate($request, [
            'code' => 'required|string|min:1|max:255|exists:password_resets,token'
        ],[
            'code.exists'=>'The entered code is invalid.'
        ]);

        $checkCode = DB::table('password_resets')->where('token', $request->code)->first();
        if ($checkCode) {
            return response()->json(['message' => '', 'status' => true]);
        } else {
            return response()->json(['message' => 'Entered code is invalid', 'status' => false]);
        }
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string|min:8|max:16',
            'confirm_password' => 'required|string|min:8|max:16|same:password'
        ]);

        try {
            DB::beginTransaction();

            DB::table('password_resets')->where('email', $request->email)->delete();
            User::where('email', $request->email)->update([
                'password' => bcrypt($request->password)
            ]);

            DB::commit();
            return response()->json(['message' => 'Password Successfully updated!', 'status' => true]);
        } catch (Exception $ex) {
            DB::rollback();
            return response()->json(['message' => 'Something went wrong!', 'status' => false]);
        }
    }
}

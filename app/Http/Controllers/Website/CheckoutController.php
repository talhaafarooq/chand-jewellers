<?php

namespace App\Http\Controllers\Website;

use App\Enums\RoleEnum;
use App\Events\SendEmailEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderCreateAccountRequest;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Models\Settings;
use App\Models\User;
use Cart;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;

class CheckoutController extends Controller
{
    public function checkoutView()
    {
        $totalItemsInCart = Cart::getContent();
        if (count($totalItemsInCart) > 0) {
            $settings = Settings::select('currency', 'shipping')->first();
            return view('website.checkout', compact('settings'));
        } else {
            return redirect()->back()->with('failure', 'Please add to cart 1 item!');
        }
    }

    public function orderSubmit(OrderCreateAccountRequest $request)
    {
        try {
            DB::beginTransaction();

            $userId = null;
            if (isset($request->create_account)) {
                $this->validate($request,[
                    'password'=>'required|min:8|max:16'
                ]);
                $data = [
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'phone_no' => $request->phone1,
                    'address' => $request->address1,
                    'email_verified_at' => now(),
                    'email' => $request->email,
                    'password' => $request->password,
                    'role' => RoleEnum::Customer,
                ];
                $user = User::create($data);
                $user->assignRole(RoleEnum::Customer);
                Auth::attempt(['email' => $request->email, 'password' => $request->password]);
                $userId = $user->id;
            }
            $order = new Order();
            $order->fname = $request->first_name;
            $order->lname = $request->last_name;
            $order->company = $request->company;
            $order->address1 = $request->address1;
            $order->address2 = $request->address2;
            $order->city = $request->city;
            $order->state = $request->state;
            $order->zipcode = $request->zipcode;
            $order->email = $request->email;
            $order->phone1 = $request->phone1;
            $order->phone2 = $request->phone2;
            $order->notes = $request->order_note;
            $order->user_id = $userId;
            $order->save();

            foreach (Cart::getContent() as $product) {
                $orderDetails = new OrderDetail();
                $orderDetails->order_id = $order->id;
                $orderDetails->product_id = $product->id;
                $orderDetails->qty = $product->quantity;
                $orderDetails->price = $product->price;
                $orderDetails->save();
            }

            Event::dispatch(new SendEmailEvent($request->email,"Order has been placed",$order->id));

            DB::commit();
            return redirect()->route('website.thanks',$order->id)->with('success', 'Order has been placed successfully!.');
        } catch (Exception $ex) {
            DB::rollback();
            return redirect()->back()->with('failure', 'Something went wrong! Try again');
            // return redirect()->back()->with('failure', $ex->getMessage());
        }
        $userId = null;
    }

    public function thanks($orderId)
    {
        $order = Order::with('orderDetails')->findOrFail($orderId);
        $settings = Settings::select('currency', 'shipping')->first();
        return view('website.thanks', compact('order','settings'));
    }
}

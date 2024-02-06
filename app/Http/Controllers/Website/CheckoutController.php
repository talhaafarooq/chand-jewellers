<?php

namespace App\Http\Controllers\Website;

use App\Enums\OrderStatusEnum;
use App\Enums\RoleEnum;
use App\helpers\SettingsHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderCreateAccountRequest;
use App\Mail\OrderConfirmMail;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Cart;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function checkoutView()
    {
        $totalItemsInCart = Cart::getContent();
        if (count($totalItemsInCart) > 0) {
            return view('website.checkout');
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
                $this->validate($request, [
                    'password' => 'required|min:8|max:16'
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

            $orderNo = 7000;
            $latestOrder = Order::orderBy('order_no', 'desc')->first();
            if ($latestOrder) {
                $orderNo = $latestOrder->order_no + 1;
            }

            $order = new Order();
            $order->fname = $request->first_name;
            $order->lname = $request->last_name;
            $order->company = $request->company;
            $order->address1 = $request->address1;
            $order->address2 = $request->address2;
            $order->city = $request->city;
            $order->state = $request->state;
            // $order->zipcode = $request->zipcode;
            $order->country = $request->country;
            $order->email = $request->email;
            $order->phone1 = $request->phone1;
            $order->phone2 = $request->phone2;
            $order->notes = $request->order_note;
            $order->user_id = $userId;
            $order->order_no = $orderNo;
            $order->shipping_charges = SettingsHelper::info()->shipping;
            $order->status = OrderStatusEnum::Received;
            $order->save();

            foreach (Cart::getContent() as $product) {
                $myProduct = Product::find($product->id);
                $orderDetails = new OrderDetail();
                $orderDetails->order_id = $order->id;
                $orderDetails->product_id = $myProduct->id;
                $orderDetails->qty = $product->quantity;
                $orderDetails->price = $product->price;
                $orderDetails->total = $product->price * $product->quantity;
                $orderDetails->save();
            }

            $orderWithUser = Order::select('id', 'order_no', 'user_id')->with('user:id,first_name,last_name')->find($order->id);
            // Mail::to("talhafarooq522446@gmail.com")->send(new OrderConfirmMail($orderWithUser));
            // Mail::to($request->email)->send(new OrderConfirmMail($orderWithUser));

            Cart::clear();
            DB::commit();
            return redirect()->route('website.thanks', $order->id)->with('success', 'Order has been placed successfully!.');
        } catch (Exception $ex) {
            DB::rollback();
            return redirect()->back()->with('failure', 'Something went wrong! Try again');
        }
    }

    public function thanks($orderId)
    {
        $order = Order::with('orderDetails.product')->findOrFail($orderId);
        $subTotal = $order->orderDetails->sum('price');
        return view('website.thanks', compact('order', 'subTotal'));
    }
}

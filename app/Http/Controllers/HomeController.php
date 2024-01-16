<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatusEnum;
use App\Enums\UserTypeEnum;
use App\Models\Order;
use App\Models\Product;
use App\Models\Subscribers;
use App\Models\Visitor;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function checkUserAuth()
    {
        if(auth()->user()->role == UserTypeEnum::Admin->value || auth()->user()->role == UserTypeEnum::AdminUser->value)
        {
            return redirect()->route('admin.dashboard');
        }else if(auth()->user()->role == 'customer')
        {
            return redirect()->route('website.home');
        }
        abort(404);
    }

    public function adminDashboard()
    {
        $totalOrders = Order::count();
        $totalSubscribers = Subscribers::count();
        $totalVisitors = Visitor::count();
        $totalOutOfStocksProducts = Product::where('qty','<',0)->count();
        $allOrders = Order::select('id', 'order_no', 'fname', 'lname', 'phone1', 'phone2','address1', 'status', 'user_id', 'created_at')
            ->withSum('orderDetails', 'price')
            ->with('user','orderDetails.product')
            ->orderBy('id', 'desc')
            ->take(5)
            ->paginate(5);
        $receivedOrders = Order::select('id', 'order_no', 'fname', 'lname', 'phone1', 'phone2','address1', 'status', 'user_id', 'created_at')
            ->withSum('orderDetails', 'price')
            ->with('user','orderDetails.product')
            ->where('status', OrderStatusEnum::Received)
            ->orderBy('id', 'desc')
            ->take(5)
            ->paginate(5);
        $dispatchOrders = Order::select('id', 'order_no', 'fname', 'lname', 'phone1', 'phone2','address1', 'status', 'user_id', 'created_at')
            ->withSum('orderDetails', 'price')
            ->with('user','orderDetails.product')
            ->where('status', OrderStatusEnum::Dispatched)
            ->orderBy('id', 'desc')
            ->take(5)
            ->paginate(5);
        $cancelOrders = Order::select('id', 'order_no', 'fname', 'lname', 'phone1', 'phone2','address1', 'status', 'user_id', 'created_at')
            ->withSum('orderDetails', 'price')
            ->with('user','orderDetails.product')
            ->where('status', OrderStatusEnum::Cancelled)
            ->orderBy('id', 'desc')
            ->take(5)
            ->paginate(5);
        $deliveredOrders = Order::select('id', 'order_no', 'fname', 'lname', 'phone1', 'phone2','address1', 'status', 'user_id', 'created_at')
            ->withSum('orderDetails', 'price')
            ->with('user','orderDetails.product')
            ->where('status', OrderStatusEnum::Delivered)
            ->orderBy('id', 'desc')
            ->take(5)
            ->paginate(5);
        return view('admin.dashboard',
        compact(
            'totalOrders',
            'totalSubscribers',
            'totalVisitors',
            'totalOutOfStocksProducts',
            'allOrders',
            'receivedOrders',
            'dispatchOrders',
            'cancelOrders',
            'deliveredOrders'
        ));
    }
}

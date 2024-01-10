<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatusEnum;
use App\Models\Category;
use App\Models\ContactUs;
use App\Models\Order;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Subscribers;
use App\Models\Visitor;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function adminDashboard()
    {
        $totalOrders = Order::count();
        $totalSubscribers = Subscribers::count();
        $totalVisitors = Visitor::count();
        $totalOutOfStocksProducts = Product::where('alert_qty','<',0)->count();
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

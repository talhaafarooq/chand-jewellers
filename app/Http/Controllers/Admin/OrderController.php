<?php

namespace App\Http\Controllers\Admin;

use App\Enums\OrderStatusEnum;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OrderUpdateRequest;
use App\Models\OrderDetail;

class OrderController extends Controller
{
    public function index()
    {
        $allOrders = Order::select('id', 'order_no', 'fname', 'lname', 'phone1', 'phone2', 'status', 'user_id', 'created_at')
            ->withSum('orderDetails', 'price')
            ->with('user')
            ->orderBy('id', 'desc')
            ->paginate(10);
        $receivedOrders = Order::select('id', 'order_no', 'fname', 'lname', 'phone1', 'phone2', 'status', 'user_id', 'created_at')
            ->withSum('orderDetails', 'price')
            ->with('user')
            ->where('status', OrderStatusEnum::Received)
            ->orderBy('id', 'desc')
            ->paginate(10);
        $dispatchOrders = Order::select('id', 'order_no', 'fname', 'lname', 'phone1', 'phone2', 'status', 'user_id', 'created_at')
            ->withSum('orderDetails', 'price')
            ->with('user')
            ->where('status', OrderStatusEnum::Dispatched)
            ->orderBy('id', 'desc')
            ->paginate(10);
        $cancelOrders = Order::select('id', 'order_no', 'fname', 'lname', 'phone1', 'phone2', 'status', 'user_id', 'created_at')
            ->withSum('orderDetails', 'price')
            ->with('user')
            ->where('status', OrderStatusEnum::Cancelled)
            ->orderBy('id', 'desc')
            ->paginate(10);
        $deliveredOrders = Order::select('id', 'order_no', 'fname', 'lname', 'phone1', 'phone2', 'status', 'user_id', 'created_at')
            ->withSum('orderDetails', 'price')
            ->with('user')
            ->where('status', OrderStatusEnum::Delivered)
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('admin.orders.index', compact('allOrders', 'receivedOrders', 'dispatchOrders', 'cancelOrders', 'deliveredOrders'));
    }

    public function show($orderId)
    {
        $order = Order::with('orderDetails.product','user')->findOrFail($orderId);
        $subTotal = OrderDetail::where('order_id',$orderId)->sum('total');
        return view('admin.orders.invoice',compact('order','subTotal'));
    }

    public function edit($orderId)
    {
        $edit = Order::with('orderDetails.product','user')->findOrFail($orderId);
        return view('admin.orders.edit',compact('edit'));
    }

    public function update($orderId,OrderUpdateRequest $request)
    {
        // Send Emails on update status
        $edit = Order::findOrFail($orderId);
        $edit->update($request->all());
        return redirect()->route('admin.orders.index')->with('success', 'Order info updated successfully.');
    }
}

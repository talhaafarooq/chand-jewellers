<?php

namespace App\Http\Controllers\Admin;

use App\Enums\OrderStatusEnum;
use App\Events\SendEmailEvent;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OrderUpdateRequest;
use App\Models\OrderDetail;
use Exception;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $search = null;
        $allOrders = Order::select('id', 'order_no', 'fname', 'lname', 'phone1', 'phone2', 'status', 'user_id', 'created_at')
            ->withSum('orderDetails', 'price')
            ->with('user','orderDetails.product')
            ->orderBy('id', 'desc')
            ->paginate(10);
        $receivedOrders = Order::select('id', 'order_no', 'fname', 'lname', 'phone1', 'phone2', 'status', 'user_id', 'created_at')
            ->withSum('orderDetails', 'price')
            ->with('user','orderDetails.product')
            ->where('status', OrderStatusEnum::Received)
            ->orderBy('id', 'desc')
            ->paginate(10);
        $dispatchOrders = Order::select('id', 'order_no', 'fname', 'lname', 'phone1', 'phone2', 'status', 'user_id', 'created_at')
            ->withSum('orderDetails', 'price')
            ->with('user','orderDetails.product')
            ->where('status', OrderStatusEnum::Dispatched)
            ->orderBy('id', 'desc')
            ->paginate(10);
        $cancelOrders = Order::select('id', 'order_no', 'fname', 'lname', 'phone1', 'phone2', 'status', 'user_id', 'created_at')
            ->withSum('orderDetails', 'price')
            ->with('user','orderDetails.product')
            ->where('status', OrderStatusEnum::Cancelled)
            ->orderBy('id', 'desc')
            ->paginate(10);
        $deliveredOrders = Order::select('id', 'order_no', 'fname', 'lname', 'phone1', 'phone2', 'status', 'user_id', 'created_at')
            ->withSum('orderDetails', 'price')
            ->with('user','orderDetails.product')
            ->where('status', OrderStatusEnum::Delivered)
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('admin.orders.index', compact('search','allOrders', 'receivedOrders', 'dispatchOrders', 'cancelOrders', 'deliveredOrders'));
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
        try{
            DB::beginTransaction();
            // Send Emails on update status
            $edit = Order::with('orderDetails')->findOrFail($orderId);
            $edit->update($request->all());
            $data = [
                'orderNo' => $edit->order_no,
                'tracking_company'=> $edit->tracking_company,
                'tracking_no' => $edit->tracking_no
            ];

            if($request->status == 'dispatched')
            {
                foreach($edit->orderDetails as $orderDetail){
                    $orderDetail->product->alert_qty = $orderDetail->product->alert_qty - $orderDetail->qty;
                    $orderDetail->product->save();
                }
                event(new SendEmailEvent("talhafarooq522446@gmail.com", "Order Dispatch", $data, "emails/OrderDispatch"));
            }
            if($request->status == 'cancelled')
            {
                foreach($edit->orderDetails as $orderDetail){
                    $orderDetail->product->alert_qty = $orderDetail->product->alert_qty + $orderDetail->qty;
                    $orderDetail->product->save();
                }
                event(new SendEmailEvent("talhafarooq522446@gmail.com", "Order Cancel", $data, "emails/OrderCancel"));
            }
            if($request->status == 'delivered')
            {
                event(new SendEmailEvent("talhafarooq522446@gmail.com", "Order Delivered", $data, "emails/OrderDeliver"));
            }



            DB::commit();
            return redirect()->route('admin.orders.index')->with('success', 'Order info updated successfully.');
        }catch(Exception $ex)
        {
            DB::rollback();
            return redirect()->back()->with('failure',"Something went wrong!");
        }
    }

    public function orderReport()
    {
        return view('admin.orders.report.index');
    }

    public function report(Request $request)
    {
        $request->validate([
            'from_date'=>'required|date',
            'to_date'=>'required|date'
        ]);
        $fromDate = $request->from_date;
        $toDate = $request->to_date;
        $orders = Order::with('orderDetails','user')
        ->whereDate('created_at','>=',$request->from_date)
        ->whereDate('created_at','<=',$request->to_date)
        ->get();

        return view('admin.orders.report.report',compact('orders','fromDate','toDate'));
    }
}

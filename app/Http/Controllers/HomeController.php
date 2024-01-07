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
        $totalCategories = Category::count();
        $totalSubCategories = SubCategory::count();
        $totalProducts = Product::count();
        $totalOrders = Order::count();
        $totalNewOrders = Order::where('status',OrderStatusEnum::Received)->count();
        $totalSubscribers = Subscribers::count();
        $totalContatUs = ContactUs::count();
        $totalVisitors = Visitor::count();
        return view('admin.dashboard',
        compact(
            'totalCategories',
            'totalSubCategories',
            'totalProducts',
            'totalOrders',
            'totalNewOrders',
            'totalSubscribers',
            'totalContatUs',
            'totalVisitors'
        ));
    }
}

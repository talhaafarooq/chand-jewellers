<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Visitor;
use Carbon\Carbon;

class VisitorController extends Controller
{
    public function __construct()
    {
        // $this->middleware('permission:view-categories|create-category|edit-category|delete-category', ['only' => ['index','show']]);
        $this->middleware('check.permissions:view-website-visitors', ['only' => 'index']);
        $this->middleware('check.permissions:update-website-contact', ['only' => ['updateContactStatus']]);
    }

    public function index()
    {
        $visitors = Visitor::select('id', 'country', 'city', 'region_name', 'ip_address', 'visit')->orderByDesc('id')->paginate();
        $todayVisitors = Visitor::whereDate('created_at', Carbon::today())->count();
        return view('admin.visitors.index',compact('visitors','todayVisitors'));
    }
}

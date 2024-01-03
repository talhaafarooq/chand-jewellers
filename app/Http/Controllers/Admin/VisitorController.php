<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VisitorController extends Controller
{
    public function index()
    {
        $visitors = Visitor::select('id', 'country', 'city', 'region_name', 'ip_address', 'visit')->orderByDesc('id')->paginate();
        $todayVisitors = Visitor::whereDate('created_at', Carbon::today())->count();
        return view('admin.visitors.index',compact('visitors','todayVisitors'));
    }
}

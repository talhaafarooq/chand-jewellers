<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::with('product:id,name')->orderByDesc('id')->paginate(10);
        return view('admin.feedbacks.index',compact('feedbacks'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function __construct()
    {
        // $this->middleware('permission:view-categories|create-category|edit-category|delete-category', ['only' => ['index','show']]);
        $this->middleware('check.permissions:view-website-feedbacks', ['only' => 'index']);
    }

    public function index()
    {
        $feedbacks = Feedback::with('product:id,name')->orderByDesc('id')->paginate(10);
        return view('admin.feedbacks.index',compact('feedbacks'));
    }
}

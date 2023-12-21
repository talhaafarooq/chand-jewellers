<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        return view('website.index');
    }

    public function aboutUs()
    {
        return view('website.about');
    }

    public function contactUs()
    {
        return view('website.contact');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contactUsList = ContactUs::orderByDesc('id')->paginate(10);
        return view('admin.contact-us.index',compact('contactUsList'));
    }
}

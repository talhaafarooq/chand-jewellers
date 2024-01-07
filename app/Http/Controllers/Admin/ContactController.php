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

    public function updateContactStatus($contactId)
    {
        $contact = ContactUs::findOrFail($contactId);
        $contact->complete = !$contact->complete;
        $contact->save();
        return redirect()->route('admin.contact-us.index')->with('success', 'Contact Status updated successfully.');
    }
}

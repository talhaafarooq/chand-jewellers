<?php

namespace App\Http\Controllers\Admin;

use App\helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AboutRequest;
use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function __construct()
    {
        // $this->middleware('permission:view-categories|create-category|edit-category|delete-category', ['only' => ['index','show']]);
        $this->middleware('check.permissions:view-about', ['only' => 'index']);
        $this->middleware('check.permissions:update-about', ['only' => ['update']]);
    }

    public function index()
    {
        $edit = AboutUs::findOrFail(1);
        return view('admin.about.edit', compact('edit'));
    }

    public function update(AboutRequest $request, $id)
    {
        $edit = AboutUs::findOrFail(1);
        $edit->update($request->only('about'));

        if ($request->hasFile('image')) {
            FileHelper::removeFile($edit->image);
            $fileName = FileHelper::uploadFile($request->file('image'), 'aboutus');
            $edit->image = $fileName;
            $edit->save();
        }
        return redirect()->route('admin.aboutus.index')->with('success', 'About updated successfully.');
    }
}

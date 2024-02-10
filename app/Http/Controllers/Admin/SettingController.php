<?php

namespace App\Http\Controllers\Admin;

use App\helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SettingRequest;
use App\Models\Settings;
use App\Repositories\Interfaces\BaseRepositoryInterface;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    private $repo;

    public function __construct(BaseRepositoryInterface $baseRepo)
    {
        $this->repo = $baseRepo;
        // $this->middleware('permission:view-categories|create-category|edit-category|delete-category', ['only' => ['index','show']]);
        $this->middleware('check.permissions:view-setting', ['only' => 'index']);
        $this->middleware('check.permissions:update-setting', ['only' => ['update']]);
    }

    public function index()
    {
        $edit = $this->repo->show(Settings::class, 1);
        return view('admin.settings.edit', compact('edit'));
    }

    public function update(SettingRequest $request, $id)
    {
        $settings1 = $this->repo->show(Settings::class, 1);
        $settings = $this->repo->show(Settings::class, 1);
        $settings->update($request->all());
        if ($request->hasFile('header_logo')) {
            FileHelper::removeFile($settings1->header_logo);
            $fileName = FileHelper::uploadFile($request->file('header_logo'), 'settings');
            $settings->header_logo = $fileName;
            $settings->save();
        }
        if ($request->hasFile('footer_logo')) {
            FileHelper::removeFile($settings1->footer_logo);
            $fileName = FileHelper::uploadFile($request->file('footer_logo'), 'settings');
            $settings->footer_logo = $fileName;
            $settings->save();
        }
        return redirect()->route('admin.settings.index')->with('success', 'Settings updated successfully.');
    }
}

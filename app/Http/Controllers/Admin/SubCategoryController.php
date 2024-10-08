<?php

namespace App\Http\Controllers\Admin;

use App\helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SubCategoryRequest;
use App\Models\Category;
use App\Models\SubCategory;
use App\Repositories\Interfaces\BaseRepositoryInterface;

class SubCategoryController extends Controller
{
    private $repo;

    public function __construct(BaseRepositoryInterface $baseRepo)
    {
        $this->repo = $baseRepo;
        // $this->middleware('permission:view-categories|create-category|edit-category|delete-category', ['only' => ['index','show']]);
        $this->middleware('check.permissions:view-subcategories', ['only' => 'index']);
        $this->middleware('check.permissions:create-subcategory', ['only' => ['create', 'store']]);
        $this->middleware('check.permissions:update-subcategory', ['only' => ['edit', 'update']]);
        $this->middleware('check.permissions:delete-subcategory', ['only' => 'destroy']);
    }

    public function index()
    {
        $search = null;
        $subCategories = $this->repo->all(SubCategory::class);
        return view('admin.sub-categories.index', compact('search', 'subCategories'));
    }

    public function create()
    {
        $categoriesList = Category::pluck('name', 'id');
        return view('admin.sub-categories.create', compact('categoriesList'));
    }

    public function store(SubCategoryRequest $request)
    {
        $data = [
            'name' => $request->name,
            'category_id' => $request->category
        ];

        $category = $this->repo->store(SubCategory::class, $data);
        if ($request->hasFile('image')) {
            $fileName = FileHelper::uploadFile($request->file('image'), 'sub-categories');
            $category->image = $fileName;
            $category->save();
        }
        return redirect()->route('admin.sub-categories.index')->with('success', 'Sub-Category added successfully.');
    }

    public function edit($id)
    {
        $edit = $this->repo->show(SubCategory::class, $id);
        $categoriesList = Category::pluck('name', 'id');
        return view('admin.sub-categories.edit', compact('edit','categoriesList'));
    }

    public function update(SubCategoryRequest $request, $id)
    {
        $data = [
            'name' => $request->name,
            'category_id' => $request->category
        ];
        $category1 = $this->repo->show(SubCategory::class, $id);
        $category = $this->repo->show(SubCategory::class, $id);
        $category->update($data);
        if ($request->hasFile('image')) {
            FileHelper::removeFile($category1->image);
            $fileName = FileHelper::uploadFile($request->file('image'), 'sub-categories');
            $category->image = $fileName;
            $category->save();
        }
        return redirect()->route('admin.sub-categories.index')->with('success', 'Sub-Category updated successfully.');
    }

    public function destroy($categoryId)
    {
        $this->repo->delete(SubCategory::class, $categoryId);
        return redirect()->route('admin.sub-categories.index')->with('success', 'Sub-Category deleted successfully.');
    }
}

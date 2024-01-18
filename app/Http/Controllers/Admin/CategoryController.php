<?php

namespace App\Http\Controllers\Admin;

use App\helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use App\Models\SubCategory;
use App\Repositories\Interfaces\BaseRepositoryInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $repo;

    public function __construct(BaseRepositoryInterface $baseRepo)
    {
        $this->repo = $baseRepo;
        // $this->middleware('permission:create-category', ['only' => ['create','store']]);
        $this->middleware('permission:view-categories',['only'=>'index']);
        $this->middleware('permission:create-category',['only'=>'create','store']);
        $this->middleware('permission:edit-category',['only'=>'edit','update']);
        $this->middleware('permission:delete-category',['only'=>'delete']);
    }

    public function index()
    {
        $search = null;
        $categories = $this->repo->all(Category::class);
        return view('admin.categories.index', compact('search', 'categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(CategoryRequest $request)
    {
        $category = $this->repo->store(Category::class, $request->only('name'));
        if ($request->hasFile('image')) {
            $fileName = FileHelper::uploadFile($request->file('image'), 'categories');
            $category->image = $fileName;
            $category->save();
        }
        return redirect()->route('admin.categories.index')->with('success', 'Category added successfully.');
    }

    public function edit($id)
    {
        $edit = $this->repo->show(Category::class, $id);
        return view('admin.categories.edit', compact('edit'));
    }

    public function update(CategoryRequest $request, $id)
    {
        $category1 = $this->repo->show(Category::class, $id);
        $category = $this->repo->show(Category::class, $id);
        $category->update($request->only('name'));
        if ($request->hasFile('image')) {
            FileHelper::removeFile($category1->image);
            $fileName = FileHelper::uploadFile($request->file('image'), 'categories');
            $category->image = $fileName;
            $category->save();
        }
        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy($categoryId)
    {
        $this->repo->delete(Category::class, $categoryId);
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully.');
    }

    public function getSubCategories(Request $request)
    {
        if(isset($request->category_id))
        {
            $subCategoriesList = SubCategory::select('id','name')->where('category_id',$request->category_id)->get();
            return response()->json($subCategoriesList);
        }else{
            return response()->json([]);
        }
    }
}

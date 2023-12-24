<?php

namespace App\Http\Controllers\Admin;

use App\helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Repositories\Interfaces\BaseRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    private $repo;

    public function __construct(BaseRepositoryInterface $baseRepo)
    {
        $this->repo = $baseRepo;
    }

    public function index()
    {
        $search = null;
        $products = $this->repo->all(Product::class);
        return view('admin.products.index', compact('search', 'products'));
    }

    public function create()
    {
        $categoriesList = Category::pluck('name', 'id')->prepend('Select Category', '');
        return view('admin.products.create', compact('categoriesList'));
    }

    public function store(ProductRequest $request)
    {
        $data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'category_id' => $request->category,
            'sub_category_id' => $request->sub_category,
            'old_price' => $request->old_price,
            'new_price' => $request->new_price,
            'weight' => $request->net_weight,
            'polish' => $request->polish_weight,
            'karat' => $request->karats,
            'alert_qty' => $request->alert_qty,
            'description' => $request->description,
            'details' => $request->details,
            'sku' => $request->sku
        ];
        $product = $this->repo->store(Product::class, $data);
        if ($request->hasFile('front_img')) {
            $fileName = FileHelper::uploadFile($request->file('front_img'), 'products');
            $product->front_img = $fileName;
            $product->save();
        }
        if ($request->hasFile('back_img')) {
            $fileName = FileHelper::uploadFile($request->file('back_img'), 'products');
            $product->back_img = $fileName;
            $product->save();
        }
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $fileName = FileHelper::uploadFile($file, 'products');
                $productImage = new ProductImage();
                $productImage->product_id = $product->id;
                $productImage->image = $fileName;
                $productImage->save();
            }
        }
        return redirect()->route('admin.products.index')->with('success', 'Product added successfully.');
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
        return redirect()->route('admin.products.index')->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        $this->repo->delete(Product::class, $id);
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }
}

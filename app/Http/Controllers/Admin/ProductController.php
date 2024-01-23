<?php

namespace App\Http\Controllers\Admin;

use App\helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Http\Requests\Admin\PriceRequest;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Repositories\Interfaces\BaseRepositoryInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    private $repo;

    public function __construct(BaseRepositoryInterface $baseRepo)
    {
        $this->repo = $baseRepo;
        // $this->middleware('permission:view-categories|create-category|edit-category|delete-category', ['only' => ['index','show']]);
        $this->middleware('check.permissions:view-products', ['only' => ['index','outOfStockProducts']]);
        $this->middleware('check.permissions:create-product', ['only' => ['create', 'store']]);
        $this->middleware('check.permissions:update-product', ['only' => ['edit', 'update','changePrices']]);
        $this->middleware('check.permissions:delete-product', ['only' => 'destroy']);
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
        try {
            DB::beginTransaction();

            $data = [
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'category_id' => $request->category,
                'sub_category_id' => $request->sub_category,
                'old_price' => $request->old_price,
                'new_price' => $request->new_price,
                'qty' => $request->qty,
                'highlights' => $request->highlights,
                'description' => $request->description,
                'created_by'=>auth()->user()->id
            ];
            $tags = explode(",", $request->tags);
            $product = $this->repo->store(Product::class, $data);
            $product->tag($tags);
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

            DB::commit();
            return redirect()->route('admin.products.index')->with('success', 'Product added successfully.');
        }catch(Exception $ex)
        {
            DB::rollback();
            return redirect()->back()->with('failure', $ex->getMessage());
        }
    }

    public function edit($id)
    {
        $edit = $this->repo->show(Product::class, $id);
        $categoriesList = Category::pluck('name', 'id');
        $tags = $edit->tags->pluck('name')->toArray(); // Extract only the tag names as an array
        return view('admin.products.edit', compact('edit','categoriesList','tags'));
    }

    public function update(ProductRequest $request, $id)
    {
        try {
            DB::beginTransaction();

            $data = [
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'category_id' => $request->category,
                'sub_category_id' => $request->sub_category,
                'old_price' => $request->old_price,
                'new_price' => $request->new_price,
                'qty' => $request->qty,
                'highlights' => $request->highlights,
                'description' => $request->description,
                'updated_by'=>auth()->user()->id
            ];
            $tags = explode(",", $request->tags);
            $edit1 = $this->repo->show(Product::class, $id);
            $edit = $this->repo->show(Product::class, $id);
            // Remove existing tags
            $edit->untag();
            $edit->update($data);
            $edit->tag($tags);
            if ($request->hasFile('front_img')) {
                FileHelper::removeFile($edit->front_img);
                $fileName = FileHelper::uploadFile($request->file('front_img'), 'products');
                $edit->front_img = $fileName;
                $edit->save();
            }
            if ($request->hasFile('back_img')) {
                FileHelper::removeFile($edit->back_img);
                $fileName = FileHelper::uploadFile($request->file('back_img'), 'products');
                $edit->back_img = $fileName;
                $edit->save();
            }
            if ($request->hasFile('images')) {
                // Remove old product images from storage and database
                if(isset($edit->images))
                {
                    $edit->images->each(function ($image) {
                        FileHelper::removeFile($image->image);
                        $image->delete();
                    });
                    foreach ($request->file('images') as $file) {
                        $fileName = FileHelper::uploadFile($file, 'products');
                        $productImage = new ProductImage();
                        $productImage->product_id = $edit->id;
                        $productImage->image = $fileName;
                        $productImage->save();
                    }
                }
            }

            DB::commit();
            return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
        }catch(Exception $ex)
        {
            DB::rollback();
            return redirect()->back()->with('failure', $ex->getMessage());
        }
    }

    public function destroy($id)
    {
        $this->repo->delete(Product::class, $id);
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }

    public function outOfStockProducts()
    {
        $totalOutOfStocksProducts = Product::where('qty','<',0)->paginate(10);
        return view('admin.products.out-of-stocks-products', compact('totalOutOfStocksProducts'));
    }

    public function changePrices()
    {
        return view('admin.products.change-prices');
    }

    public function updatePrices(PriceRequest $request)
    {
        if($request->type==0)
        {
            Product::query()->increment('new_price', $request->price);
            Product::query()->increment('old_price', $request->price);
        }else if($request->type==1)
        {
            Product::query()->decrement('new_price', $request->price);
            Product::query()->decrement('old_price', $request->price);
        }
       
        return redirect()->back()->with('success','All Products Prices are updated!');
    }
}

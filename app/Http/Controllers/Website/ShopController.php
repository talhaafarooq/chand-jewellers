<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function shop(Request $request)
    {
        $categoriesWithSubcategories = Category::with(['subCategories'=>function($query){
            $query->withCount('products as totalProducts');
        }])->withCount('products as totalProducts')->get();

        $products = Product::orderByDesc('id')->paginate(1);
        if ($request->ajax()) {
            return view('website.products-list', compact('products'));
        }
        return view('website.shop',compact('categoriesWithSubcategories','products'));
    }
}

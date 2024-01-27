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
        $categoriesWithSubcategories = Category::with(['subCategories' => function ($query) {
            $query->withCount('products as totalProducts');
        }])->withCount('products as totalProducts')->get();

        $products = Product::orderByDesc('id');

        // Use whereBetween only if both start_price and end_price are provided
        if ($request->filled(['start_price', 'end_price'])) {
            $products->where(function ($query) use ($request) {
                $query->whereBetween('new_price', [$request->start_price, $request->end_price])
                    ->orWhereBetween('old_price', [$request->start_price, $request->end_price]);
            });
        }

        if ($request->has('category_slug')) {
            $products->whereHas('category', function ($categoryQuery) use ($request) {
                $categoryQuery->where('slug', $request->category_slug);
            });
        }

        if ($request->has('sub_category_slug')) {
            $products->whereHas('subCategory', function ($subCategoryQuery) use ($request) {
                $subCategoryQuery->where('slug', $request->sub_category_slug);
            });
        }

        $products = $products->paginate(12);

        if ($request->ajax()) {
            return view('website.products-list', compact('products'));
        }

        return view('website.shop', compact('categoriesWithSubcategories', 'products'));
    }
}

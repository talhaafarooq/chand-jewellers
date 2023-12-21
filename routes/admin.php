<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\SubscriberController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'role:admin']], function () {
    Route::get('dashboard', [HomeController::class, 'adminDashboard'])->name('dashboard');

    // Categories
    Route::resource('categories', CategoryController::class);
    Route::get('categories/destroy/{category_id}', [CategoryController::class,'destroy']);
    Route::post('categories/get-subcategories', [CategoryController::class,'getSubCategories'])->name('get-subcategories-list');

    // Sub-Categories
    Route::resource('sub-categories', SubCategoryController::class);
    Route::get('sub-categories/destroy/{sub_category_id}', [SubCategoryController::class,'destroy']);

    // Products
    Route::resource('products', ProductController::class);
    Route::get('products/destroy/{sub_category_id}', [ProductController::class,'destroy']);


    // Subscriber 
    Route::resource('subscribers',SubscriberController::class);

     // Settings
     Route::resource('settings', SettingController::class);
});

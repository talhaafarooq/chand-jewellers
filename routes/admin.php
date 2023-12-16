<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
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

    // Sub-Categories
    Route::resource('sub-categories', SubCategoryController::class);
    Route::get('sub-categories/destroy/{sub_category_id}', [SubCategoryController::class,'destroy']);
});

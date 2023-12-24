<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Website\{
    AuthController,
    WebsiteController,
    WishlistController
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('/logout', [LoginController::class, 'logout'])->name('user.logout');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Website Routes
Route::as('website.')->group(function(){
    Route::get('/', [WebsiteController::class, 'index'])->name('home');
    Route::get('/about-us', [WebsiteController::class, 'aboutUs'])->name('about');
    Route::get('/contact-us', [WebsiteController::class, 'contactUs'])->name('contact');
    Route::post('/subscribe', [WebsiteController::class, 'subscribeWebsite'])->name('subscribe');

    Route::get('/product/{slug}',[WebsiteController::class,'productDetails'])->name('product.details')->where('slug', '[a-zA-Z0-9-]+');
    Route::post('/customer-register/',[AuthController::class,'register'])->name('register');

    Route::middleware('auth','role:customer')->group(function(){
        // Wishlist 
        Route::get('/add-to-wishlist/{product_id}',[WishlistController::class,'addToWishlist'])->where('product_id', '[0-9]+')->name('add-to-wishlist');
        Route::get('/remove-wishlist-item/{product_id}',[WishlistController::class,'removeItemToWishlist'])->where('product_id', '[0-9]+')->name('remove-wishlist-item');
        Route::get('/wishlist',[WishlistController::class,'wishlist'])->name('wishlist');
    });
});


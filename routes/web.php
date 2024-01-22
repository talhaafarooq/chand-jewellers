<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Website\{
    AuthController,
    CartController,
    CheckoutController,
    MyAccountController,
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
Route::get('/check/auth', [HomeController::class, 'checkUserAuth']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Website Routes
Route::as('website.')->group(function () {
    Route::get('/', [WebsiteController::class, 'index'])->name('home');
    Route::get('/about-us', [WebsiteController::class, 'aboutUs'])->name('about');
    Route::get('/contact-us', [WebsiteController::class, 'contactUs'])->name('contact');
    Route::match(['get', 'post'], '/send-contact-message', [WebsiteController::class, 'sendContactMessage'])->name('send-contact-message');
    Route::post('/subscribe', [WebsiteController::class, 'subscribeWebsite'])->name('subscribe');
    Route::post('/shop', [WebsiteController::class, 'shop'])->name('shop');

    Route::get('/product/{slug}', [WebsiteController::class, 'productDetails'])->name('product.details')->where('slug', '[a-zA-Z0-9-]+');
    Route::match(['get', 'post'], '/submit-feedback', [WebsiteController::class, 'submitFeedback'])->name('submit-feedback');
    Route::get('/buynow/{slug}', [WebsiteController::class, 'buyNow']);
    Route::post('/customer-register/', [AuthController::class, 'register'])->name('register');

    // Add To Cart
    Route::get('/cart', [CartController::class, 'cart'])->name('cart');
    Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('add-to-cart');
    Route::post('/update-cart', [CartController::class, 'updateCart'])->name('update-cart');
    Route::get('/remove-cart/{slug}', [CartController::class, 'removeCart'])->name('remove-cart')->where('product_id', '[0-9]+');

    // Checkout
    Route::match(['get', 'post'], '/checkout', [CheckoutController::class, 'checkoutView'])->name('checkout');
    Route::match(['get', 'post'], '/order-submit', [CheckoutController::class, 'orderSubmit'])->name('order.submit');
    Route::get('/thanks/{order_id}', [CheckoutController::class, 'thanks'])->name('thanks');

    Route::middleware('auth', 'role:customer')->group(function () {
        // Wishlist
        Route::get('/add-to-wishlist/{product_id}', [WishlistController::class, 'addToWishlist'])->where('product_id', '[0-9]+')->name('add-to-wishlist');
        Route::get('/remove-wishlist-item/{product_id}', [WishlistController::class, 'removeItemToWishlist'])->where('product_id', '[0-9]+')->name('remove-wishlist-item');
        Route::get('/wishlist', [WishlistController::class, 'wishlist'])->name('wishlist');

        // My Account
        Route::resource('/my-account', MyAccountController::class);
        Route::post('/my-account/update-password', [MyAccountController::class, 'updatePassword'])->name('my-account.update-password');
    });
});

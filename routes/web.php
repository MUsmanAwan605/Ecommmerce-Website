<?php

use App\Models\ProductSize;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\WishController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Fronted\CartController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FlashSaleControler;
use App\Http\Controllers\User\UserOrderController;
use App\Http\Controllers\Admin\FlashSaleController;
use App\Http\Controllers\Admin\LockScreenController;
use App\Http\Controllers\Fronted\TemplateController;
use App\Http\Controllers\Admin\ProductSizeController;
use App\Http\Controllers\Admin\StripePaymentController;
use App\Http\Controllers\Fronted\FrontedHomeController;
use App\Http\Controllers\Fronted\FrontendAboutController;
use App\Http\Controllers\Fronted\FrontedProductController;
use App\Http\Controllers\Frontend\OrderTrackingController;
use App\Http\Controllers\Fronted\FrontendContactController;

// use App\Http\Controllers\Fronted\FrontendSliderController;
// use App\Http\Controllers\Fronted\SliderController;

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


Route::get('/', [FrontedHomeController::class, 'home'])->name('home');
Route::get('/about', [FrontendAboutController::class, 'about'])->name('about');
Route::get('/product', [FrontedProductController::class, 'product'])->name('product');
// Route::post('/filter-products', [FrontedProductController::class, 'filterProducts'])->name('product.filter');
Route::post('/products/filter', [FrontedProductController::class, 'filterByCategories'])->name('products.filter');
Route::post('/category/product/color', [FrontedProductController::class, 'ColorFilter'])->name('color.filter');

// Route::get('/products/filter', [FrontedProductController::class, 'filter'])->name('products.filter');
// Route::get('/products/filter', [FrontedProductController::class, 'filterProducts'])->name('products.filter');
// Assuming you're using Laravel
Route::get('/products/by-category/{id}', 'FrontedProductController@getProductsByCategory');


Route::get('/contact', [FrontendContactController::class, 'contact'])->name('contact');

Route::get('/product/{id}/product_detail', [FrontedHomeController::class, 'ProductDetail'])->name('product.detail');

// Add to Cart Route
Route::get('/product/add-to-cart', [CartController::class, 'CardPage'])->name('cart.page');
Route::post('/product/add-to-cart/{id}', [CartController::class, 'Cart'])->name('cart.page.add');
Route::delete('/product/add-to-cart/{id}/delete', [CartController::class, 'DeleteCartData'])->name('cart.page.delete');
Route::delete('/cart/remove/{id}', [cartController::class, 'destroy'])->name('cart.remove');
Route::post('/cart/clear', [cartController::class, 'clear'])->name('cart.clear');

// Add to Wish List Route
Route::get('/product/wishlist', [WishController::class, 'WishPage'])->name('wish.page');
Route::post('/product/wishlist/{id}', [WishController::class, 'Wish'])->name('wish.page.add');

// Add to Wish List Route

Route::get('/product/order/{id}', [UserOrderController::class, 'OrderPage'])->name('order.page');
Route::post('/product/order/{user_id}', [UserOrderController::class, 'Order'])->name('order.page.add');

// Route::get('/stripe-page/{order_id}', [StripePaymentController::class, 'showStripePage'])->name('stripe.page');
// Route::post('/process-payment', [StripePaymentController::class, 'processPayment'])->name('stripe.post');
// use App\Http\Controllers\StripePaymentController;

Route::post('/create-checkout-session', [StripePaymentController::class, 'createCheckoutSession'])->name('stripe.checkout');

// Route::post('stripe', [StripePaymentController::class, 'stripe'])->name('stripe');
Route::get('success', [StripePaymentController::class, 'success'])->name('success');
Route::get('cancel', [StripePaymentController::class, 'cancel'])->name('cancel');

Route::get('/product/order_tracking', [OrderTrackingController::class, 'index'])->name('order.tracking');
Route::post('order_tracking/', [OrderTrackingController::class, 'OrderTracking'])->name('order.tracking.store');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::middleware(['auth','user_role:admin'])->group(function () {

Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
// Route::get('/admin/login', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');

// Lock Screen //
Route::get('/lock', [LockScreenController::class, 'showLockScreen'])->name('lockscreen');
Route::post('/unlock', [LockScreenController::class, 'unlock'])->name('unlock');
// Lock Screen //


// Category Routes Start //
Route::get('/admin/category', [CategoryController::class, 'index'])->name('admin.category.index');
Route::get('/admin/category/create', [CategoryController::class, 'create'])->name('admin.category.create');
Route::post('/admin/category', [CategoryController::class, 'store'])->name('admin.category.store');
Route::get('/admin/category/{id}', [CategoryController::class, 'show'])->name('admin.category.show');
Route::get('/admin/category/{id}/edit', [CategoryController::class, 'edit'])->name('admin.category.edit');
Route::put('/admin/category/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
Route::delete('/admin/category/{id}/destroy', [CategoryController::class, 'destroy'])->name('admin.category.destroy');
Route::get('/user/activate/{id}', [CategoryController::class, 'activate'])->name('user.activate');
Route::get('/user/deactivate/{id}', [CategoryController::class, 'deactivate'])->name('user.deactivate');
Route::get('/admin/search_data', [CategoryController::class, 'search'])->name('admin.category.search');
// Category Routes End //

// Products Routes Start //
Route::get('/admin/product', [ProductController::class, 'index'])->name('admin.product.index');
Route::get('/admin/product/create', [ProductController::class, 'create'])->name('admin.product.create');
Route::post('/admin/product', [ProductController::class, 'store'])->name('admin.product.store');
Route::get('/admin/product/{id}/show', [ProductController::class, 'show'])->name('admin.product.show');
Route::get('/admin/product/{id}/edit', [ProductController::class, 'edit'])->name('admin.product.edit');
Route::put('/admin/product/{id}', [ProductController::class, 'update'])->name('admin.product.update');
Route::delete('/admin/product/{id}/destroy', [ProductController::class, 'destroy'])->name('admin.product.destroy');
Route::get('/admin/search_data', [ProductController::class, 'search'])->name('admin.product.search');
Route::post('/admin/product/{productId}/color/{colorId}/quantity', [ProductController::class, 'ProductColorQtyUpdate'])->name('product-color.update');
Route::post('/admin/product/{productId}/color/{colorId}/delete', [ProductController::class, 'delete'])->name('product-color.delete');
Route::get('/user/activate/{id}', [ProductController::class, 'activate'])->name('user.activate');
Route::get('/user/deactivate/{id}', [ProductController::class, 'deactivate'])->name('user.deactivate');


// FlashSale Routes End //

// // Products Routes Start //
Route::get('/admin/flash_sale', [FlashSaleController::class, 'index'])->name('admin.sale.index');
Route::get('/admin/flash_sale/create', [FlashSaleController::class, 'create'])->name('admin.sale.create');
Route::post('/admin/flash_sale', [FlashSaleController::class, 'store'])->name('admin.sale.store');
Route::get('/admin/flash_sale/{id}/show', [FlashSaleController::class, 'show'])->name('admin.sale.show');
Route::get('/admin/flash_sale/{id}/edit', [FlashSaleController::class, 'edit'])->name('admin.sale.edit');
Route::put('/admin/flash_sale/{id}', [FlashSaleController::class, 'update'])->name('admin.sale.update');
Route::delete('/admin/flash_sale/{id}/destroy', [FlashSaleController::class, 'destroy'])->name('admin.sale.destroy');
Route::get('/admin/search_data', [FlashSaleController::class, 'search'])->name('admin.sale.search');
Route::post('/admin/product/{productId}/color/{colorId}/quantity', [FlashSaleController::class, 'ProductColorQtyUpdate'])->name('product-color.update');
Route::post('/admin/product/{productId}/color/{colorId}/delete', [FlashSaleController::class, 'delete'])->name('product-color.delete');
Route::get('/user/activate/{id}', [FlashSaleController::class, 'activate'])->name('user.activate');
Route::get('/user/deactivate/{id}', [FlashSaleController::class, 'deactivate'])->name('user.deactivate');


// // FlashSale Routes End //

// Size Routes Start //
Route::get('/admin/category_size', [SizeController::class, 'indexx'])->name('admin.size.index');
Route::get('/admin/category_size/create', [SizeController::class, 'create'])->name('admin.size.create');
Route::post('/admin/category_size', [SizeController::class, 'store'])->name('admin.size.store');
Route::get('/admin/category_size/{id}/edit', [SizeController::class, 'edit'])->name('admin.size.edit');
Route::put('/admin/category_size/{id}', [SizeController::class, 'update'])->name('admin.size.update');
Route::delete('/admin/category_size/{id}', [SizeController::class, 'destroy'])->name('admin.size.destroy');
Route::get('/admin/search_data', [SizeController::class, 'search'])->name('admin.product.search');
// Size Routes End //

// Size Routes Start //
Route::get('/admin/product_size', [ProductSizeController::class, 'abc'])->name('admin.product_size.index');
Route::get('/admin/product_size/create', [ProductSizeController::class, 'create'])->name('admin.product_size.create');
Route::post('/admin/product_size', [ProductSizeController::class, 'store'])->name('admin.product_size.store');
Route::get('/admin/product_size/{id}/edit', [ProductSizeController::class, 'edit'])->name('admin.product_size.edit');
Route::put('/admin/product_size/{id}', [ProductSizeController::class, 'update'])->name('admin.product_size.update');
Route::delete('/admin/product_size/{id}', [ProductSizeController::class, 'destroy'])->name('admin.product_size.destroy');
Route::get('/admin/search_data', [ProductSizeController::class, 'search'])->name('admin.product_size.search');
// Size Routes End //

// Color Routes Start //
Route::get('/admin/color', [ColorController::class, 'index'])->name('admin.color.index');
Route::get('/admin/color/create', [ColorController::class, 'create'])->name('admin.color.create');
Route::post('/admin/color', [ColorController::class, 'store'])->name('admin.color.store');
Route::get('/admin/color/{id}/edit', [ColorController::class, 'edit'])->name('admin.color.edit');
Route::put('/admin/color/{id}', [ColorController::class, 'update'])->name('admin.color.update');
Route::delete('/admin/color/{id}', [ColorController::class, 'destroy'])->name('admin.color.destroy');
Route::get('/admin/search_data', [ColorController::class, 'search'])->name('admin.color.search');
// Color Routes End //

// Color Routes Start //
Route::get('/admin/about_us', [AboutController::class, 'index'])->name('admin.about.index');
Route::get('/admin/about_us/create', [AboutController::class, 'create'])->name('admin.about.create');
Route::post('/admin/about_us', [AboutController::class, 'store'])->name('admin.about.store');
Route::get('/admin/about_us/{id}/edit', [AboutController::class, 'edit'])->name('admin.about.edit');
Route::put('/admin/about_us/{id}', [AboutController::class, 'update'])->name('admin.about.update');
Route::delete('/admin/about_us/{id}', [AboutController::class, 'destroy'])->name('admin.aboutus.destroy');
Route::get('/admin/search_data', [AboutController::class, 'search'])->name('admin.slider.search');

// Color Routes End //

// Color Routes Start //
Route::get('/admin/slider', [SliderController::class, 'index'])->name('admin.slider.index');
Route::get('/admin/slider/create', [SliderController::class, 'create'])->name('admin.slider.create');
Route::post('/admin/slider', [SliderController::class, 'store'])->name('admin.slider.store');
Route::get('/admin/slider/{id}/edit', [SliderController::class, 'edit'])->name('admin.slider.edit');
Route::put('/admin/slider/{id}', [SliderController::class, 'update'])->name('admin.slider.update');
Route::delete('/admin/slider/{id}', [SliderController::class, 'destroy'])->name('admin.slider.destroy');
Route::get('/admin/search_data', [SliderController::class, 'search'])->name('admin.slider.search');

// Color Routes End //


// Order Routes Start //
Route::get('/admin/order', [OrderController::class, 'index'])->name('admin.order.index');
Route::get('/admin/order/create', [OrderController::class, 'create'])->name('admin.order.create');
Route::post('/admin/order', [OrderController::class, 'store'])->name('admin.order.store');
Route::get('/admin/order/{id}/show', [OrderController::class, 'show'])->name('admin.order.show');
Route::get('/admin/order/{id}/edit', [OrderController::class, 'edit'])->name('admin.order.edit');
Route::put('/admin/order/{id}', [OrderController::class, 'update'])->name('admin.order.update');
Route::delete('/admin/order/{id}', [OrderController::class, 'destroy'])->name('admin.order.destroy');
Route::get('/admin/order/search_data', [OrderController::class, 'search'])->name('admin.order.search');

// Route::get('admin/user/dashboard', [UserController::class, 'UserDashboard'])->name('User.dashboard');


// Order Routes End //


});

Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');


Route::middleware(['auth','user_role:user'])->group(function () {

    Route::get('/user/dashboard', [UserController::class, 'UserDashboard'])->name('User.dashboard');
Route::get('/user/logout', [UserController::class, 'UserLogout'])->name('User.logout');


});

Route::get('/user/login', [UserController::class, 'UserLogin'])->name('User.login');

<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/product', [App\Http\Controllers\HomeController::class, 'product'])->name('product');
Route::middleware('auth')->group(function (){
    Route::get('/cart', [App\Http\Controllers\HomeController::class, 'cart'])->name('cart');
    Route::get('/addToCart/{id}', [App\Http\Controllers\HomeController::class, 'addToCart'])->name('addToCart');
    Route::get('/deleteCart/{id}', [App\Http\Controllers\HomeController::class, 'deleteCart'])->name('deleteCart');
    Route::get('/goCheckout/{id}', [App\Http\Controllers\HomeController::class, 'goCheckout'])->name('goCheckout');
    Route::post('/checkout', [App\Http\Controllers\HomeController::class, 'checkout'])->name('checkout');
    Route::get('/order', [App\Http\Controllers\HomeController::class, 'order'])->name('order');
    Route::post('/pay', [App\Http\Controllers\HomeController::class, 'pay'])->name('pay');
});
Route::prefix('admin/dashboard')->middleware('ceklevel','auth')->group(function (){
    Route::prefix('user')->group(function (){
        Route::get('/',[\App\Http\Controllers\UserController::class,'index'])->name('user-index');
        Route::get('/create',[\App\Http\Controllers\UserController::class,'create'])->name('user-create');
        Route::post('/store',[\App\Http\Controllers\UserController::class,'store'])->name('user-store');
        Route::get('/edit/{id}',[\App\Http\Controllers\UserController::class,'edit'])->name('user-edit');
        Route::post('/update/{id}',[\App\Http\Controllers\UserController::class,'update'])->name('user-update');
        Route::get('/delete/{id}',[\App\Http\Controllers\UserController::class,'destroy'])->name('user-delete');
    });
    Route::prefix('product-category')->group(function (){
        Route::get('/',[\App\Http\Controllers\ProductCategoryController::class,'index'])->name('category-index');
        Route::get('/create',[\App\Http\Controllers\ProductCategoryController::class,'create'])->name('category-create');
        Route::post('/store',[\App\Http\Controllers\ProductCategoryController::class,'store'])->name('category-store');
        Route::get('/edit/{id}',[\App\Http\Controllers\ProductCategoryController::class,'edit'])->name('category-edit');
        Route::post('/update/{id}',[\App\Http\Controllers\ProductCategoryController::class,'update'])->name('category-update');
        Route::get('/delete/{id}',[\App\Http\Controllers\ProductCategoryController::class,'destroy'])->name('category-delete');
    });
    Route::prefix('shipping')->group(function (){
        Route::get('/',[\App\Http\Controllers\ShippingController::class,'index'])->name('shipping-index');
        Route::get('/create',[\App\Http\Controllers\ShippingController::class,'create'])->name('shipping-create');
        Route::post('/store',[\App\Http\Controllers\ShippingController::class,'store'])->name('shipping-store');
        Route::get('/edit/{id}',[\App\Http\Controllers\ShippingController::class,'edit'])->name('shipping-edit');
        Route::post('/update/{id}',[\App\Http\Controllers\ShippingController::class,'update'])->name('shipping-update');
        Route::get('/delete/{id}',[\App\Http\Controllers\ShippingController::class,'destroy'])->name('shipping-delete');
    });
    Route::prefix('product')->group(function (){
        Route::get('/',[\App\Http\Controllers\ProductController::class,'index'])->name('product-index');
        Route::get('/create',[\App\Http\Controllers\ProductController::class,'create'])->name('product-create');
        Route::post('/store',[\App\Http\Controllers\ProductController::class,'store'])->name('product-store');
        Route::get('/edit/{id}',[\App\Http\Controllers\ProductController::class,'edit'])->name('product-edit');
        Route::post('/update/{id}',[\App\Http\Controllers\ProductController::class,'update'])->name('product-update');
        Route::get('/delete/{id}',[\App\Http\Controllers\ProductController::class,'destroy'])->name('product-delete');
    });
    Route::prefix('order')->group(function (){
        Route::get('/',[\App\Http\Controllers\OrderController::class,'index'])->name('order-index');
        Route::get('/delete/{id}',[\App\Http\Controllers\OrderController::class,'destroy'])->name('order-delete');
        Route::get('/acc/{id}',[\App\Http\Controllers\OrderController::class,'acc'])->name('order-acc');
        Route::get('/cancel/{id}',[\App\Http\Controllers\OrderController::class,'cancel'])->name('order-cancel');
    });
});

Auth::routes();



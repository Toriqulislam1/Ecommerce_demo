<?php

use Illuminate\Support\Facades\Route;
 use App\Http\Controllers\Backend\adminController;
 use App\Http\Controllers\Backend\brandController;
 use App\Http\Controllers\frontend\frontendController;
 use App\Http\Controllers\frontend\authController;
 use App\Http\Controllers\Backend\checkoutController;
 use App\Http\Controllers\frontend\cartController;
 use App\Http\Controllers\frontend\ContactController;
 use App\Http\Controllers\frontend\shopController;
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


Route::controller(frontendController::class)->group(function () {
    Route::get('/', 'index');


});
//shop c
Route::controller(shopController::class)->group(function () {
    Route::get('/shop', 'shop')->name('shop');


});

//contact us
Route::controller(ContactController::class)->group(function () {

    Route::get('/contact', 'contact')->name('contact');


});




Route::controller(adminController::class)->group(function () {
    Route::get('/admin/login', 'login')->name('loginFrom');
      Route::post('/login/success', 'loginCheck')->name('login-request');
      Route::get('/logout', 'adminLogout')->name('log-out');

    // Route::get('/bills/{bill}/invoice/pdf', 'invoice')->name('pdf.invoice');
});



Route::prefix('brand')->controller(brandController::class)->group(function () {
    Route::get('/view', 'create')->name('brand-view');//index
    Route::post('/add', 'brandAdd')->name('brand-add');//add brand
    Route::get('/edit/{id}', 'brandEdit')->name('brand.edit');//index edit
    Route::post('/update', 'brandUpdate')->name('brand-update');//update store
    Route::get('/delete/{id}', 'brandDelete')->name('brand-delete');//update store
});

//customer login and register

Route::prefix('customer')->controller(authController::class)->group(function () {
    Route::get('/register', 'register')->name('customer-register-index');//index
    Route::post('/register/store', 'registerStore')->name('customer.register.store');//store


    Route::get('/login', 'login')->name('customer-login-index');//index
    Route::post('/login/success', 'loginCheck')->name('customer.login');//check

     Route::get('/logout', 'customerLogout')->name('customer.logout');//logout

});
//cart

Route::prefix('cart')->controller(cartController::class)->group(function () {
    Route::post('/add', 'cartStore')->name('card-store');//store

    Route::get('/store/{product}', 'cartStoretwo')->name('card-index');//store

    Route::get('/view', 'cartview')->name('cart-view');//store
    Route::get('/delete/{cartId}', 'cartDelete')->name('cart-delete');//cart delete
    Route::get('/checkout', 'checkoutIndex')->name('checkout-view');//caeckout view



    //  Route::get('/logout', 'customerLogout')->name('customer.logout');//logout

});


Route::prefix('cart')->controller(checkoutController::class)->group(function () {

    Route::post('/order', 'checkoutStore')->name('order-store');


});

<?php

use Illuminate\Support\Facades\Route;
 use App\Http\Controllers\Backend\adminController;
 use App\Http\Controllers\Backend\brandController;
 use App\Http\Controllers\frontend\frontendController;
 use App\Http\Controllers\frontend\authController;
 use App\Http\Controllers\frontend\cartController;
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
//     return view('frontend.index');
// });

Route::controller(frontendController::class)->group(function () {
    Route::get('/', 'index');

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
    Route::get('/cart/view', 'cartview')->name('cart-view');//store
    Route::get('/cart/delete/{cartId}', 'cartDelete')->name('cart-delete');//cart delete

    

    //  Route::get('/logout', 'customerLogout')->name('customer.logout');//logout

});

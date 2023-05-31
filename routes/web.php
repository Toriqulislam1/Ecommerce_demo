<?php

use Illuminate\Support\Facades\Route;
 use App\Http\Controllers\Backend\adminController;
 use App\Http\Controllers\Backend\brandController;
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

Route::get('/', function () {
    return view('welcome');
});




//  Route::get('/admin/login', [adminController::class, 'show']);

//Brand

Route::prefix('brand')->controller(brandController::class)->group(function () {
    Route::get('/brand/view', 'create')->name('brand-view');//index
    Route::post('/brand/add', 'brandAdd')->name('brand-add');//add brand
    // Route::get('/bills/{bill}/invoice/pdf', 'invoice')->name('pdf.invoice');
});



Route::controller(adminController::class)->group(function () {
        Route::get('/admin/login', 'login')->name('loginFrom');
          Route::post('/login/success', 'loginCheck')->name('login-request');
          Route::get('/logout', 'adminLogout')->name('log-out');

        // Route::get('/bills/{bill}/invoice/pdf', 'invoice')->name('pdf.invoice');
    });

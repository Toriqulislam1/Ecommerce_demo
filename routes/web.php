<?php

use Illuminate\Support\Facades\Route;
 use App\Http\Controllers\Backend\adminController;
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


 

Route::controller(adminController::class)->group(function () {
        Route::get('/admin/login', 'login')->name('loginFrom');
          Route::post('/login/check', 'loginCheck')->name('login-request');
        // Route::get('/bills/{bill}/invoice/pdf', 'invoice')->name('pdf.invoice');
    });

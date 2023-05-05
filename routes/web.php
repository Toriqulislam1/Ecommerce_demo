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

// Route::get('/user', [adminController::class, 'show']);




Route::controller(adminController::class)
    ->prefix('admin')->group(function () {
        Route::get('/login', 'login');
        // Route::get('/bills', 'bills')->name('bills');
        // Route::get('/bills/{bill}/invoice/pdf', 'invoice')->name('pdf.invoice');
    });

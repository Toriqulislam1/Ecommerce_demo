<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\adminController;
use App\Http\Controllers\Backend\brandController;



Route::prefix('brand')->controller(brandController::class)->group(function () {
    Route::get('/brand/view', 'create')->name('brand-view');//index
    Route::post('/brand/add', 'brandAdd')->name('brand-add');//add brand
    Route::get('edit/{id}', 'brandEdit')->name('brand.edit');
});



Route::controller(adminController::class)->group(function () {
        Route::get('/admin/login', 'login')->name('loginFrom');
          Route::post('/login/success', 'loginCheck')->name('login-request');
          Route::get('/logout', 'adminLogout')->name('log-out');

        // Route::get('/bills/{bill}/invoice/pdf', 'invoice')->name('pdf.invoice');
    });

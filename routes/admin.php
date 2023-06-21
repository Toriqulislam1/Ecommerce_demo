<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\adminController;
use App\Http\Controllers\Backend\brandController;
use App\Http\Controllers\Backend\CategoryController;



Route::prefix('category')->controller(CategoryController::class)->group(function () {
    Route::get('/view', 'create')->name('category-view');//index

});





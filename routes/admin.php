<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\adminController;
use App\Http\Controllers\Backend\brandController;
use App\Http\Controllers\Backend\CategoryController;



Route::prefix('category')->controller(CategoryController::class)->group(function () {
    Route::get('/view', 'create')->name('category-view');//index
    Route::post('/store', 'store')->name('category-store');//store
    Route::get('/edit/{id}', 'categoryEdit')->name('category.edit');//edit
    Route::post('/update', 'categoryUpdate')->name('category-update');//update
    Route::get('/delete/{id}', 'categoryDelete')->name('category-delete');//delete

});





<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\adminController;
use App\Http\Controllers\Backend\brandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\productController;



Route::prefix('category')->controller(CategoryController::class)->group(function () {

    //main category
    Route::get('/view', 'create')->name('category-view');//index
    Route::post('/store', 'store')->name('category-store');//store
    Route::get('/edit/{id}', 'categoryEdit')->name('category.edit');//edit
    Route::post('/update', 'categoryUpdate')->name('category-update');//update
    Route::get('/delete/{id}', 'categoryDelete')->name('category-delete');//delete

    //sub category

    Route::get('/sub-category', 'subCreate')->name('sub-category');//index
    Route::post('/sub-category/store', 'subStore')->name('sub-category-store');//store
    Route::get('/sub-category/edit/{id}', 'subCategoryEdit')->name('sub.category.edit');//edit
    Route::post('/sub-category/update', 'subcategoryUpdate')->name('sub-category-update');//update

});

//product start

Route::prefix('product')->controller(productController::class)->group(function () {


    Route::get('/add', 'create')->name('product-add');//index


    // Route::post('/store', 'store')->name('category-store');//store
    // Route::get('/edit/{id}', 'categoryEdit')->name('category.edit');//edit
    // Route::post('/update', 'categoryUpdate')->name('category-update');//update
    // Route::get('/delete/{id}', 'categoryDelete')->name('category-delete');//delete

    //sub category



});




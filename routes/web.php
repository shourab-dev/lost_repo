<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashbaordController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Frontend\HomepageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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



Auth::routes();

Route::get('/dashboard', [DashbaordController::class, 'dashboard'])->name('dashboard')->middleware('auth');


Route::get('/admin/category', [CategoryController::class, 'category'])->name('category')->middleware('auth');


Route::post('/admin/category', [CategoryController::class, 'categoryInsert'])->name('category.insert')->middleware('auth');


Route::get('/admin/delete/{id}', [CategoryController::class, 'categoryDelete'])->name('category.delete')->middleware('auth');


Route::get('/admin/edit/{id}', [CategoryController::class, 'categoryEdit'])->name('category.edit')->middleware('auth');


Route::put('/admin/update/{id}', [CategoryController::class, 'categoryUpdate'])->name('category.update')->middleware('auth');




//* ROUTES PRODUCTS (route grouping)

Route::prefix('/admin/product')->controller(ProductController::class)->name('admin.products.')->middleware('auth')->group(function () {

    Route::get('/', 'addProduct')->name('add');
    Route::POST('/store/{id?}', 'storeProduct')->name('store');
    

});

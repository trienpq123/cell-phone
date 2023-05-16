<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::group([ 'middleware' => 'Localization'],function() {
    Route::prefix('admin')->name('admin.')->group(function(){
        Route::get('/dashboard',[IndexController::class,'index'])->name('DashboardAdmin');
        Route::prefix('product')->name('product.')->group(function(){
            // Route::get('/',[])
        });
        Route::prefix('filter')->name('filter.')->group(function() {
            Route::get('/',[FilterController::class,'listFilter'])->name('listFilter');
            Route::get('/api/list',[FilterController::class,'apiListFilter'])->name('apiListFilter');
            Route::get('/add',[FilterController::class,'addFilter'])->name('addFilter');
            Route::get('/edit',[FilterController::class,'editFilter'])->name('editFilter');
            Route::post('/add',[FilterController::class,'postAddFilter'])->name('postAddFilter');
            Route::post('/edit',[FilterController::class,'putEditFilter'])->name('putEditFilter');
            Route::delete('/delete',[FilterController::class,'deleteFilter'])->name('deleteFilter');
        });
        Route::prefix('category')->name('category.')->group(function() {
            Route::get('/',[CategoryController::class,'listCategory'])->name('listCategory');
            Route::get('/api/list',[CategoryController::class,'apiListCategory'])->name('apiListCategory');
            Route::get('/add',[CategoryController::class,'addCategory'])->name('addCategory');
            Route::get('/edit',[CategoryController::class,'editCategory'])->name('editCategory');
            Route::post('/add',[CategoryController::class,'postAddCategory'])->name('postAddCategory');
            Route::post('/edit',[CategoryController::class,'putEditCategory'])->name('putEditCategory');
            Route::delete('/delete',[CategoryController::class,'deleteCategory'])->name('deleteCategory');
        });
        Route::prefix('product')->name('product.')->group(function() {
            Route::get('/',[ProductController::class,'listProduct'])->name('listProduct');
            Route::get('/api/list',[ProductController::class,'apiListProduct'])->name('apiListProduct');
            Route::get('/add',[ProductController::class,'addProduct'])->name('addProduct');
            Route::get('/edit',[ProductController::class,'editProduct'])->name('editProduct');
            Route::post('/add',[ProductController::class,'postAddProduct'])->name('postAddProduct');
            Route::post('/edit',[ProductController::class,'putEditProduct'])->name('putEditProduct');
            Route::delete('/delete',[ProductController::class,'deleteProduct'])->name('deleteProduct');
        });
        Route::prefix('brand')->name('brand.')->group(function() {
            Route::get('/',[BrandController::class,'listBrand'])->name('listBrand');
            Route::get('/api/list',[BrandController::class,'apiListBrand'])->name('apiListBrand');
            Route::get('/add',[BrandController::class,'addBrand'])->name('addBrand');
            Route::get('/edit',[BrandController::class,'editBrand'])->name('editBrand');
            Route::post('/add',[BrandController::class,'postAddBrand'])->name('postAddBrand');
            Route::post('/edit',[BrandController::class,'putEditBrand'])->name('putEditBrand');
            Route::delete('/delete',[BrandController::class,'deleteBrand'])->name('deleteBrand');
        });

        Route::post('ckeditor/image_upload', [FileController::class,'uploadFile'])->name('uploadFile');
    });
    Route::get('lang/{language}',[IndexController::class,'checkLanguage'])->name('checkLanguage');
});

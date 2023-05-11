<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\IndexController;
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

        Route::post('ckeditor/image_upload', [FileController::class,'uploadFile'])->name('uploadFile');
    });
    Route::get('lang/{language}',[IndexController::class,'checkLanguage'])->name('checkLanguage');
});

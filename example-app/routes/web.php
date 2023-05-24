<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use App\Models\ProductDetailModel;
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
            Route::delete('/delete-product-delete',[ProductController::class,'deleteDetailProduct'])->name('deleteProductDetail');
            Route::delete('/delete-product-image',[ProductController::class,'deleteImageProduct'])->name('deleteImageProduct');
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
        Route::prefix('pages')->name('pages.')->group(function() {
            Route::get('/',[PagesController::class,'listPages'])->name('listPages');
            Route::get('/api/list',[PagesController::class,'apiListPages'])->name('apiListPages');
            Route::get('/add',[PagesController::class,'addPages'])->name('addPages');
            Route::get('/edit',[PagesController::class,'editPages'])->name('editPages');
            Route::post('/add',[PagesController::class,'postAddPages'])->name('postAddPages');
            Route::post('/edit',[PagesController::class,'putEditPages'])->name('putEditPages');
            Route::delete('/delete',[PagesController::class,'deletePages'])->name('deletePages');
        });
        Route::prefix('news')->name('news.')->group(function() {
            Route::get('/',[NewsController::class,'listNews'])->name('listNews');
            Route::get('/api/list',[NewsController::class,'apiListNews'])->name('apiListNews');
            Route::get('/add',[NewsController::class,'addNews'])->name('addNews');
            Route::get('/edit',[NewsController::class,'editNews'])->name('editNews');
            Route::post('/add',[NewsController::class,'postAddNews'])->name('postAddNews');
            Route::post('/edit',[NewsController::class,'putEditNews'])->name('putEditNews');
            Route::delete('/delete',[NewsController::class,'deleteNews'])->name('deleteNews');
        });
        Route::prefix('banner')->name('banner.')->group(function() {
            Route::get('/',[BannerController::class,'listBanner'])->name('listBanner');
            Route::get('/api/list',[BannerController::class,'apiListBanner'])->name('apiListBanner');
            Route::get('/add',[BannerController::class,'addBanner'])->name('addBanner');
            Route::get('/edit',[BannerController::class,'editBanner'])->name('editBanner');
            Route::post('/add',[BannerController::class,'postAddBanner'])->name('postAddBanner');
            Route::post('/edit',[BannerController::class,'putEditBanner'])->name('putEditBanner');
            Route::delete('/delete',[BannerController::class,'deleteBanner'])->name('deleteBanner');
        });
        Route::prefix('menu')->name('menu.')->group(function() {
            Route::get('/',[MenuController::class,'listMenu'])->name('listMenu');
            // Route::get('/api/list',[BannerController::class,'apiListBanner'])->name('apiListBanner');
            Route::get('/add',[MenuController::class,'addMenu'])->name('addMenu');
            Route::get('/edit',[MenuController::class,'editBanner'])->name('editBanner');
            Route::post('/add',[MenuController::class,'postAddMenu'])->name('postAddMenu');
            Route::get('/edit',[MenuController::class,'putEditMenu'])->name('putEditMenu');
            // Route::delete('/delete',[BannerController::class,'deleteBanner'])->name('deleteBanner');
            Route::post('/type-menu',[MenuController::class,'typeMenu'])->name('typeMenu');
        });
        Route::post('ckeditor/image_upload', [FileController::class,'uploadFile'])->name('uploadFile');
    });
    Route::get('lang/{language}',[IndexController::class,'checkLanguage'])->name('checkLanguage');
});

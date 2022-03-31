<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin','middleware' => 'admin', 'as' => 'admin.'], function() {
    Route::get('/', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('index');
    Route::resource('category', App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('product', App\Http\Controllers\Admin\ProductController::class);
    Route::resource('page', App\Http\Controllers\Admin\PageController::class);
    Route::resource('news', App\Http\Controllers\Admin\NewsController::class);
    Route::resource('company', App\Http\Controllers\Admin\CompanyController::class);
    Route::resource('review', App\Http\Controllers\ReviewController::class);
    Route::resource('gallery', App\Http\Controllers\GalleryController::class);
    Route::get('settings', [App\Http\Controllers\Admin\SettingController::class, 'index']);
    Route::get('user', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('user.index');
    Route::get('user/add', [App\Http\Controllers\Admin\UserController::class, 'add'])->name('user.add');
});

Route::group(['prefix' => 'api','middleware' => 'auth', 'as' => 'api.'], function () {
    Route::post('category/add', [App\Http\Controllers\Admin\CategoryController::class, 'store']);
    Route::post('category/getChild', [App\Http\Controllers\Admin\CategoryController::class, 'getChildCategory']);
    Route::post('category/remove', [App\Http\Controllers\Admin\CategoryController::class, 'destroy']);
    Route::post('category/edit/{category}', [App\Http\Controllers\Admin\CategoryController::class, 'update']);
    Route::post('product/add', [App\Http\Controllers\Admin\ProductController::class, 'store']);
    Route::post('product/edit/{product}', [App\Http\Controllers\Admin\ProductController::class, 'update']);
    Route::post('product/remove', [App\Http\Controllers\Admin\ProductController::class, 'destroy']);
    Route::post('page/edit/{page}', [App\Http\Controllers\Admin\PageController::class, 'update']);
    Route::post('company/edit/{company}', [App\Http\Controllers\Admin\CompanyController::class, 'update']);
    Route::post('user/bind', [App\Http\Controllers\Admin\UserController::class, 'bindUser']);
    Route::post('user/detach', [App\Http\Controllers\Admin\UserController::class, 'detachUser']);
    Route::post('news/add', [App\Http\Controllers\Admin\NewsController::class, 'store']);
    Route::post('news/edit/{news}', [App\Http\Controllers\Admin\NewsController::class, 'update']);
    Route::post('news/remove', [App\Http\Controllers\Admin\NewsController::class, 'destroy']);
    Route::post('review/edit/{review}', [App\Http\Controllers\ReviewController::class, 'update']);
    Route::post('review/remove', [App\Http\Controllers\ReviewController::class, 'destroy']);
    Route::post('gallery/getHash', [App\Http\Controllers\GalleryController::class, 'getHash']);
    Route::post('gallery/add', [App\Http\Controllers\GalleryController::class, 'store']);
    Route::post('gallery/get/{count}', [App\Http\Controllers\GalleryController::class, 'getPhotos']);
    Route::post('settings/update', [App\Http\Controllers\Admin\SettingController::class, 'update']);
});

/* public api */
Route::get('api/auth/check', [App\Http\Controllers\Auth\CustomAuthController::class, 'checkToken']);
Route::post('api/rubric/getChild', [App\Http\Controllers\PortalConnectionController::class, 'getRubricChild']);
Route::post('api/city/getChild', [App\Http\Controllers\PortalConnectionController::class, 'getCities']);
Route::post('api/field/get', [App\Http\Controllers\PortalConnectionController::class, 'getFieldsByIds']);
Route::get('api/changes/get', [App\Http\Controllers\ProductChangeController::class, 'getChanges']);

/* public pages */
Route::get('about', [App\Http\Controllers\PageController::class, 'about'])->name('about');
Route::get('contacts', [App\Http\Controllers\PageController::class, 'contacts'])->name('contacts');
Route::get('catalog', [App\Http\Controllers\CatalogController::class, 'catalog'])->name('catalog');
Route::get('sales', [App\Http\Controllers\PageController::class, 'sales'])->name('sales');
Route::get('news', [App\Http\Controllers\NewsController::class, 'news'])->name('news');
Route::get('news/{slug}', [App\Http\Controllers\NewsController::class, 'show']);
Route::get('catalog/{slug}', [App\Http\Controllers\CategoryController::class, 'index']);
Route::get('cena/{slug}', [App\Http\Controllers\ProductController::class, 'show']);








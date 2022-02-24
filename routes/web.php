<?php

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

Route::group(['prefix' => 'admin','middleware' => 'auth', 'as' => 'admin.'], function() {
    Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('index');
    Route::resource('category', App\Http\Controllers\CategoryController::class);
    Route::resource('product', App\Http\Controllers\ProductController::class);
    Route::resource('page', \App\Http\Controllers\PageController::class);
    Route::resource('news', \App\Http\Controllers\NewsController::class);
    Route::resource('company', \App\Http\Controllers\CompanyController::class);
    Route::resource('review', \App\Http\Controllers\ReviewController::class);
    Route::get('user', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
    Route::get('user/add', [App\Http\Controllers\UserController::class, 'add'])->name('user.add');
});

Route::group(['prefix' => 'api','middleware' => 'auth', 'as' => 'api.'], function () {
    Route::post('category/add', [App\Http\Controllers\CategoryController::class, 'store']);
    Route::post('category/getChild', [App\Http\Controllers\CategoryController::class, 'getChildCategory']);
    Route::post('category/remove', [App\Http\Controllers\CategoryController::class, 'destroy']);
    Route::post('category/edit/{category}', [App\Http\Controllers\CategoryController::class, 'update']);
    Route::post('product/add', [App\Http\Controllers\ProductController::class, 'store']);
    Route::post('product/edit/{product}', [App\Http\Controllers\ProductController::class, 'update']);
    Route::post('product/remove', [App\Http\Controllers\ProductController::class, 'destroy']);
    Route::post('page/edit/{page}', [App\Http\Controllers\PageController::class, 'update']);
    Route::post('company/edit/{company}', [App\Http\Controllers\CompanyController::class, 'update']);
    Route::post('user/bind', [App\Http\Controllers\UserController::class, 'bindUser']);
    Route::post('user/detach', [App\Http\Controllers\UserController::class, 'detachUser']);
    Route::post('news/add', [App\Http\Controllers\NewsController::class, 'store']);
    Route::post('news/edit/{news}', [App\Http\Controllers\NewsController::class, 'update']);
    Route::post('news/remove', [App\Http\Controllers\NewsController::class, 'destroy']);
    Route::post('review/edit/{review}', [App\Http\Controllers\ReviewController::class, 'update']);
    Route::post('review/remove', [App\Http\Controllers\ReviewController::class, 'destroy']);
});

/* public api */
Route::get('api/auth/check', [App\Http\Controllers\Auth\CustomAuthController::class, 'checkToken']);
Route::post('api/rubric/getChild', [App\Http\Controllers\PortalConnectionController::class, 'getRubricChild']);
Route::post('api/city/getChild', [App\Http\Controllers\PortalConnectionController::class, 'getCities']);


Route::get('about', [App\Http\Controllers\PageController::class, 'about'])->name('about');






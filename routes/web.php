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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin','middleware' => 'auth', 'as' => 'admin.'], function() {
    Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('index');
    Route::resource('category', App\Http\Controllers\CategoryController::class);
    Route::resource('product', App\Http\Controllers\ProductController::class);
    Route::resource('page', \App\Http\Controllers\PageController::class);
    Route::resource('field', \App\Http\Controllers\FieldController::class);
    Route::resource('unit', \App\Http\Controllers\UnitController::class);
    Route::resource('city', \App\Http\Controllers\CityController::class);
    Route::resource('user', \App\Http\Controllers\UserController::class);
    Route::resource('company', \App\Http\Controllers\CompanyController::class);
    Route::resource('tariff', \App\Http\Controllers\TariffController::class);
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
});

Route::get('api/auth/check', [App\Http\Controllers\Auth\CustomAuthController::class, 'checkToken']);

Route::post('api/rubric/getChild', [App\Http\Controllers\PortalConnectionController::class, 'getRubricChild']);
Route::post('api/city/getChild', [App\Http\Controllers\PortalConnectionController::class, 'getCities']);


//Route::post('api/product/fields/{id}', [App\Http\Controllers\ProductController::class, 'getProductFields']);



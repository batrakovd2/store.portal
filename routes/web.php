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
    Route::resource('rubric', \App\Http\Controllers\RubricController::class);
    Route::resource('category', \App\Http\Controllers\CategoryController::class);
    Route::resource('field', \App\Http\Controllers\FieldController::class);
    Route::resource('unit', \App\Http\Controllers\UnitController::class);
    Route::resource('city', \App\Http\Controllers\CityController::class);
    Route::resource('user', \App\Http\Controllers\UserController::class);
    Route::resource('company', \App\Http\Controllers\CompanyController::class);
    Route::resource('page', \App\Http\Controllers\PageController::class);
    Route::resource('tariff', \App\Http\Controllers\TariffController::class);

});

Route::group(['prefix' => 'api','middleware' => 'auth', 'as' => 'api.'], function () {
    Route::post('category/add', [App\Http\Controllers\CategoryController::class, 'store']);
    Route::post('category/getChild', [App\Http\Controllers\CategoryController::class, 'getChildCategory']);
    Route::post('category/remove', [App\Http\Controllers\CategoryController::class, 'destroy']);
    Route::post('category/edit/{category}', [App\Http\Controllers\CategoryController::class, 'update']);
});


Route::get('api/auth/check', [\App\Http\Controllers\Auth\CustomAuthController::class, 'checkToken']);



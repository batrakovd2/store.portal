<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('product/getsync', [App\Http\Controllers\ProductController::class, 'getSyncProducts']);
Route::get('company/create', [App\Http\Controllers\CreateCompanyController::class, 'createCompany']);

Route::post('send', [App\Http\Controllers\EmailController::class, 'send']);

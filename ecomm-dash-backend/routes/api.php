<?php

use App\Http\Controllers\ProductsApiController;
use App\Http\Controllers\UserApiController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register/',[UserApiController::class,'register']);
Route::post('login/',[UserApiController::class,'login']);
Route::post('addProduct/',[ProductsApiController::class,'addProduct']);
Route::post('update/',[ProductsApiController::class,'update']);
Route::get('list/',[ProductsApiController::class,'list']);
Route::get('product/{id}',[ProductsApiController::class,'getProduct']);
Route::get('delete/{id}/',[ProductsApiController::class,'delete']);
Route::get('search/{key}/',[ProductsApiController::class,'search']);

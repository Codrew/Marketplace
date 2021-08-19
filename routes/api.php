<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\{ApiCategoryController, ApiAddressController};

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

Route::get('/category',[ApiCategoryController::class,'getCategory']);
Route::get('/subcategory ',[ApiCategoryController::class,'getSubcategory']);
Route::get('/childcategory',[ApiCategoryController::class,'getChildcategory']);

Route::get('/city',[ApiAddressController::class,'getCity']);
Route::get('/state ',[ApiAddressController::class,'getState']);
Route::get('/country',[ApiAddressController::class,'getCountry']);
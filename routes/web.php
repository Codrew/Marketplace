<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\{
    CategoryController,SubcategoryController,ChildCategoryController
};
use App\Http\Controllers\MenuController;

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

Route::get('/home',function () {
    return view('home');
});

Route::get('/auth',function () {
    return view('admin.dashboard');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.'],function(){
    Route::resource('category',CategoryController::class);
    Route::resource('subcategory',SubcategoryController::class);
    Route::resource('childcategory',ChildCategoryController::class);
});

Route::get('/',[MenuController::class,'menu']);

Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');

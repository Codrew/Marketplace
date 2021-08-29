<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontAdsController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\SendMessageController;
use App\Http\Controllers\Admin\{ CategoryController, SubcategoryController, ChildCategoryController };
use App\Http\Controllers\{ MenuController, AdvertisementController, ProfileController, DashboardController };

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



    Route::get('products/{id}/{slug}',[FrontendController::class, 'show'])->name('product.show');
    Route::get('product/{categorySlug}',[FrontendController::class, 'findBasedOnCategory'])->name('category.show');
    Route::get('product/{categorySlug}/{subcategorySlug}',[FrontendController::class, 'findBasedOnSubCategory'])->name('subcategory.show');
    Route::get('product/{categorySlug}/{subcategorySlug}/{childcategorySlug}',[FrontendController::class, 'findBasedOnChildCategory'])->name('childcategory.show');


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'is_admin'],function(){
    Route::get('/dashboard',function () {
        return view('admin.dashboard');
    });
    Route::resource('category',CategoryController::class);
    Route::resource('subcategory',SubcategoryController::class);
    Route::resource('childcategory',ChildCategoryController::class);
});
Route::resource('ads',AdvertisementController::class)->middleware('auth');
Route::get('profile',[ProfileController::class,'index'])->middleware('auth')->name('profile.index');
Route::post('profile',[ProfileController::class,'updateProfile'])->middleware('auth')->name('profile.update');

Route::get('/',[FrontAdsController::class,'index']);

Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');

//Message
Route::post('/send/message',[SendMessageController::class,'store'])->name('message.store');
Route::get('message',[SendMessageController::class,'index'])->name('message.index');
Route::get('users',[SendMessagecontroller::class,'user'])->name('message.user');


<?php

use App\Http\Controllers\categoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\itemController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\singleItemController;
use App\Http\Controllers\user\userCategoryController;
use App\Http\Controllers\compareController;
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
    $items = \App\Models\Item::latest()->take(5)->get();
    return view('user-home',compact('items'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'Admin','as'=>'Admin.','middleware'=> ['role:admin']], function() {
    Route::resource('/category',categoryController::class);
    Route::resource('/users',\App\Http\Controllers\UserController::class);

});

//profile controller
Route::group(['middleware'=>'auth'],function (){

    Route::get('/profile/edit/{user}',[ProfileController::class,'edit']);
    Route::post('/profile/{user}',[ProfileController::class,'update']);

    Route::get('comment',[CommentController::class,'index'])->name('comment');
    Route::get('comment/destroy/{id}',[CommentController::class,'destroy']);
    ################################ Start  Item Route #######################################
    Route::get('/items/{name}',[itemController::class,'index'])->name('index.item');
    Route::get('/items/create/{name}',[itemController::class,'create'])->name('create.item');
    Route::post('/items/store/{name}',[itemController::class,'store'])->name('store.item');
    Route::get('/items/destroy/{name}/{id}',[itemController::class,'destroy'])->name('destroy.item');
    Route::get('/items/edit/{name}/{id}',[itemController::class,'edit'])->name('edit.item');
    Route::post('/items/update/{name}/{id}',[itemController::class,'update'])->name('update.item');
    ################################ End  Item Route ##########################################

    ################################ Start  Compare Route #######################################
    Route::get('/item/compare/{item1}/{item2}',[compareController::class,'index']);
    ################################ End  Compare Route #######################################


});

   ################################ Start Single Item Route ##################################
   Route::get('/item/phone/{id}',[singleItemController::class,'get_phone_data'])->name('phone');
   Route::get('/item/watch/{id}',[singleItemController::class,'get_watch_data'])->name('watch');
   Route::get('/item/laptop/{id}',[singleItemController::class,'get_labtop_data'])->name('laptop');
   Route::get('/item/headphone/{id}',[singleItemController::class,'get_headphone_data'])->name('headphone');
   ################################  End  Single Item Route ##################################

Route::get('/category/{name}',[userCategoryController::class,'index']);
//Route::resource('item',itemController::class);



Route::get('/clear-cache-all', function() {
    Artisan::call('cache:clear');

    dd("Cache Clear All");
});

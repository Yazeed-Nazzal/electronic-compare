<?php

use App\Http\Controllers\categoryController;
use App\Http\Controllers\itemController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\user\userCategoryController;
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
    return view('user_home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'Admin','as'=>'Admin.','middleware'=> ['role:admin']], function() {
    Route::resource('/users',\App\Http\Controllers\UserController::class);
    Route::resource('/comments',\App\Http\Controllers\CommentController::class);
    //profile controller
});

//profile controller
Route::group(['middleware'=>'auth'],function (){
    
    Route::get('/profile/edit/{user}',[ProfileController::class,'edit']);
    Route::post('/profile/{user}',[ProfileController::class,'update']);

    ################################ Start  Item Route #######################################
    Route::get('/item/{name}',[itemController::class,'index'])->name('index.item');
    Route::get('/item/create/{name}',[itemController::class,'create'])->name('create.item');
    Route::post('/item/store/{name}',[itemController::class,'store'])->name('store.item');
    Route::get('/item/destroy/{name}/{id}',[itemController::class,'destroy'])->name('destroy.item');
    Route::get('/item/edit/{name}/{id}',[itemController::class,'edit'])->name('edit.item');
    Route::post('/item/update/{name}/{id}',[itemController::class,'update'])->name('update.item');
    ################################ End  Item Route ##########################################
});
Route::get('/category/{name}',[userCategoryController::class,'index']);
Route::resource('category',categoryController::class);
Route::resource('item',itemController::class);

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
    Route::resource('category',categoryController::class);
    Route::resource('item',itemController::class);
});

//profile controller
Route::group(['middleware'=>'auth'],function (){
    Route::get('/category/{name}',[userCategoryController::class,'index']);
    Route::get('/profile/edit/{user}',[ProfileController::class,'edit']);
    Route::post('/profile/{user}',[ProfileController::class,'update']);
});

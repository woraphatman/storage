<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;


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
Route::get('login', [AuthController::class,'showLogin']);
Route::post('login', [AuthController::class,'checkLogin']);
Route::get('logout', [AuthController::class,'logout']);
Route::get('register',[RegisterController::class,'showRegister']);
Route::post('register',[RegisterController::class,'registerUser']);
    
Route::middleware(['auth.user','check.user'])->group(function(){
    Route::resource('products', ProductController::class);
});

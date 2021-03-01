<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
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


Route::view('login','login');
Route::post('login',[AuthController::class, 'login']);

Route::view('register','register');
Route::post('register',[AuthController::class, 'register']);

Route::get('logout',[AuthController::class, 'logout']);

Route::view('layout', 'layout');

Route::resource('category', CategoryController::class);

Route::resource('post', PostController::class);

Route::resource('tag', TagController::class);

Route::get('demo',[DemoController::class,'demo']);
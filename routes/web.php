<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;

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


Route::get('/',[HomeController::class,'index'])->name('dashboard');

Route::get('/post',[PostController::class,'post'])->name('post');
Route::post('post/post-create',[PostController::class,'store'])->name('post-create');
Route::get('post/post-list',[PostController::class,'postList'])->name('post-list');
Route::get('post/onchange-post-list',[PostController::class,'onChangePostList'])->name('onchange-post-list');



Route::get('/category',[PostController::class,'category'])->name('category');


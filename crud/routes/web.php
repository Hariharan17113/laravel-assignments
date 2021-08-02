<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NonAuthController;
use \App\Http\Controllers\HomeController;
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
    return view('welcome');
})->name('welcome');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::post('/comments/{id}', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('/comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');
    Route::resource('posts',PostController::class);
});

Route::get('/index/{id}',[NonAuthController::class,'index'])->name('nonAuth.index');
Route::get('/show/{id}',[NonAuthController::class,'show'])->name('nonAuth.show');
Route::post('search',[NonAuthController::class,'search'])->name('search');
Route::post('/store',[NonAuthController::class,'store'])->name('store');
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('daily/{type}',[NonAuthController::class,'daily'])->name('daily');

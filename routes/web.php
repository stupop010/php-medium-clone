<?php

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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('editor', [App\Http\Controllers\ArticleController::class, 'index'])->middleware('auth');
Route::post('editor', [App\Http\Controllers\ArticleController::class, 'store'])->middleware('auth');
Route::get('article/{slug}', [App\Http\Controllers\ArticleController::class, 'show']);

Route::get('setting', [App\Http\Controllers\SettingController::class, 'index']);
Route::patch('setting', [App\Http\Controllers\SettingController::class, 'update']);

Route::post('follow', [\App\Http\Controllers\FollowController::class, 'store'])->middleware('auth');

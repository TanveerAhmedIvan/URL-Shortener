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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');
Route::post('/', [App\Http\Controllers\ShorturlController::class, 'create'])->name('home');
Route::get('/{slag}', [App\Http\Controllers\ShorturlController::class, 'home'])->name('shorturl');

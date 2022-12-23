<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
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

Route::get('/', [AppController::class, 'index'])->name('home');
Route::resource('menus', MenuController::class);
Route::get('/order', [OrderController::class, 'order'])->name('order');
Route::get('/order/create', [OrderController::class, 'createOrder'])->name('createOrder');
Route::post('/order', [OrderController::class, 'store'])->name('store');

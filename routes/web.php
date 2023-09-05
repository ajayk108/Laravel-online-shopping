<?php

use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});

Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/productDashboard', [DashboardController::class, 'index']);
Route::post('/addproduct', [ProductController::class, 'store']);

Route::get('/productDetials', [ProductDetailController::class, 'index']);
Route::post('/productDetials', [ProductDetailController::class, 'show']);

Route::post('/cart', [CartController::class, 'index']);


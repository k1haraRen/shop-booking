<?php

use App\Http\Controllers\ShopController;
use App\Http\Controllers\AuthController;
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

Route::get('/register', [AuthController::class, 'registerShow'])->name('register_show');
Route::get('/thanks', [AuthController::class, 'thanks'])->name('thanks');
Route::get('/login', [AuthController::class, 'loginShow'])->name('login_show');

Route::get('/', [ShopController::class, 'home'])->name('shop_home');
Route::get('/shop/shop_list', [ShopController::class, 'shopList'])->name('shop_list');
Route::post('/favorite/toggle/{shop}', [ShopController::class, 'toggle'])
    ->middleware('auth')
    ->name('favorite.toggle');

Route::get('/shop/detail/{id}', [ShopController::class, 'shopDetail'])->name('shop_detail');
Route::post('/reservation/store', [ShopController::class, 'store'])
    ->middleware('auth')
    ->name('reservation.store');
Route::get('/reservation/done', [ShopController::class, 'done']);

Route::get('/mypage', [ShopController::class, 'mypage'])
    ->middleware('auth')
    ->name('mypage');
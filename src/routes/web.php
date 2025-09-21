<?php

use App\Http\Controllers\ShopController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RatingController;
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
Route::post('/register', [AuthController::class, 'register']);
Route::get('/thanks', [AuthController::class, 'thanks'])->name('thanks');
Route::get('/login', [AuthController::class, 'loginShow'])->name('login_show');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/represent', [AuthController::class, 'representShow'])->name('represent_show');
Route::post('/represent', [AuthController::class, 'represent']);

Route::get('/', [ShopController::class, 'home'])->name('shop_home');
Route::get('/shop/shop_list', [ShopController::class, 'shopList'])->name('shop_list');
Route::post('/favorite/toggle/{shop}', [ShopController::class, 'toggle'])
    ->middleware(['auth', 'verified'])
    ->name('favorite.toggle');

Route::get('/shop/detail/{id}', [ShopController::class, 'shopDetail'])->name('shop_detail');
Route::post('/reservation/store', [ShopController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('reservation.store');
Route::get('/reservation/done', [ShopController::class, 'done']);

Route::get('/mypage', [ShopController::class, 'mypage'])
    ->middleware(['auth', 'verified'])
    ->name('mypage');
Route::put('/reservation/{id}', [ShopController::class, 'update'])->name('reservation.update');
Route::delete('/reservation/{id}', [ShopController::class, 'destroy'])->name('reservation.destroy');

Route::get('/shop/{id}/edit', [ShopController::class, 'edit'])->name('shop.edit');
Route::put('/shop/{id}', [ShopController::class, 'shopUpdate'])->name('shop.update');

Route::get('/shop/create', [ShopController::class, 'createView'])->name('shop.create_view');
Route::post('/shop', [ShopController::class, 'create'])->name('shop.create');

Route::get('/admin/mail', [AdminController::class, 'create'])->name('admin.mail.form');
Route::post('/admin/mail', [AdminController::class, 'send'])->name('admin.mail.send');

Route::get('/reservations/{id}/verify', [ReservationController::class, 'verify'])->name('reservation.verify');
Route::middleware('auth')->group(function () {
    Route::post('/ratings', [RatingController::class, 'store'])->name('ratings.store');
});
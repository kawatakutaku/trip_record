<?php

use App\Http\Controllers\MyPageController;
use App\Http\Controllers\TripController;
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

// TODO Controllerを作成して、そこをgetやpostの第二引数として使用するようにする(logout, mypage, signup, login)+postメソッド
// TODO ルーティングはbladeのactionの部分と統一させる
// TODO prefixを使用して、統一できる部分は統一させる(resourceも使うようにする)

Route::get('/trips/create', TripController::class.'@create')->name('trip.create');
Route::post('/trips/create', TripController::class.'@store')->name('trip.store');

Route::get('/mypage', MyPageController::class)->name('mypage');

// Route::get('/logout');
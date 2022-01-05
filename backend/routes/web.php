<?php

use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\MyPageController;
use App\Http\Controllers\TripController;
use Illuminate\Support\Facades\Auth;
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

// TODO trip/createとかのルーティングの部分を修正する
// 旅行作成のCRUD
Route::resource('trips', TripController::class)->only([
    // 'index',
    'create',
    'store',
    'show',
    'edit',
    'update',
    'destroy',
]);

// マイページ
Route::get('/mypage', MyPageController::class)->name('mypage');

// 認証系
Auth::routes();

// ログアウト
Route::group(['prefix'=>'logout'], function(){
    Route::get('/', LogoutController::class.'@logoutForm')->name('logout.form');
    Route::post('/', LogoutController::class.'@logout')->name('logout');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

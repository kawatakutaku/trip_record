<?php

use App\Http\Controllers\Blogs\BlogController;
use App\Http\Controllers\Cities\CityController;
use App\Http\Controllers\Memos\DirectMessageController;
use App\Http\Controllers\Memos\MemoController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\Users\MyPageController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::group(['middleware' => 'auth'], function() {

    Route::get('/mypage', MyPageController::class)->name('mypage');

    Route::resource('memos', MemoController::class)->only([
        'index',
        'create',
        'store',
        'show',
        'edit',
        'update',
        'destroy'
    ]);

    Route::resource('blogs', BlogController::class)->only([
        'index',
        'create',
        'store',
        'show',
        'edit',
        'update',
        'destroy'
    ]);

    Route::resource('direct_messages', DirectMessageController::class)->only([
        'index',
        'create',
        'store',
        'show',
        'edit',
        'update',
        'destroy'
    ]);

    // Route::get('cities', CityController::class)->name('cities.form');
    // Route::post('cities', CityController::class)->name('cities.post');

    Route::group(['prefix' => 'cities', 'as' => 'cities.'], function() {
        Route::get('/', [CityController::class, 'form'])->name('form');
        Route::post('/', [CityController::class, 'post'])->name('post');
    });
});
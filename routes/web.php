<?php

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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['isAdmin'])->group(function () {
    Route::get('coupons/{coupon}/delete', 'CouponController@delete');
    Route::get('/coupons/{coupon}/edit', 'CouponController@edit');
    Route::get('/new-coupons', 'CouponController@create');
    Route::post('/store-coupon', 'CouponController@store');
    Route::post('/coupons/{coupon}/update', 'CouponController@update');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/coupons', 'CouponController@index');

    Route::get('/coupons/{coupon}', 'CouponController@show');


});

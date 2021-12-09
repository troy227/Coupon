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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/coupons', '\App\Http\Controllers\CouponController@index');
Route::get('/new-coupons','\App\Http\Controllers\CouponController@create');
Route::post('/store-coupon', '\App\Http\Controllers\CouponController@store');
Route::get('/coupons/{coupon}','\App\Http\Controllers\CouponController@show');
Route::get('/coupons/{coupon}/edit', '\App\Http\Controllers\CouponController@edit');
Route::post('/coupons/{coupon}/update', '\App\Http\Controllers\CouponController@update');
Route::get('coupons/{coupon}/delete', '\App\Http\Controllers\CouponController@delete');

<?php

namespace App\Http\Controllers;
use App\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        $allCoupons=Coupon::all();
        return view('coupons.index')->with('coupons', $allCoupons);
    }
}

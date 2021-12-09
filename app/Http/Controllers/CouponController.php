<?php

namespace App\Http\Controllers;

use App\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        $allCoupons = Coupon::all();
        return view('coupons.index')->with('coupons', $allCoupons);
    }

    public function create()
    {
        return view('coupons.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
            'code' => 'required',
            'desc' => 'required',
            'valid_from' => 'required|before:valid_until',
            'valid_until' => 'required|after:valid_from',
            'amount' => 'required',
            'max_redeem' => 'required|gte:redeem_per_user',
            'redeem_per_user' => 'required|lte:max_redeem'
        ]);
        $data = request()->all();
        $coupon = new Coupon();
        $coupon->coupon_name=$data['name'];
        $coupon->coupon_code=$data['code'];
        $coupon->description=$data['desc'];
        $coupon->valid_from=$data['valid_from'];
        $coupon->valid_until=$data['valid_until'];
        $coupon->max_redeem=$data['max_redeem'];
        $coupon->max_redeem_per_user=$data['redeem_per_user'];
        $coupon->coupon_amount=$data['amount'];
        $coupon->save();
        session()->flash('success', 'Coupon created successfully.');
        return redirect('/coupons');
    }
}

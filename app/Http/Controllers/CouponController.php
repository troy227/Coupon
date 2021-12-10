<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'code' => 'required',
            'desc' => 'required',
            'valid_from' => 'required|before:valid_until',
            'valid_until' => 'required|after:valid_from',
            'amount' => 'required',
            'max_redeem' => 'required|gte:redeem_per_user',
            'redeem_per_user' => 'required|lte:max_redeem'
        ]);
//        $data = $request()->all();
        $coupon = new Coupon();
        $coupon->coupon_name = $request['name'];
        $coupon->coupon_code = $request['code'];
        $coupon->description = $request['desc'];
        $coupon->valid_from = $request['valid_from'];
        $coupon->valid_until = $request['valid_until'];
        $coupon->max_redeem = $request['max_redeem'];
        $coupon->max_redeem_per_user = $request['redeem_per_user'];
        $coupon->coupon_amount = $request['amount'];
        $coupon->save();
        session()->flash('success', 'Coupon created successfully.');
        return redirect('/coupons');
    }

    public function show(Coupon $coupon)
    {
        return view('coupons.show')->with('coupon', $coupon);
    }

    public function edit(Coupon $coupon)
    {

        return view('coupons.edit')->with('coupon', $coupon);
    }

    public function update(Coupon $coupon, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'code' => 'required',
            'desc' => 'required',
            'valid_from' => 'required|before:valid_until',
            'valid_until' => 'required|after:valid_from',
            'amount' => 'required',
            'max_redeem' => 'required|gte:redeem_per_user',
            'redeem_per_user' => 'required|lte:max_redeem'
        ]);
        $data = $request->all();
        $coupon->coupon_name = $request['name'];
        $coupon->coupon_code = $request['code'];
        $coupon->description = $request['desc'];
        $coupon->valid_from = $request['valid_from'];
        $coupon->valid_until = $request['valid_until'];
        $coupon->max_redeem = $request['max_redeem'];
        $coupon->max_redeem_per_user = $request['redeem_per_user'];
        $coupon->coupon_amount = $request['amount'];
        $coupon->save();
        session()->flash('success', 'Coupon edited successfully.');
        return redirect('/coupons');

    }

    public function delete(Coupon $coupon)
    {

        $coupon->delete();
        session()->flash('success', 'Coupon deleted successfully.');
        return redirect('/coupons');

    }
}

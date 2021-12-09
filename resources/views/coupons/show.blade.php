@extends('layouts.app')

@section('title')
    {{$coupon->coupon_name}}
@endsection
@section('content')
    <div class="container">
        <h1 class="text-center my-5">
            {{$coupon->coupon_name}}
        </h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-default">
                    <div class="card-header">
                        Description
                    </div>
                    <div class="card-body">
                        {{$coupon->description}}
                    </div>
                    <div class="card-header">
                        Coupon Code
                    </div>
                    <div class="card-body">
                        {{$coupon->coupon_code}}
                    </div>
                    <div class="card-header">
                        Valid from
                    </div>
                    <div class="card-body">
                        {{$coupon->valid_from}}
                    </div>
                    <div class="card-header">
                        Valid Until
                    </div>
                    <div class="card-body">
                        {{$coupon->valid_until}}
                    </div>
                    <div class="card-header">
                        Coupon Amount
                    </div>
                    <div class="card-body">
                        {{$coupon->coupon_amount}}
                    </div>
                    <div class="card-header">
                        Maximum Redeems Available
                    </div>
                    <div class="card-body">
                        {{$coupon->max_redeem}}
                    </div>
                    <div class="card-header">
                        Maximum redeems available per User
                    </div>
                    <div class="card-body">
                        {{$coupon->max_redeem_per_user}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
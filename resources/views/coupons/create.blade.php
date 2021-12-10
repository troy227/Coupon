@extends('layouts.coupon')


@section('comp')
    <h1 class="text-center my-5">Create Coupon</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">
                    Create New Coupon
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="list-group">
                                @foreach ($errors->all() as $error)
                                    <li class="list-group-item">
                                        {{$error}}
                                    </li>
                                @endforeach
                                @endif
                            </ul>

                        </div>
                        <form action="/store-coupon" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Coupon Name" value="{{old('name')}}">
                                <input type="text" class="form-control" name="code" placeholder="Coupon Code" value="{{old('code')}}">
                                <input type="text" class="form-control" name="desc" placeholder="Description" value="{{old('desc')}}">
                                <input type="text" placeholder="Valid From"
                                       onfocus="(this.type='date')" class="form-control" name="valid_from" value="{{old('valid_from')}}">
                                <input type="text" placeholder="Valid Until"
                                       onfocus="(this.type='date')" class="form-control" name="valid_until" value="{{old('valid_until')}}">
                                <input type="text" class="form-control" name="amount" placeholder="Coupon Amount" value="{{old('amount')}}">
                                <input type="text" class="form-control" name="max_redeem" placeholder="Max Redeem" value="{{old('max_redeem')}}">
                                <input type="text" class="form-control" name="redeem_per_user" placeholder="Max Redeem Per User" value="{{old('redeem_per_user')}}">
                            </div>

                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-success">
                                    Create Coupon
                                </button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>

@endsection

<?php

namespace App\Policies;

use App\Coupon;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CouponPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

//    public function crud(User $user, Coupon $coupon)
//    {
//        return $user->is($coupon->user);
//    }
}

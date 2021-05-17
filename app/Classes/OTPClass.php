<?php

namespace App\Classes;

use App\Models\OTP;
use Carbon\Carbon;


class OTPClass
{
    //    SEND OTP CODE TO USER
    public function sendOTP($mobile, $type)
    {
        OTP::MakeToken($mobile, $type);
    }

    public function validToken($token, $mobile, $type)
    {
        $validToken = OTP::query()
            ->where('token', $token)
            ->where('mobile', $mobile)
            ->where('type', $type)
            ->where('expired_at', '>', Carbon::now())
            ->latest('created_at')->first();

        return $validToken;
    }


//    public function registerVerify()
//    {
//
//    }
//
//    public function loginVerify()
//    {
//
//    }
//
//    public function resetVerify()
//    {
//
//    }
}

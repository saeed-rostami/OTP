<?php

namespace App\Http\Controllers\Auth;

use App\Classes\OTPClass;
use App\Http\Controllers\Controller;
use App\Models\OTP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginByOTPController extends Controller
{
    public function login(Request $request)
    {
        $mobile = $request->mobile;
        $request->validate([
            'mobile' => ['required', 'exists:users', 'digits:11'],
        ]);
        Session::put('type', 'login-verify');
        Session::put('mobile', $mobile);

        $type = 'login-verify';
        $otp = new OTPClass();
        $otp->sendOTP($mobile, $type);
        return redirect('/verify-mobile');
    }

}

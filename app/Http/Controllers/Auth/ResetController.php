<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\OTP;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ResetController extends Controller
{

    public function passwordRetrieve(Request $request)
    {
        $mobile = $request->mobile;
        $request->validate([
            'mobile' => ['required', 'exists:users,mobile', 'digits:11']
        ]);

//        SEND TOKEN TO USER MOBILE
        Session::put('type', 'reset-verify');
        Session::put('mobile', $mobile);

        $type = 'reset-verify';
        $otp = new OTP();
        $otp->MakeToken($mobile, $type);
        return redirect('/verify-mobile');
    }

    public function passwordReset(Request $request)
    {
        $mobile = $request->mobile;
        $password = $request->password;
        $c_password = $request->c_password;

        $user = User::query()
            ->where('mobile', $mobile)
            ->first();

        if (empty($user)) {
            return;
        }

        if ($password != $c_password) {
            return;
        }

        $user->update([
            'password' => Hash::make($password)
        ]);

        $user->update();
        return redirect('/login');
    }
}

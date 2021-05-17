<?php

namespace App\Http\Controllers\Auth;

use App\Classes\OTPClass;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class OTPController extends Controller
{
    //    SEND OTPClass CODE TO USER
    public function sendOTP()
    {
        $mobile = Session::get('mobile');
        $type = Session::get('type');

        if (!$mobile and !$type){
            return redirect('/');
        }

        $otpClass = new OTPClass();
        $otpClass->sendOTP($mobile, $type);
        return redirect()->back();
    }


    public function verify(Request $request)
    {
        $token = $request->code;
        $type = Session::get('type');
        $mobile = Session::get('mobile');
        $password = Session::get('password');

        if ($type === 'register-verify') {
            $data = [
                'mobile' => $mobile,
                'password' => $password,
                'type' => $type
            ];
            $otpClass = new OTPClass();
            $validToken = $otpClass->validToken($token, $mobile, $type);


            if (!$validToken) {
                $error = Session::flash('error', 'کد تایید وارد شده صحیح نمی باشد');
                return redirect()->back()->with($error);
            }
            $user = User::query()->create([
                'mobile' => $data['mobile'],
                'password' => Hash::make($data['password']),
            ]);
            Auth::loginUsingId($user->id);
            Session::forget(['type', 'mobile', 'password']);
            return redirect('/');

        } elseif ($type === 'reset-verify') {
            $otpClass = new OTPClass();
            $validToken = $otpClass->validToken($token, $mobile, $type);

            if (!$validToken) {
                $error = Session::flash('error', 'کد تایید وارد شده صحیح نمی باشد');
                return redirect()->back()->with($error);
            }
            Session::forget(['type', 'mobile', 'password']);
            return redirect('/password/reset-password');

        } elseif ($type === 'login-verify') {
            $otpClass = new OTPClass();
            $validToken = $otpClass->validToken($token, $mobile, $type);

            if (!$validToken) {
                $error = Session::flash('error', 'کد تایید وارد شده صحیح نمی باشد');
                return redirect()->back()->with($error);
            }
            $user = User::query()
                ->where('mobile', $mobile)
                ->first();
            if (!$user) {
                return redirect('/');
            }
            Auth::login($user);

            Session::forget(['type', 'mobile', 'password']);
            return redirect('/');

        } else
            return redirect('/');
    }
}

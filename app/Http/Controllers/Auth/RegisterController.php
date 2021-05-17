<?php

namespace App\Http\Controllers\Auth;

use App\Classes\OTPClass;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */


//reCaptcha VALIDATION
    public function reCaptcha(RegisterRequest $request)
    {
        $mobile = $request->mobile;
        $password = $request->password;

        Session::put('mobile', $mobile);
        Session::put('password', $password);
        Session::put('type', 'register-verify');
        $type = 'register-verify';

        if (!$request->filled('terms')) {
            return redirect('/register');
        }

        $recaptchaToken = $request->input('g-recaptcha-response');

        //        VERIFY RECAPTCHA CLIENT SIDE
        if (!$recaptchaToken) {
            return redirect('/register');
        }

        //        VERIFY RECAPTCHA SERVER SIDE
        $client = new Client();
        $response = $client->post('https://www.google.com/recaptcha/api/siteverify', [
            'form_params' => array(
                'secret' => env('reCAPTCHA_SECRET_KEY'),
                'response' => $recaptchaToken
            )
        ]);
        $result = json_decode($response->getBody()->getContents());

        if (!$result->success) {
            return redirect('/register');
        }

//        RECAPTCHA PASSED SUCCESSFULLY... GO ON...
        $otpClass = new OTPClass();
        $otpClass->sendOTP($mobile, $type);
        return redirect('/verify-mobile');
    }
}

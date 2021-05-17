<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    public function reCaptcha(Request $request)
    {
        //        VERIFY RECAPTCHA
        $recaptchaToken = $request->input('g-recaptcha-response');

        //        VERIFY RECAPTCHA CLIENT SIDE
        if (!$recaptchaToken) {
            return redirect('/login');
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
            return redirect('/login');
        }

//        RECAPTCHA PASSED AND GO ON...
        $this->login($request);
        return redirect('/');
    }

    public function login(Request $request)
    {
        $mobile = $request->mobile;
        $request->validate([
            'mobile' => ['required', 'exists:users', 'digits:11'],
        ]);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

//         If the login attempt was unsuccessful we will increment the number of attempts
//         to login and redirect the user back to the login form. Of course, when this
//         user surpasses their maximum number of attempts they will get locked out.
//        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    public function username()
    {
        return 'mobile';
    }

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
//    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}

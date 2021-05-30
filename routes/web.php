<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\VideoController::class, 'index'])->name('Home');

Route::get('/video/{video:slug}', [\App\Http\Controllers\VideoController::class, 'show'])->name('Video-Show');

Route::get('/categories/{category:slug}', [\App\Http\Controllers\VideoController::class, 'category'])->name('Category-Show');


Route::get('/coming-soon', function () {
    return view('main/coming-soon');
});


Auth::routes();


//SEND OTP TOKEN
Route::post('/send-token', [App\Http\Controllers\Auth\OTPController::class, 'sendOTP'])->name('sendOTP')->middleware('throttle:OTP');

//REGISTRATION

Route::get('/register', function () {
    return view('auth/register');
});
Route::post('/register-recaptcha', [App\Http\Controllers\Auth\RegisterController::class, 'reCaptcha'])->name('register-recaptcha');


//LOGIN
Route::get('/login', function () {
    return view('auth/login');
})->name('login');


Route::post('/login-recaptcha', [App\Http\Controllers\Auth\LoginController::class, 'reCaptcha'])->name('login-recaptcha');

Route::get('/login/login-by-otp', function () {
    return view('auth/loginByOtp');
})->name('Login-OTP-Index');

Route::post('/login/login-otp', [App\Http\Controllers\Auth\LoginByOTPController::class, 'login'])->name('Login-OTP');


//PASSWORD RESET
Route::get('/password/reset', function () {
    return view('auth/password/mobile');
});


Route::post('/reset-retrieve', [App\Http\Controllers\Auth\ResetController::class, 'passwordRetrieve'])->name('retrieve-password');


Route::post('/reset', [App\Http\Controllers\Auth\ResetController::class, 'passwordReset'])->name('password-reset');

Route::get('/password/reset-password', function () {
    return view('auth/password/reset');
});


Route::get('/verify-mobile', function () {
    if (session()->has('mobile'))
        return view('auth/verify');

    else
        return redirect('/');
})->name('Verify-Mobile');

Route::post('/verify-token', [App\Http\Controllers\Auth\OTPController::class, 'verify'])->name('verifyToken');

//USER
Route::get('profile' , [\App\Http\Controllers\UserController::class, 'index'])->name('User-Profile');

Route::put('edit-profile/{user}' , [\App\Http\Controllers\UserController::class, 'update'])->name('User-Update-Profile');

Route::delete('delete-avatar/{user}' , [\App\Http\Controllers\UserController::class, 'deleteAvatar'])->name('Delete-Avatar');


//ADMIN
Route::get('/admin-dashboard', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('Admin-Index');

Route::resource('admin-videos', \App\Http\Controllers\Admin\VideoController::class)->names([
    'index' => 'Admin-Video-Index',
    'create' => 'Admin-Video-Create',
    'store' => 'Admin-Video-Store',
    'show' => 'Admin-Video-Show',
    'edit' => 'Admin-Video-Edit',
    'update' => 'Admin-Video-Update',
    'destroy' => 'Admin-Video-Delete',
]);

//CATEGORIES
Route::resource('admin-categories', \App\Http\Controllers\Admin\CategoryController::class)->names([
    'index' => 'Admin-Category-Index',
    'create' => 'Admin-Category-Create',
    'store' => 'Admin-Category-Store',
    'show' => 'Admin-Category-Show',
    'edit' => 'Admin-Category-Edit',
    'update' => 'Admin-Category-Update',
    'destroy' => 'Admin-Category-Delete',
]);

//COMMENTS
Route::get('admin-comments' , [\App\Http\Controllers\Admin\CommentController::class, 'index'])->name('Admin-Comment-Index');

Route::put('admin-comment-update/{comment}', [\App\Http\Controllers\Admin\CommentController::class, 'update'])->name
('Admin-Comment-Update');

Route::delete('admin-comment-delete/{comment}', [\App\Http\Controllers\Admin\CommentController::class, 'destroy'])
    ->name('Admin-Comment-Delete');


//SELECT
Route::post('select/{video}', [\App\Http\Controllers\Admin\VideoController::class, 'selectVideo'])->name('Admin-Video-Select');

//REQUEST
Route::resource('admin-request', \App\Http\Controllers\Admin\VideoRequestController::class)->names([
    'index' => 'Admin-Request-Index',
    'show' => 'Admin-Request-Show',
    'destroy' => 'Admin-Request-Delete',
])->only('index' , 'destroy' ,'show');




//LIKE
Route::post('/like/{video}', [\App\Http\Controllers\LikeController::class, 'like']);
Route::delete('/like/{video}', [\App\Http\Controllers\LikeController::class, 'unlike']);


//FAVORITE
Route::get('/favorites' , [\App\Http\Controllers\FavoriteController::class, 'index'])->name('Favorites');
Route::post('/favorite/{video}', [\App\Http\Controllers\FavoriteController::class, 'favorite']);
Route::delete('/favorite/{video}', [\App\Http\Controllers\FavoriteController::class, 'unfavored']);


//COMMENT
Route::post('/comment-store/{video}', [\App\Http\Controllers\CommentController::class, 'store'])->name('Comment-Store');

//REQUEST
Route::get('/video-request' , [\App\Http\Controllers\VideoRequestController::class, 'index'])->name('Video-Request');
Route::post('/video-request-store', [\App\Http\Controllers\VideoRequestController::class, 'store'])->name('Video-Request-Store');


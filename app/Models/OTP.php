<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OTP extends Model
{
    use HasFactory;

    protected $table = 'otp_tokens';
    protected $guarded = [];

    public $timestamps = false;
    public $casts = [
        'created_at' => 'datetime',
        'expired_at' => 'datetime'
    ];


    public static function MakeToken($mobile, $type)
    {
        $value = self::checkToken($mobile, $type);
        if (!$value) {
            OTP::query()->create([
                'mobile' => $mobile,
                'token' => self::RandomToken(),
                'type' => $type,
                'created_at' => Carbon::now(),
                'expired_at' => Carbon::now()->addMinutes(1)
            ]);
//            TODO SEND TOKEN TO USER MOBILE BY SMS
        }
    }

    public static function checkToken($mobile, $type)
    {
        $token = OTP::query()
            ->where('mobile', $mobile)
            ->where('type', $type)
            ->where('expired_at', '>', Carbon::now())
            ->latest('created_at')
            ->first();
        return $token;
    }


    public static function RandomToken()
    {
        $otp = rand(10000, 99999);
        return $otp;
    }


}

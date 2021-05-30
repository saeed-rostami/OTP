<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'family',
        'email',
        'password',
        'mobile',
        'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getFullNameAttribute()
    {
        return $this->name . $this->family;
    }

    public function likes()
    {
        return $this->belongsToMany(Video::class, 'likes', 'user_id', 'video_id');
    }


    public function favorites()
    {
        return $this->belongsToMany(Video::class, 'favorites', 'user_id', 'video_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function videoRequests()
    {
        return $this->hasMany(VideoRequest::class);
    }


}

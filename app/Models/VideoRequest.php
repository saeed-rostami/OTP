<?php

namespace App\Models;

use Hekmatinasser\Verta\Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'link',
        'user_id',
        'seen',
    ];

    //    DATE FORMAT
    public function getCreatedAtAttribute($value)
    {
        $v = new Verta($value);
        return $v->format('%B %d، %Y');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

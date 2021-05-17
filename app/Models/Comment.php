<?php

namespace App\Models;

use App\Scopes\ProvedComments;
use Hekmatinasser\Verta\Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function video()
    {
        return $this->belongsTo(Video::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getCreatedAtAttribute($value)
    {
        $v = new Verta($value);
        return $v->formatDifference();
    }

//    protected static function booted()
//    {
//        parent::addGlobalScope(new ProvedComments());
//    }

}

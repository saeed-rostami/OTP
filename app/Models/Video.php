<?php

namespace App\Models;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Hekmatinasser\Verta\Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Video extends Model
{
    use SoftDeletes;
    use HasFactory;
    use Sluggable;

    protected $guarded = ['id'];


    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }


//    DATE FORMAT
//    public function getCreatedAtAttribute($value)
//    {
//        $v = new Verta($value);
//        return $v->format('%B %d، %Y');
//    }

    public function getCustomDateAttribute()
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }

//    LIKES
    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes', 'video_id', 'user_id');
    }

    public function isLiked()
    {
        return $this->likes()->where('user_id', \auth()->id())->count() > 0;
    }

    public function getIsLikedAttribute()
    {
        return $this->isLiked();
    }

    public function likesCount()
    {
        return $this->likes()->count();
    }

    //FAVORITES
    public function favorites()
    {
        return $this->belongsToMany(User::class, 'favorites', 'video_id', 'user_id');
    }

    public function isFavored()
    {
        return $this->favorites()->where('user_id', \auth()->id())->count() > 0;
    }

    public function getIsFavoredAttribute()
    {
        return $this->isFavored();
    }

//    SELECTED
    public function isSelected()
    {
        return $this->selected_video === 1;
    }

    public function getIsSelectedAttribute()
    {
        return $this->isSelected();
    }

    public function scopeSelected($query)
    {
        return $query->where('selected_video', 1);
    }

//    COMMENTS
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    public function approvedComments()
    {
        return $this->hasMany(Comment::class)->where('status', true);
    }

}

<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = ['title', 'slug', 'icon', 'image'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function videos()
    {
        return $this->belongsToMany(Video::class);
    }

    public function getVideoCountAttribute()
    {
        return $this->videos()->count();
    }


}

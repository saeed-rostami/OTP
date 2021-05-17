<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function __construct()
    {
       return $this->middleware('auth');
    }

    public function like(Video $video)
    {
        $id = $video->id;
        Auth::user()->likes()->attach($id);
        return redirect()->back();
    }

    public function unlike(Video $video)
    {
        $id = $video->id;
        Auth::user()->likes()->detach($id);
        return redirect()->back();
    }
}

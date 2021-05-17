<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function favorite(Video $video)
    {
        $id = $video->id;
        Auth::user()->favorites()->attach($id);
        return redirect()->back();
    }

    public function unfavored(Video $video)
    {
        $id = $video->id;
        Auth::user()->favorites()->detach($id);
        return redirect()->back();
    }
}

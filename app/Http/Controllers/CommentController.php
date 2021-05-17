<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function store(CommentRequest $request, Video $video)
    {
        Comment::query()->create([
            'user_id' => Auth::user()->id,
            'video_id' => $video->id,
            'body' => $request->body,
        ]);
        return redirect()->back()->with(['message' => 'نظر شما پس از بررسی ثبت میشود با تشکر']);
    }
}

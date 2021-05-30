<?php

namespace App\Http\Controllers;

use App\Models\VideoRequest;
use Illuminate\Http\Request as VideoRequestRequest;
use Illuminate\Support\Facades\Auth;

class VideoRequestController extends Controller
{
    public function index()
    {
        $requests = \auth()->user()->videoRequests()->get();
        return view('main.videoRequest' , compact('requests'));
    }

    public function store(VideoRequestRequest $request)
    {
        VideoRequest::query()->create([
            'title' => $request->title,
            'description' => $request->description,
            'link' => $request->link,
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->back()->with(['message' => 'درخواست شما بررسی میگردد']);
    }
}

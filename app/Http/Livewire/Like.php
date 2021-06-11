<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Like extends Component
{
    public $videoID;
    public $video;

    public function mount($video)
    {
        $this->videoID = $video->id;
        $this->video = $video;
    }

    public function render()
    {
        return view('livewire.like')->with(['video' => $this->video]);
    }

    public function like()
    {
        if (Auth::check()) {
            Auth::user()->likes()->attach($this->videoID);
             session()->flash('likeMessage', 'Liked this video');
//             return redirect()->to('/');
        } else
            session()->flash('likeMessage', 'Please login');
    }

    public function unlike()
    {
        if (Auth::check()) {
            Auth::user()->likes()->detach($this->videoID);
             session()->flash('likeMessage', 'Disliked this video');
//            return redirect()->to('/');
        } else
            session()->flash('likeMessage', 'Please login');
    }
}

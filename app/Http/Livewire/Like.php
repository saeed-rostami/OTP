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
             session()->flash('likeMessage', 'شما این ویدئو را می پسندید');
//             return redirect()->to('/');
        } else
            session()->flash('likeMessage', 'لطفا به حساب کاربری خود وارد شوید');
    }

    public function unlike()
    {
        if (Auth::check()) {
            Auth::user()->likes()->detach($this->videoID);
             session()->flash('likeMessage', 'شما این ویدئو را نمی پسندید');
//            return redirect()->to('/');
        } else
            session()->flash('likeMessage', 'لطفا به حساب کاربری خود وارد شوید');
    }
}

<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Favorite extends Component
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
        return view('livewire.favorite')->with(['video' => $this->video]);
    }

    public function favored()
    {
        if (Auth::check()) {
            Auth::user()->favorites()->attach($this->videoID);
            session()->flash('favoriteMessage', ' این ویدئو به علاقه مندی هایتان اضافه شد');

        }
        else
            session()->flash('favoriteMessage', 'لطفا به حساب کاربری خود وارد شوید');


    }

    public function unfavored()
    {
        if (Auth::check()) {
            Auth::user()->favorites()->detach($this->videoID);
            session()->flash('favoriteMessage', ' این ویدئو از علاقه مندی هایتان حذف شد');
        }
        else
            session()->flash('favoriteMessage', 'لطفا به حساب کاربری خود وارد شوید');

    }
}

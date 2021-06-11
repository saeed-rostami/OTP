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
            session()->flash('favoriteMessage', ' Added to your Favorite list');

        }
        else
            session()->flash('favoriteMessage', 'Please login');


    }

    public function unfavored()
    {
        if (Auth::check()) {
            Auth::user()->favorites()->detach($this->videoID);
            session()->flash('favoriteMessage', ' Removed from your Favorite list');
        }
        else
            session()->flash('favoriteMessage', 'Please login');

    }
}

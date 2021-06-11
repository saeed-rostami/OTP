<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Comment extends Component
{
    public $comments;
    public $commentsCount;
    public $videoID;
    public $newComment;

    protected $rules = [
        'newComment' => 'required|min:2',
    ];

    protected $messages = [
        'newComment.required' => 'Enter at least 5 character.',
        'newComment.min:2' => 'Enter at least 5 character.',
    ];

    public function mount($video)
    {
        $this->comments = $video->approvedComments;
        $this->commentsCount = $video->approvedComments()->count();
        $this->videoID = $video->id;
        $this->newComment;
    }

    public function render()
    {
        return view('livewire.comment')->with(['comments' => $this->comments, 'commentsCount' => $this->commentsCount
            , 'videoID' => $this->videoID]);
    }

    public function submitComment()
    {
        if (Auth::check()) {
            $this->validate();
            \App\Models\Comment::query()->create([
                'body' => $this->newComment,
                'user_id' => auth()->id(),
                'video_id' => $this->videoID
            ]);
            session()->flash('commentMessage', 'Your comment would be shown after confirmation');
            $this->newComment = '';
        }
        else
            session()->flash('commentMessage', 'Please login');
    }
}

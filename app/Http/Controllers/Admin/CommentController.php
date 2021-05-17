<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Scopes\ProvedComments;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::query()->where('status', '=', 0)->paginate(25);
        return view('admin.main.Comments.Comments', compact('comments'));
    }

    public function update(Comment $comment)
    {
        $comment->update([
            'status' => 1
        ]);
        $comment->save();
        return redirect()->back()->with([
            'message' => 'نظر با موفقیت تایید شد'
        ]);
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->back()->with([
            'message' => 'نظر با موفقیت حذف شد'
        ]);
    }
}

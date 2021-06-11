<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Video;
use Illuminate\Database\Eloquent\Builder;


class VideoController extends Controller
{
    public function index()
    {
        $selected_video = Video::selected()->first();
        $videos = Video::query()->paginate('12');
        return view('main.index', compact('videos', 'selected_video'));
    }

    public function show(Video $video)
    {
        $video->increment('view');
        $videos = Video::query()->paginate('12');
        return view('main.video', compact('video', 'videos'));
    }

    public function category(Category $category)
    {
        $categoryName = $category->title;
        $videos = $category->videos()->paginate(12);
        return view('main.categoryVideos', compact('videos', 'categoryName'));
    }
}

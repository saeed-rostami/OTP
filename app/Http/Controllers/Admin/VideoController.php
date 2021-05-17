<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\VideoRequest;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::query()->paginate(12);
        return view('admin.main.Videos.videos', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.main.Videos.StoreVideo', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(VideoRequest $request)
    {
        if (is_null(Video::selected()->first()))
            $selected = 1;
        else {
            if ($request->filled('selected')) {
                $this->updateSelectedVideo();
                $selected = 1;
            } else
                $selected = 0;
        }

        if ($request->hasFile('file')) {
            $path = 'uploads/videos' . date('Y/M/D');
            $video = $request->file('file')->store($path, 'public');
        }

        $video = Video::query()
            ->create([
                'title' => $request->title,
                'link' => $request->title,
                'selected_video' => $selected,
                'description' => $request->description,
                'file' => $video,
            ]);

        $video->save();

        $categories = $request->categories;
        $video->categories()->attach((array)$categories);

        $tags = $request->tags;
        $video->tags()->attach((array)$tags);

        return redirect()->route('Admin-Video-Index')->with([
            'message' => 'ویدئو جدید ایجاد شد'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $video = Video::query()->find($id);
        return view('main.Admin.Videos.Video', compact('video'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $video = Video::query()->find($id);
        return view('admin.main.Videos.UpdateVideo', compact('video', 'categories' , 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $video = Video::query()->find($id);
        if ($request->file('file')) {
            $path = 'uploads/videos' . date('Y/M/D');
            $file = $request->file('file')->store($path, 'public');

            $video->update([
                'title' => $request->title,
                'description' => $request->description,
                'file' => $file,
            ]);
        } else {
            $video->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);
        }
        $video->save();
        return redirect()->route('Admin-Video-Index')->with([
            'message' => 'ویدئو مورد نظر با موفقیت تغییر شد'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Video::query()->find($id);
        if ($video->is_selected) {
            return redirect()->back()->with([
                'message' => 'شما نمیتوانید ویدئو منتخب را حذف کنید, ابتدا ویدئو منتخب را تغیر دهید'
            ]);
        }
        File::delete("storage/" . $video->file);
        $video->delete();
        return redirect()->back()->with([
            'message' => 'ویدئو مورد نظر با موفقیت حذف شد'
        ]);
    }

    public function selectVideo(Video $video)
    {
        $this->updateSelectedVideo();
        $video->update([
            'selected_video' => 1
        ]);
        $video->save();
        return redirect()->back()->with([
            'message' => 'ویدئو مورد نظر بعنوان ویدئو منتخب انتخاب شد'
        ]);
    }

    protected function updateSelectedVideo()
    {
        $selectedVideo = Video::selected()->first();

        $selectedVideo->update([
            'selected_video' => 0
        ]);
        $selectedVideo->save();
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\VideoRequest;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Video;
use FFMpeg\Format\Video\X264;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use FFMpeg\Filters\Video\VideoFilters;
use ProtoneMedia\LaravelFFMpeg\Filters\WatermarkFactory;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;

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
    public function store(Request $request)
    {
//        $tags = $request->tags;
//        $this->storeTag($tags);
//
//        if (is_null(Video::selected()->first()))
//            $selected = 1;
//        else {
//            if ($request->filled('selected')) {
//                $this->updateSelectedVideo();
//                $selected = 1;
//            } else
//                $selected = 0;
//        }
//
//        if ($request->hasFile('file')) {
//            $path = 'uploads/videos' . date('Y/M/D');
//            $video = $request->file('file')->store($path, 'public');
//        }
//
//        $video = Video::query()
//            ->create([
//                'title' => $request->title,
//                'link' => $request->title,
//                'selected_video' => $selected,
//                'description' => $request->description,
//                'file' => $video,
//            ]);
//
//        $video->save();
//
////        STORE CATEGORIES
//        $categories = $request->categories;
//        $video->categories()->attach((array)$categories);
//
//
////        ATTACH TAGS
//        $attachableTags = $this->attachTag($tags);
//        $video->tags()->attach((array)$attachableTags);

//        return redirect()->route('Admin-Video-Index')->with([
//            'message' => '?????????? ???????? ?????????? ????'
//        ]);


        $path = asset('done.mp4');
        $midBitrate = (new X264)->setKiloBitrate(500);
        $highBitrate = (new X264)->setKiloBitrate(1000);


        FFMpeg::fromDisk('public')
            ->open('test.mp4')
            ->exportForHLS()
            ->addFormat($midBitrate)
            ->addFormat($highBitrate)
            ->toDisk('public')
            ->save('done.m3u8');

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
        return view('admin.main.Videos.UpdateVideo', compact('video', 'categories', 'tags'));
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
        $tags = $request->tags;
        $this->storeTag($tags);

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
        //        ATTACH CATEGORIES
        $categories = $request->categories;
        $video->categories()->sync((array)$categories);

        //        ATTACH TAGS
        $syncableTags = $this->syncTag($tags, $video->id);
        $video->tags()->attach((array)$syncableTags);

        return redirect()->route('Admin-Video-Index')->with([
            'message' => '?????????? ???????? ?????? ???? ???????????? ?????????? ????'
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
                'message' => '?????? ?????????????????? ?????????? ?????????? ???? ?????? ????????, ?????????? ?????????? ?????????? ???? ???????? ????????'
            ]);
        }
        File::delete("storage/" . $video->file);
        $video->delete();
        return redirect()->back()->with([
            'message' => '?????????? ???????? ?????? ???? ???????????? ?????? ????'
        ]);
    }

    protected function selectVideo(Video $video)
    {
        $this->updateSelectedVideo();
        $video->update([
            'selected_video' => 1
        ]);
        $video->save();
        return redirect()->back()->with([
            'message' => '?????????? ???????? ?????? ???????????? ?????????? ?????????? ???????????? ????'
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

    protected function storeTag($tags)
    {
        $existsTags = Tag::query()->pluck('name')->toArray();
        if ($tags) {
            foreach ($tags as $tag) {
                if (!in_array($tag, $existsTags)) {
                    Tag::query()->create([
                        'name' => $tag
                    ]);
                }
            }
        }
    }

    protected function attachTag($tags)
    {
        if ($tags) {
            $attachableTags = [];
            foreach ($tags as $tag) {
                $attachableTags[] = Tag::query()->where('name', $tag)->pluck('id')->first();
            }

            $attachableTags = array_filter($attachableTags, 'strlen');
            return $attachableTags;
        }
    }

    protected function syncTag($tags, $video)
    {
//        TODO UPDATE VIDEO TAG ISSUE
        $videoTags = Video::query()->find($video);
        $vtags = $videoTags->tags()->pluck('tags.name')->toArray();


        if ($tags) {
            $syncTags = array_diff($tags, $vtags);
            $ids = [];
            foreach ($syncTags as $tag) {
                $ids[] = Tag::query()->where('name', $tag)->pluck('id')->first();
            }
            return $ids;
        }
    }
}

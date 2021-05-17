<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use App\Models\Video;
use App\Services\ImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::query()->paginate(12);
        return view('admin.main.Categories.categories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.main.Categories.StoreCategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('category', 'public');
            Category::query()->create([
                'title' => $request->title,
                'icon' => $request->icon,
                'image' => $image,
            ]);

            $path = "storage/" . $image;
            $width = 250;
            $height = 250;
            ImageUpload::upload($path, $width, $height);
        } else {
            Category::query()->create([
                'title' => $request->title,
                'icon' => $request->icon,
            ]);
        }

        return redirect()->back()->with(['message', 'دسته بندی با موفقیت ایجاد شد']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $videos = Category::query()->find($id)->videos()->get();
        return view('admin.main.Videos.Videos', compact('videos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::query()->find($id);
        return view('admin.main.Categories.UpdateCategory', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $category = Category::query()->find($id);

        if ($request->hasFile('image')) {
            File::delete("storage/" . $category->image);
            $image = $request->file('image')->store('category', 'public');
            $category->update([
                'title' => $request->title,
                'icon' => $request->icon,
                'image' => $image
            ]);
            $path = "storage/" . $image;
            $width = 250;
            $height = 250;
            ImageUpload::upload($path, $width, $height);

        } else {
            $category->update([
                'title' => $request->title,
                'icon' => $request->icon,
            ]);
        }

        return redirect()->back()->with(['message', 'دسته بندی با موفقیت بروزرسانی شد']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        $category = Category::query()->find($id);
        File::delete("storage/" . $category->image);
        $category->delete();
        return redirect()->back()->with(['message', 'دسته بندی با موفقیت حذف شد']);

    }
}

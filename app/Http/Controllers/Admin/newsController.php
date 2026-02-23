<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class newsController extends Controller
{
    // add
    public function add()
    {
        return view('admin.latest_news.add');
    }

    // Store
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required',
            'description' => 'required',
            'images'      => 'required',
            'images.*'    => 'mimes:jpg,png,jpeg,gif|max:5120',
        ]);

        $newsId = DB::table('latest_news')->insertGetId([
            'title'       => $request->title,
            'description' => $request->description,
            'image'       => '',
        ]);

        $coverImage = '';
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $imageName = rand(10000, 99999) . time() . "news." . $image->getClientOriginalExtension();
                $image->move(public_path('images/news/'), $imageName);
                $isCover = ($index === 0);
                if ($isCover) $coverImage = $imageName;
                DB::table('item_images')->insert([
                    'item_type'  => 'news',
                    'item_id'    => $newsId,
                    'image'      => $imageName,
                    'is_cover'   => $isCover ? 1 : 0,
                    'sort_order' => $index,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            DB::table('latest_news')->where('id', $newsId)->update(['image' => $coverImage]);
        }

        return redirect()->back()->with('success', 'Successfully inserted data');
    }

    // index
    public function index()
    {
        $news = DB::table('latest_news')->orderBy('id', 'desc')->get();
        return view('admin.latest_news.index', compact('news'));
    }

    // Destroy
    public function destroy($id)
    {
        $images = DB::table('item_images')->where('item_type', 'news')->where('item_id', $id)->get();
        foreach ($images as $img) {
            @unlink(public_path('images/news/' . $img->image));
        }
        DB::table('item_images')->where('item_type', 'news')->where('item_id', $id)->delete();

        $news = DB::table('latest_news')->where('id', $id)->first();
        if ($news && $news->image) {
            @unlink(public_path('images/news/' . $news->image));
        }
        DB::table('latest_news')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Successfully Deleted News');
    }

    // Edit
    public function edit($id)
    {
        $news   = DB::table('latest_news')->where('id', $id)->first();
        $images = DB::table('item_images')
            ->where('item_type', 'news')
            ->where('item_id', $id)
            ->orderBy('sort_order')
            ->get();
        return view('admin.latest_news.edit', compact('news', 'images'));
    }

    // Update
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'       => 'required',
            'description' => 'required',
            'images.*'    => 'nullable|mimes:jpg,png,jpeg,gif|max:5120',
        ]);

        if ($request->hasFile('images')) {
            $existingCount = DB::table('item_images')
                ->where('item_type', 'news')->where('item_id', $id)->count();
            $isCoverNeeded = ($existingCount === 0);

            foreach ($request->file('images') as $index => $image) {
                $imageName = rand(10000, 99999) . time() . "news." . $image->getClientOriginalExtension();
                $image->move(public_path('images/news/'), $imageName);
                $isCover = ($isCoverNeeded && $index === 0);
                DB::table('item_images')->insert([
                    'item_type'  => 'news',
                    'item_id'    => $id,
                    'image'      => $imageName,
                    'is_cover'   => $isCover ? 1 : 0,
                    'sort_order' => $existingCount + $index,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                if ($isCover) {
                    DB::table('latest_news')->where('id', $id)->update(['image' => $imageName]);
                }
            }
        }

        DB::table('latest_news')->where('id', $id)->update([
            'title'       => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('update', 'Successfully Updated News');
    }
}

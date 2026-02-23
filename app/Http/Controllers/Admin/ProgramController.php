<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProgramController extends Controller
{
    // add
    public function add()
    {
        return view('admin.programs.add');
    }

    // Store
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title'       => 'required',
            'description' => 'required',
            'images'      => 'required',
            'images.*'    => 'mimes:jpg,png,jpeg,gif|max:5120',
            'status'      => 'required|in:active,completed,upcoming',
        ]);

        $coverImage = '';
        $programId  = DB::table('programs')->insertGetId([
            'title'       => $request->title,
            'description' => $request->description,
            'image'       => '',
            'start_date'  => $request->start_date,
            'status'      => $request->status,
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $imageName = rand(10000, 99999) . time() . "program." . $image->getClientOriginalExtension();
                $image->move(public_path('images/programs/'), $imageName);
                $isCover = ($index === 0);
                if ($isCover) {
                    $coverImage = $imageName;
                }
                DB::table('item_images')->insert([
                    'item_type'  => 'program',
                    'item_id'    => $programId,
                    'image'      => $imageName,
                    'is_cover'   => $isCover ? 1 : 0,
                    'sort_order' => $index,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            DB::table('programs')->where('id', $programId)->update(['image' => $coverImage]);
        }

        return redirect()->back()->with('success', 'Successfully inserted data');
    }

    // index
    public function index()
    {
        $data = DB::table('programs')->orderBy('id', 'desc')->get();
        return view('admin.programs.index', compact('data'));
    }

    // Destroy
    public function destroy($id)
    {
        // Delete all item images
        $images = DB::table('item_images')->where('item_type', 'program')->where('item_id', $id)->get();
        foreach ($images as $img) {
            @unlink(public_path('images/programs/' . $img->image));
        }
        DB::table('item_images')->where('item_type', 'program')->where('item_id', $id)->delete();

        // Fallback: delete old single image if not in item_images
        $item = DB::table('programs')->where('id', $id)->first();
        if ($item && $item->image) {
            @unlink(public_path('images/programs/' . $item->image));
        }
        DB::table('programs')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Successfully Deleted');
    }

    // Edit
    public function edit($id)
    {
        $data   = DB::table('programs')->where('id', $id)->first();
        $images = DB::table('item_images')
            ->where('item_type', 'program')
            ->where('item_id', $id)
            ->orderBy('sort_order')
            ->get();
        return view('admin.programs.edit', compact('data', 'images'));
    }

    // Update
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'       => 'required',
            'description' => 'required',
            'status'      => 'required|in:active,completed,upcoming',
            'images.*'    => 'nullable|mimes:jpg,png,jpeg,gif|max:5120',
        ]);

        $item = DB::table('programs')->where('id', $id)->first();

        // Handle new images
        if ($request->hasFile('images')) {
            $existingCount = DB::table('item_images')
                ->where('item_type', 'program')->where('item_id', $id)->count();
            $isCoverNeeded = ($existingCount === 0);

            foreach ($request->file('images') as $index => $image) {
                $imageName = rand(10000, 99999) . time() . "program." . $image->getClientOriginalExtension();
                $image->move(public_path('images/programs/'), $imageName);
                $isCover = ($isCoverNeeded && $index === 0);
                DB::table('item_images')->insert([
                    'item_type'  => 'program',
                    'item_id'    => $id,
                    'image'      => $imageName,
                    'is_cover'   => $isCover ? 1 : 0,
                    'sort_order' => $existingCount + $index,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                if ($isCover) {
                    DB::table('programs')->where('id', $id)->update(['image' => $imageName]);
                }
            }
            // If there were no existing images yet, ensure cover is set
            if ($isCoverNeeded) {
                $first = DB::table('item_images')
                    ->where('item_type', 'program')->where('item_id', $id)
                    ->orderBy('sort_order')->first();
                if ($first) {
                    DB::table('programs')->where('id', $id)->update(['image' => $first->image]);
                }
            }
        }

        DB::table('programs')->where('id', $id)->update([
            'title'       => $request->title,
            'description' => $request->description,
            'start_date'  => $request->start_date,
            'status'      => $request->status,
        ]);

        return redirect()->back()->with('update', 'Successfully Updated');
    }
}

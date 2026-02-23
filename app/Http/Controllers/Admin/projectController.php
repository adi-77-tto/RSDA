<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class projectController extends Controller
{
    // add
    public function add(){
        return view('admin.ongoing_project.add');
    }

    // Store
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required',
            'description' => 'required',
            'images'      => 'required',
            'images.*'    => 'mimes:jpeg,png,jpg,gif|max:5120',
            'donor'       => 'nullable|string|max:255',
        ]);

        $projectId = DB::table('ongoing_project')->insertGetId([
            'title'       => $request->title,
            'description' => $request->description,
            'image'       => '',
            'donor'       => $request->donor,
        ]);

        $coverImage = '';
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $imageName = rand(1000000, 9999999) . time() . "project." . $image->getClientOriginalExtension();
                $image->move(public_path('images/project'), $imageName);
                $isCover = ($index === 0);
                if ($isCover) $coverImage = $imageName;
                DB::table('item_images')->insert([
                    'item_type'  => 'project',
                    'item_id'    => $projectId,
                    'image'      => $imageName,
                    'is_cover'   => $isCover ? 1 : 0,
                    'sort_order' => $index,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            DB::table('ongoing_project')->where('id', $projectId)->update(['image' => $coverImage]);
        }

        return redirect()->back()->with('success', 'Successfully inserted data');
    }

    // index
    public function index(){
        $project = DB::table('ongoing_project')->orderBy('id', 'desc')->get();
        return view('admin.ongoing_project.index', compact('project'));
    }

    // Destroy
    public function destroy($id){
        $images = DB::table('item_images')->where('item_type', 'project')->where('item_id', $id)->get();
        foreach ($images as $img) {
            @unlink(public_path('images/project/' . $img->image));
        }
        DB::table('item_images')->where('item_type', 'project')->where('item_id', $id)->delete();

        $project = DB::table('ongoing_project')->where('id', $id)->first();
        if ($project && $project->image) {
            @unlink(public_path('images/project/' . $project->image));
        }
        DB::table('ongoing_project')->where('id', $id)->delete();
        return redirect()->back()->with('success','Successfully Deleted Project');
    }

    // Edit
    public function edit($id){
        $project = DB::table('ongoing_project')->where('id', $id)->first();
        $images  = DB::table('item_images')
            ->where('item_type', 'project')
            ->where('item_id', $id)
            ->orderBy('sort_order')
            ->get();
        return view('admin.ongoing_project.edit', compact('project', 'images'));
    }

    // Update
    public function update(Request $request, $id){
        $request->validate([
            'title'       => 'required',
            'description' => 'required',
            'donor'       => 'nullable|string|max:255',
            'images.*'    => 'nullable|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        if ($request->hasFile('images')) {
            $existingCount = DB::table('item_images')
                ->where('item_type', 'project')->where('item_id', $id)->count();
            $isCoverNeeded = ($existingCount === 0);

            foreach ($request->file('images') as $index => $image) {
                $imageName = rand(10000, 99999) . time() . "project." . $image->getClientOriginalExtension();
                $image->move(public_path('images/project'), $imageName);
                $isCover = ($isCoverNeeded && $index === 0);
                DB::table('item_images')->insert([
                    'item_type'  => 'project',
                    'item_id'    => $id,
                    'image'      => $imageName,
                    'is_cover'   => $isCover ? 1 : 0,
                    'sort_order' => $existingCount + $index,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                if ($isCover) {
                    DB::table('ongoing_project')->where('id', $id)->update(['image' => $imageName]);
                }
            }
        }

        DB::table('ongoing_project')->where('id', $id)->update([
            'title'       => $request->title,
            'description' => $request->description,
            'donor'       => $request->donor,
        ]);

        return redirect()->back()->with('update', 'Successfully Updated data');
    }
}

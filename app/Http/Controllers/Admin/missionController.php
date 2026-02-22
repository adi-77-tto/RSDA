<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class missionController extends Controller
{
    //__Create__//
    public function create(){
        $mission = DB::table('mission_vision')->first();
        return view('admin.mission.create',compact('mission'));
    }

    //__Store__//
    public function store(Request $request){
        $request->validate([
            'vision'        => 'required',
            'mission'       => 'required',
            'values'        => 'required',
            'mission_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:4096',
            'vision_image'  => 'nullable|image|mimes:jpg,jpeg,png,gif|max:4096',
            'values_image'  => 'nullable|image|mimes:jpg,jpeg,png,gif|max:4096',
        ]);

        $existing = DB::table('mission_vision')->first();
        $data = [
            'vision'      => $request->vision,
            'mission'     => $request->mission,
            'values_text' => $request->values,
        ];

        foreach (['mission_image', 'vision_image', 'values_image'] as $field) {
            if ($request->hasFile($field)) {
                // delete old image
                if ($existing && $existing->$field) {
                    $old = public_path('images/mission_vision/' . $existing->$field);
                    if (file_exists($old)) @unlink($old);
                }
                $file = $request->file($field);
                $name = time() . '_' . $field . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('images/mission_vision/'), $name);
                $data[$field] = $name;
            }
        }

        DB::table('mission_vision')->updateOrInsert(['id' => 1], $data);
        return redirect()->back()->with('success','Successfully saved Mission, Vision and Values');
    }
}

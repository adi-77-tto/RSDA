<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VolunteerController extends Controller
{
    // List all volunteer sign-ups
    public function index()
    {
        $data = DB::table('volunteers')->orderBy('id', 'desc')->get();
        return view('admin.volunteers.index', compact('data'));
    }

    // View a single volunteer
    public function view($id)
    {
        $item = DB::table('volunteers')->where('id', $id)->first();
        return view('admin.volunteers.view', compact('item'));
    }

    // Delete
    public function destroy($id)
    {
        DB::table('volunteers')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Volunteer record deleted successfully.');
    }
}

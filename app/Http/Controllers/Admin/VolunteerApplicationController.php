<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VolunteerApplicationController extends Controller
{
    // index - list all volunteer applications
    public function index()
    {
        $data = DB::table('volunteer_applications')->orderBy('id', 'desc')->get();
        return view('admin.volunteers.applications', compact('data'));
    }

    // view a single application
    public function view($id)
    {
        $application = DB::table('volunteer_applications')->where('id', $id)->first();
        return view('admin.volunteers.application_view', compact('application'));
    }

    // delete
    public function destroy($id)
    {
        DB::table('volunteer_applications')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Application deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Donation;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Fetch dashboard statistics
        $totalProjects = DB::table('ongoing_project')->count();
        $totalDonations = DB::table('donations')->where('status', 'verified')->sum('amount');
        $pendingDonations = DB::table('donations')->where('status', 'pending')->count();
        $totalVolunteers = DB::table('volunteers')->count();
        $newMessages = DB::table('messages')->count();
        $totalImpact = DB::table('impact')->count();
        $totalStories = DB::table('stories')->count();
        $totalPartners = DB::table('partners')->count();
        
        return view('admin.home', compact(
            'totalProjects',
            'totalDonations',
            'pendingDonations',
            'totalVolunteers',
            'newMessages',
            'totalImpact',
            'totalStories',
            'totalPartners'
        ));
    }
}

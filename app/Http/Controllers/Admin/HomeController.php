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
        // ── Stat Cards ──────────────────────────────────────────────────────
        $totalProjects   = DB::table('ongoing_project')->count();
        $totalDonations  = DB::table('donations')->where('status', 'verified')->sum('amount');
        $pendingDonations= DB::table('donations')->where('status', 'pending')->count();
        $totalVolunteers = DB::table('volunteers')->count();
        $newMessages     = DB::table('messages')->count();
        $totalImpact     = DB::table('impact')->count();
        $totalStories    = DB::table('stories')->count();
        $totalPartners   = DB::table('partners')->count();
        $totalNews       = DB::table('latest_news')->count();
        $totalPrograms   = DB::table('programs')->count();

        // ── Chart 1: Monthly donations last 6 months (verified amount) ──────
        $monthLabels = [];
        $verifiedArr = [];
        $pendingArr  = [];
        for ($i = 5; $i >= 0; $i--) {
            $dt = now()->subMonths($i);
            $monthLabels[] = $dt->format('M Y');
            $y = $dt->year;
            $m = $dt->month;
            $verifiedArr[] = (float) DB::table('donations')
                ->where('status', 'verified')
                ->whereYear('created_at', $y)
                ->whereMonth('created_at', $m)
                ->sum('amount');
            $pendingArr[] = (float) DB::table('donations')
                ->where('status', 'pending')
                ->whereYear('created_at', $y)
                ->whereMonth('created_at', $m)
                ->sum('amount');
        }

        // ── Chart 2: Donation status breakdown (doughnut) ───────────────────
        $donationVerified = DB::table('donations')->where('status', 'verified')->count();
        $donationPending  = DB::table('donations')->where('status', 'pending')->count();
        $donationRejected = DB::table('donations')->where('status', 'rejected')->count();

        // ── Chart 3: Content overview (horizontal bar) ───────────────────────
        $contentLabels = ['Projects','News','Programs','Stories','Volunteers','Partners','Messages','Impact'];
        $contentCounts = [
            $totalProjects, $totalNews, $totalPrograms, $totalStories,
            $totalVolunteers, $totalPartners, $newMessages, $totalImpact,
        ];

        // ── Chart 4: Volunteer signups last 6 months (line chart) ───────────
        $volunteerArr = [];
        for ($i = 5; $i >= 0; $i--) {
            $dt = now()->subMonths($i);
            $volunteerArr[] = (int) DB::table('volunteers')
                ->whereYear('created_at', $dt->year)
                ->whereMonth('created_at', $dt->month)
                ->count();
        }

        return view('admin.home', compact(
            'totalProjects', 'totalDonations', 'pendingDonations',
            'totalVolunteers', 'newMessages', 'totalImpact',
            'totalStories', 'totalPartners', 'totalNews', 'totalPrograms',
            'monthLabels', 'verifiedArr', 'pendingArr',
            'donationVerified', 'donationPending', 'donationRejected',
            'contentLabels', 'contentCounts',
            'volunteerArr'
        ));
    }
}

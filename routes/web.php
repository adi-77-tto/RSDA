<?php

use App\Http\Controllers\frontController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

require __DIR__.'/admin.php';
/*
|--------------------------------------------------------------------------
| Clints Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    $slider = DB::table('slider')->get();
    $project = DB::table('ongoing_project')->take(4)->get();
    $news = DB::table('latest_news')->take(6)->get();

    // Merge gallery images from all sources (same as the full gallery page)
    $galleryImgs = DB::table('gallery')
        ->select(DB::raw("CONCAT('images/gallery/', image) as image_path"), 'title')
        ->get();
    $programImgs = DB::table('item_images')
        ->join('programs', function($join){
            $join->on('item_images.item_id', '=', 'programs.id')
                 ->where('item_images.item_type', '=', 'program');
        })
        ->select(DB::raw("CONCAT('images/programs/', item_images.image) as image_path"), 'programs.title')
        ->get();
    $newsImgs = DB::table('item_images')
        ->join('latest_news', function($join){
            $join->on('item_images.item_id', '=', 'latest_news.id')
                 ->where('item_images.item_type', '=', 'news');
        })
        ->select(DB::raw("CONCAT('images/news/', item_images.image) as image_path"), 'latest_news.title')
        ->get();
    $projectImgs = DB::table('item_images')
        ->join('ongoing_project', function($join){
            $join->on('item_images.item_id', '=', 'ongoing_project.id')
                 ->where('item_images.item_type', '=', 'project');
        })
        ->select(DB::raw("CONCAT('images/project/', item_images.image) as image_path"), 'ongoing_project.title')
        ->get();
    $gallery = $galleryImgs->merge($programImgs)->merge($newsImgs)->merge($projectImgs)->take(9);

    $application = DB::table('applications')->get()->first();
    $programs = DB::table('programs')->orderBy('created_at', 'desc')->take(6)->get();
    $stories = DB::table('stories')->orderBy('id', 'desc')->get();
    $mission_vision = DB::table('mission_vision')->first();
    $impact = DB::table('impact')->orderBy('order', 'asc')->get();

    // Get the 'People' metric value for the counter
    $people_metric = DB::table('impact')->whereRaw('LOWER(title) = ?', ['people'])->first();

    return view('home', compact('slider', 'project', 'news', 'gallery', 'application', 'programs', 'stories', 'mission_vision', 'impact', 'people_metric'));
});

Route::post('volunteer/apply', [frontController::class, 'volunteerApply'])->name('volunteer.apply');

// About us
Route::get('about/us', [frontController::class, 'about_us'])->name('about.us');
Route::get('mission/vision', [frontController::class, 'vision_mission'])->name('vision.mission');
Route::get('about/us/team/members', [frontController::class, 'teamMembers'])->name('team.members');
Route::get('origin/affilation', [frontController::class, 'origin_affilation'])->name('origin_affilation');
Route::get('committee', [frontController::class, 'committee'])->name('executive.committee');
Route::get('cheif/message', [frontController::class, 'cheif_msg'])->name('cheif.message');
Route::get('partner/donor', [frontController::class, 'partner'])->name('partner.donor');
Route::get('about/impact', [frontController::class, 'impact'])->name('about.impact');

// Programs
// Route::get('key/focus', [frontController::class, 'key_focus'])->name('key.focus.area'); // disabled
Route::get('project/archieve', [frontController::class, 'proj_archieve'])->name('project.archieve');
Route::get('ongoing/project', [frontController::class, 'ongoing_project'])->name('ongoing.project');
Route::get('ongoing/project/view/{id}', [frontController::class, 'project_view'])->name('ongoing.project.view');
Route::get('latest/news/view/{id}', [frontController::class, 'news_view'])->name('latest.news.view');
Route::get('latest/news/all', [frontController::class, 'news_all'])->name('latest.news.all');
Route::get('youtube/video', [frontController::class, 'youtube'])->name('youtube.video');
Route::get('programs', [frontController::class, 'programs'])->name('programs.all');
Route::get('programs/view/{id}', [frontController::class, 'programsView'])->name('programs.view');
Route::get('success/stories', [frontController::class, 'stories'])->name('success.stories');
Route::get('success/stories/view/{id}', [frontController::class, 'storiesView'])->name('success.stories.view');
Route::get('events/calender', [frontController::class, 'calender'])->name('events.calender');

// Stay Informed
Route::get('strategic/plan', [frontController::class, 'strategic_plan'])->name('strategic.plan');
Route::get('policy/guideline', [frontController::class, 'policy_guideline'])->name('policy.guideline');
Route::get('publication', [frontController::class, 'publication'])->name('publication');

// Involved
Route::get('get_invoked/career', [frontController::class, 'career'])->name('invoked.career');
Route::get('volunteer/opportunities', [frontController::class, 'volOpportunities'])->name('volunterr.opportunities');
Route::get('donate', [frontController::class, 'donate'])->name('donate');
Route::post('donation/submit', [frontController::class, 'donationSubmit'])->name('donation.submit');
// Route::get('fundraising', [frontController::class, 'fundraising'])->name('fundraising');
// Route::get('corporate/partnership', [frontController::class, 'corporate'])->name('corporate.partnership');
Route::get('contact', [frontController::class, 'contact'])->name('contact');
Route::post('message/store', [frontController::class, 'messageStore'])->name('message.store');

// __Gallery
Route::get('gallery/all', [frontController::class, 'all_photos'])->name('photo.all');

// FAQ
Route::get('faq',[frontController::class, 'faq'])->name('faq');

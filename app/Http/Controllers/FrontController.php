<?php

namespace App\Http\Controllers;

use App\Models\AcademicProgram;
use App\Models\Announcement;
use App\Models\articlenews;
use App\Models\author;
use App\Models\banneradvertisement;
use App\Models\category;
use App\Models\GalleryPhoto;
use App\Models\SchoolAchievement;
use App\Models\SchoolProfile;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $articles = articlenews::latest()
            ->take(3)
            ->get();

        $featured_articles = articlenews::where('is_featured', 'featured')
            ->latest()
            ->take(3)
            ->get();

        $sliderBanners = banneradvertisement::where('is_active', 'active')
            ->where('type', 'slider')
            ->latest()
            ->get();

        $bannerads = banneradvertisement::where('is_active', 'active')
            ->where('type', 'banner')
            ->inRandomOrder()
            ->first();

        $entertainment_articles = articlenews::where('is_featured', 'not_featured')
            ->latest()
            ->take(6)
            ->get();

        $entertainment_featured_articles = articlenews::where('is_featured', 'featured')
            ->latest()
            ->first();

        $business_articles = articlenews::where('is_featured', 'not_featured')
            ->latest()
            ->take(6)
            ->get();

        $business_featured_articles = articlenews::where('is_featured', 'featured')
            ->latest()
            ->first();

        $automotive_articles = articlenews::where('is_featured', 'not_featured')
            ->latest()
            ->take(6)
            ->get();

        $automotive_featured_articles = articlenews::where('is_featured', 'featured')
            ->latest()
            ->first();

        $schoolProfile = SchoolProfile::query()->latest()->first();

        $announcements = Announcement::query()
            ->where('is_published', 'published')
            ->orderByDesc('publish_at')
            ->take(3)
            ->get();

        $featuredAchievements = SchoolAchievement::query()
            ->where('is_featured', 'featured')
            ->latest('achievement_date')
            ->take(3)
            ->get();

        return view('front.index', compact(
            'articles',
            'featured_articles',
            'sliderBanners',
            'bannerads',
            'entertainment_articles',
            'entertainment_featured_articles',
            'business_articles',
            'business_featured_articles',
            'automotive_articles',
            'automotive_featured_articles',
            'schoolProfile',
            'announcements',
            'featuredAchievements'
        ));
    }

    public function profile()
    {
        $schoolProfile = SchoolProfile::query()->latest()->first();
        $achievements = SchoolAchievement::query()->latest('achievement_date')->paginate(12);

        return view('front.profile', compact('schoolProfile', 'achievements'));
    }

    public function academic()
    {
        $programs = AcademicProgram::query()->where('is_active', 'active')->latest()->get();
        $achievements = SchoolAchievement::query()->latest('achievement_date')->take(6)->get();

        return view('front.academic', compact('programs', 'achievements'));
    }

    public function gallery()
    {
        $photos = GalleryPhoto::query()->where('is_published', 'published')->latest('event_date')->paginate(12);

        return view('front.gallery', compact('photos'));
    }

    public function contact()
    {
        $schoolProfile = SchoolProfile::query()->latest()->first();

        return view('front.contact', compact('schoolProfile'));
    }

    public function category(Category $category)
    {
        return redirect()->route('front.index');
    }

    public function author(Author $author)
    {
        return redirect()->route('front.index');
    }

    public function search(Request $request)
    {
        $request->validate([
            'keyword' => ['required', 'string', 'max:255'],
        ]);

        $keyword = $request->keyword;

        $articles = articlenews::where('name', 'like', '%' . $keyword . '%')->paginate(6);

        return view('front.search', compact('articles', 'keyword'));
    }

    public function details(articlenews $articleNews)
    {
        $articles = articlenews::where('is_featured', 'not_featured')
            ->where('id', '!=', $articleNews->id)
            ->latest()
            ->take(3)
            ->get();

        $bannerads = banneradvertisement::where('is_active', 'active')
            ->where('type', 'banner')
            ->inRandomOrder()
            ->first();

        $square_ads = banneradvertisement::where('type', 'square')
            ->where('is_active', 'active')
            ->inRandomOrder()
            ->take(2)
            ->get();

        if ($square_ads->count() < 2) {
            $square_ads_1 = $square_ads->first();
            $square_ads_2 = $square_ads->first();
        } else {
            $square_ads_1 = $square_ads->get(0);
            $square_ads_2 = $square_ads->get(1);
        }

        return view('front.details', compact('articleNews', 'articles', 'bannerads', 'square_ads_1', 'square_ads_2'));
    }

    public function announcementDetails(Announcement $announcement)
    {
        $announcements = Announcement::where('is_published', 'published')
            ->where('id', '!=', $announcement->id)
            ->orderByDesc('publish_at')
            ->take(3)
            ->get();

        return view('front.announcement', compact('announcement', 'announcements'));
    }
}

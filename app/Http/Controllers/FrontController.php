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
        $categories = category::all();

        $articles = articlenews::with(['category'])
            ->where('is_featured', 'not_featured')
            ->latest()
            ->take(3)
            ->get();

        $featured_articles = articlenews::with(['category'])
            ->where('is_featured', 'featured')
            ->latest()
            ->take(3)
            ->get();

        $authors = author::all();

        $bannerads = banneradvertisement::where('is_active', 'active')
            ->where('type', 'banner')
            ->inRandomOrder()
            ->first();

        $entertainment_articles = articlenews::whereHas('category', function ($query) {
            $query->where('name', 'Entertainment');
        })
            ->where('is_featured', 'not_featured')
            ->latest()
            ->take(6)
            ->get();

        $entertainment_featured_articles = articlenews::whereHas('category', function ($query) {
            $query->where('name', 'Entertainment');
        })
            ->where('is_featured', 'featured')
            ->latest()
            ->first();

        $business_articles = articlenews::whereHas('category', function ($query) {
            $query->where('name', 'Business');
        })
            ->where('is_featured', 'not_featured')
            ->latest()
            ->take(6)
            ->get();

        $business_featured_articles = articlenews::whereHas('category', function ($query) {
            $query->where('name', 'Business');
        })
            ->where('is_featured', 'featured')
            ->latest()
            ->first();

        $automotive_articles = articlenews::whereHas('category', function ($query) {
            $query->where('name', 'Automotive');
        })
            ->where('is_featured', 'not_featured')
            ->latest()
            ->take(6)
            ->get();

        $automotive_featured_articles = articlenews::whereHas('category', function ($query) {
            $query->where('name', 'Automotive');
        })
            ->where('is_featured', 'featured')
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
            'categories',
            'articles',
            'authors',
            'featured_articles',
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
        $categories = Category::all();
        $schoolProfile = SchoolProfile::query()->latest()->first();
        $achievements = SchoolAchievement::query()->latest('achievement_date')->paginate(12);

        return view('front.profile', compact('categories', 'schoolProfile', 'achievements'));
    }

    public function academic()
    {
        $categories = Category::all();
        $programs = AcademicProgram::query()->where('is_active', 'active')->latest()->get();
        $achievements = SchoolAchievement::query()->latest('achievement_date')->take(6)->get();

        return view('front.academic', compact('categories', 'programs', 'achievements'));
    }

    public function gallery()
    {
        $categories = Category::all();
        $photos = GalleryPhoto::query()->where('is_published', 'published')->latest('event_date')->paginate(12);

        return view('front.gallery', compact('categories', 'photos'));
    }

    public function contact()
    {
        $categories = Category::all();
        $schoolProfile = SchoolProfile::query()->latest()->first();

        return view('front.contact', compact('categories', 'schoolProfile'));
    }

    public function category(Category $category)
    {
        $categories = Category::all();
        $bannerads = banneradvertisement::where('is_active', 'active')
            ->where('type', 'banner')
            ->inRandomOrder()
            ->first();

        return view('front.category', compact('category', 'categories', 'bannerads'));
    }

    public function author(Author $author)
    {
        $categories = Category::all();
        $bannerads = banneradvertisement::where('is_active', 'active')
            ->where('type', 'banner')
            ->inRandomOrder()
            ->first();

        return view('front.author', compact('author', 'categories', 'bannerads'));
    }

    public function search(Request $request)
    {
        $request->validate([
            'keyword' => ['required', 'string', 'max:255'],
        ]);

        $categories = Category::all();

        $keyword = $request->keyword;

        $articles = articlenews::with(['category', 'author'])
            ->where('name', 'like', '%' . $keyword . '%')->paginate(6);

        return view('front.search', compact('articles', 'keyword', 'categories'));
    }

    public function details(articlenews $articleNews)
    {
        $categories = Category::all();

        $articles = articlenews::with(['category'])
            ->where('is_featured', 'not_featured')
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

        $author_news = articlenews::where('author_id', $articleNews->author_id)
            ->where('id', '!=', $articleNews->id)
            ->inRandomOrder()
            ->get();

        return view('front.details', compact('articleNews', 'categories', 'articles', 'bannerads', 'square_ads_1', 'square_ads_2', 'author_news'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GalleryImage;
use App\Models\Staff;
use App\Models\NewsItem;

class HomepageController extends Controller
{
    /**
     * Display the homepage
     */
    public function index()
    {
        // Get the 5 most recent gallery images for the homepage slider
        $recentGalleryImages = GalleryImage::ordered()->take(5)->get();
        
        // Get the 3 most recent published news items for the homepage news section
        $recentNews = NewsItem::recent(3)->get();
        
        return view('homepage', compact('recentGalleryImages', 'recentNews'));
    }

    /**
     * Display the staff page
     */
    public function staff()
    {
        $staff = Staff::orderBy('sort_order')->get();
        return view('staff', compact('staff'));
    }

    /**
     * Display the greeting page
     */
    public function greeting()
    {
        return view('greeting');
    }

    /**
     * Display the news page
     */
    public function news()
    {
        $news = NewsItem::published()->orderBy('published_at', 'desc')->paginate(9);
        return view('news', compact('news'));
    }

    /**
     * Display the gallery page
     */
    public function gallery(Request $request)
    {
        $query = GalleryImage::query()->ordered();
        
        // Filter by category if provided
        if ($request->filled('category') && $request->category !== 'all') {
            $query->byCategory($request->category);
        }
        
        // Filter by featured if provided
        if ($request->filled('featured') && $request->featured === '1') {
            $query->featured();
        }
        
        // Get all images with pagination
        $images = $query->paginate(12)->withQueryString();
        
        // Get categories for filtering
        $categories = GalleryImage::distinct()->pluck('category')->filter()->sort();
        
        // Get featured images for hero section
        $featuredImages = GalleryImage::featured()->ordered()->take(6)->get();
        
        return view('gallery', compact('images', 'categories', 'featuredImages'));
    }
}

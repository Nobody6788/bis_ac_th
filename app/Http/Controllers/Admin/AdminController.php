<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsItem;
use App\Models\GalleryImage;
use App\Models\SiteImage;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display the admin dashboard
     */
    public function index()
    {
        $stats = [
            'total_news' => NewsItem::count(),
            'published_news' => NewsItem::where('is_published', true)->count(),
            'total_gallery_images' => GalleryImage::count(),
            'total_site_images' => SiteImage::count(),
            'total_users' => User::count(),
            'admin_users' => User::where('role', 'admin')->count(),
        ];

        $recent_news = NewsItem::orderBy('created_at', 'desc')->limit(5)->get();
        $recent_images = GalleryImage::orderBy('created_at', 'desc')->limit(5)->get();

        return view('admin.dashboard', compact('stats', 'recent_news', 'recent_images'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = NewsItem::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'excerpt' => 'nullable|max:500',
            'category' => 'required|in:academic,sports,events,general',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_published' => 'boolean',
        ]);

        $data = $request->only(['title', 'content', 'excerpt', 'category', 'is_published']);
        
        // Handle image upload
        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadImage($request->file('image'));
        }

        // Set published_at if published
        if ($request->is_published) {
            $data['published_at'] = now();
        }

        NewsItem::create($data);

        return redirect()->route('admin.news.index')
            ->with('success', 'News item created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(NewsItem $news)
    {
        return view('admin.news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NewsItem $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NewsItem $news)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'excerpt' => 'nullable|max:500',
            'category' => 'required|in:academic,sports,events,general',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_published' => 'boolean',
        ]);

        $data = $request->only(['title', 'content', 'excerpt', 'category', 'is_published']);
        
        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image
            if ($news->image) {
                Storage::delete($news->image);
            }
            $data['image'] = $this->uploadImage($request->file('image'));
        }

        // Set published_at if newly published
        if ($request->is_published && !$news->is_published) {
            $data['published_at'] = now();
        } elseif (!$request->is_published) {
            $data['published_at'] = null;
        }

        $news->update($data);

        return redirect()->route('admin.news.index')
            ->with('success', 'News item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NewsItem $news)
    {
        // Delete image if exists
        if ($news->image) {
            Storage::delete($news->image);
        }

        $news->delete();

        return redirect()->route('admin.news.index')
            ->with('success', 'News item deleted successfully.');
    }

    /**
     * Upload image and return path
     */
    private function uploadImage($file)
    {
        $filename = Str::random(20) . '.' . $file->getClientOriginalExtension();
        return $file->storeAs('news', $filename, 'public');
    }
}

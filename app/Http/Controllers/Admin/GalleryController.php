<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = GalleryImage::ordered()->paginate(12);
        return view('admin.gallery.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable|max:500',
            'category' => 'required|in:classrooms,labs,sports,campus,events',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_featured' => 'boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $data = $request->only(['title', 'description', 'category', 'is_featured', 'sort_order']);
        $data['image'] = $this->uploadImage($request->file('image'));
        $data['sort_order'] = $data['sort_order'] ?? 0;

        GalleryImage::create($data);

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Gallery image uploaded successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(GalleryImage $gallery)
    {
        return view('admin.gallery.show', compact('gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GalleryImage $gallery)
    {
        return view('admin.gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GalleryImage $gallery)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable|max:500',
            'category' => 'required|in:classrooms,labs,sports,campus,events',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_featured' => 'boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $data = $request->only(['title', 'description', 'category', 'is_featured', 'sort_order']);
        $data['sort_order'] = $data['sort_order'] ?? 0;
        
        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image
            Storage::delete($gallery->image);
            $data['image'] = $this->uploadImage($request->file('image'));
        }

        $gallery->update($data);

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Gallery image updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GalleryImage $gallery)
    {
        // Delete image file
        Storage::delete($gallery->image);
        $gallery->delete();

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Gallery image deleted successfully.');
    }

    /**
     * Upload image and return path
     */
    private function uploadImage($file)
    {
        $filename = Str::random(20) . '.' . $file->getClientOriginalExtension();
        return $file->storeAs('gallery', $filename, 'public');
    }
}

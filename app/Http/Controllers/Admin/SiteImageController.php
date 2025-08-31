<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SiteImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = SiteImage::orderBy('location')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.site-images.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.site-images.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable|max:500',
            'location' => 'required|in:hero,about,footer,banner',
            'alt_text' => 'nullable|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'boolean',
        ]);

        $data = $request->only(['name', 'description', 'location', 'alt_text', 'is_active']);
        $data['image'] = $this->uploadImage($request->file('image'));

        // Deactivate other images in same location if this is active
        if ($data['is_active']) {
            SiteImage::where('location', $data['location'])->update(['is_active' => false]);
        }

        SiteImage::create($data);

        return redirect()->route('admin.site-images.index')
            ->with('success', 'Site image uploaded successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(SiteImage $siteImage)
    {
        return view('admin.site-images.show', compact('siteImage'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SiteImage $siteImage)
    {
        return view('admin.site-images.edit', compact('siteImage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SiteImage $siteImage)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable|max:500',
            'location' => 'required|in:hero,about,footer,banner',
            'alt_text' => 'nullable|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'boolean',
        ]);

        $data = $request->only(['name', 'description', 'location', 'alt_text', 'is_active']);
        
        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image
            Storage::delete($siteImage->image);
            $data['image'] = $this->uploadImage($request->file('image'));
        }

        // Deactivate other images in same location if this is active
        if ($data['is_active']) {
            SiteImage::where('location', $data['location'])
                     ->where('id', '!=', $siteImage->id)
                     ->update(['is_active' => false]);
        }

        $siteImage->update($data);

        return redirect()->route('admin.site-images.index')
            ->with('success', 'Site image updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SiteImage $siteImage)
    {
        // Delete image file
        Storage::delete($siteImage->image);
        $siteImage->delete();

        return redirect()->route('admin.site-images.index')
            ->with('success', 'Site image deleted successfully.');
    }

    /**
     * Upload image and return path
     */
    private function uploadImage($file)
    {
        $filename = Str::random(20) . '.' . $file->getClientOriginalExtension();
        return $file->storeAs('site-images', $filename, 'public');
    }
}

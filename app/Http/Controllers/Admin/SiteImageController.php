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
        $locations = $this->getImageLocations();
        return view('admin.site-images.index', compact('images', 'locations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $locations = $this->getImageLocations();
        return view('admin.site-images.create', compact('locations'));
    }

    /**
     * Get available image locations with descriptions
     */
    private function getImageLocations()
    {
        return [
            'hero-slide-1' => 'Hero Slider - Academic Excellence',
            'hero-slide-2' => 'Hero Slider - Sports & Activities',
            'hero-slide-3' => 'Hero Slider - Arts & Creativity',
            'hero-slide-4' => 'Hero Slider - Global Citizenship',
            'hero-background' => 'Hero Section Background',
            'about-section' => 'About Section Image',
            'programs-section' => 'Programs Section Image',
            'facilities-section' => 'Facilities Section Image',
            'footer-banner' => 'Footer Banner Image',
            'contact-section' => 'Contact Section Image',
            'banner-main' => 'Main Banner Image',
            'gallery-featured' => 'Gallery Featured Image'
        ];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $locations = $this->getImageLocations();
        $validLocations = array_keys($locations);
        
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable|max:500',
            'location' => 'required|in:' . implode(',', $validLocations),
            'alt_text' => 'nullable|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:1048576', // 1GB in KB
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
        $locations = $this->getImageLocations();
        return view('admin.site-images.show', compact('siteImage', 'locations'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SiteImage $siteImage)
    {
        $locations = $this->getImageLocations();
        return view('admin.site-images.edit', compact('siteImage', 'locations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SiteImage $siteImage)
    {
        $locations = $this->getImageLocations();
        $validLocations = array_keys($locations);
        
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable|max:500',
            'location' => 'required|in:' . implode(',', $validLocations),
            'alt_text' => 'nullable|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1048576', // 1GB in KB
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

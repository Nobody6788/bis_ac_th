<?php

use Illuminate\Support\Facades\Route;
use App\Models\GalleryImage;
use Illuminate\Support\Facades\Storage;

Route::get('/gallery-debug', function () {
    // Get the first gallery image
    $image = GalleryImage::first();
    
    if (!$image) {
        return 'No gallery images found in the database.';
    }
    
    // Check if the image file exists in storage
    $existsInStorage = Storage::disk('public')->exists($image->image);
    
    // Get the full path to the image
    $fullPath = Storage::disk('public')->path($image->image);
    
    // Check if the public storage directory is linked
    $storageLinkExists = is_link(public_path('storage'));
    $storageLinkTarget = $storageLinkExists ? readlink(public_path('storage')) : 'Not linked';
    
    return [
        'image_record' => [
            'id' => $image->id,
            'title' => $image->title,
            'image_path' => $image->image,
            'image_url' => $image->image_url,
        ],
        'storage' => [
            'exists_in_storage' => $existsInStorage,
            'full_path' => $fullPath,
            'public_path' => public_path(),
            'storage_path' => storage_path('app/public'),
            'storage_link_exists' => $storageLinkExists,
            'storage_link_target' => $storageLinkTarget,
        ],
        'app' => [
            'url' => config('app.url'),
            'environment' => config('app.env'),
            'debug' => config('app.debug'),
        ]
    ];
});



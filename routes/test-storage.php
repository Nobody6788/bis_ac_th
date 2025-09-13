<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/test-storage', function () {
    // Test storage paths
    $storagePath = storage_path('app/public');
    $publicPath = public_path('storage');
    
    // Check if storage link exists
    $storageLinkExists = is_link($publicPath);
    $storageLinkTarget = $storageLinkExists ? readlink($publicPath) : 'Not found';
    
    // Check if gallery directory exists
    $galleryPath = $storagePath . '/gallery';
    $galleryExists = is_dir($galleryPath);
    
    // List files in gallery directory
    $files = [];
    if ($galleryExists) {
        $files = array_diff(scandir($galleryPath), ['.', '..']);
    }
    
    return [
        'storage_path' => $storagePath,
        'public_path' => $publicPath,
        'storage_link' => [
            'exists' => $storageLinkExists,
            'target' => $storageLinkTarget,
        ],
        'gallery' => [
            'path' => $galleryPath,
            'exists' => $galleryExists,
            'files' => $files,
        ],
    ];
});

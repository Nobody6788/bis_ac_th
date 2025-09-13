<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/test-storage-helper', function () {
    // Create a test file if it doesn't exist
    $testFilePath = 'public/gallery/test-file.txt';
    if (!Storage::exists($testFilePath)) {
        Storage::put($testFilePath, 'This is a test file');
    }
    
    // Get file info
    $fileInfo = [
        'path' => $testFilePath,
        'exists' => Storage::exists($testFilePath),
        'url' => Storage::url($testFilePath),
        'size' => Storage::exists($testFilePath) ? Storage::size($testFilePath) : 0,
    ];
    
    // Check if the file is accessible via URL
    $fileUrl = url(Storage::url($testFilePath));
    $fileAccessible = @file_get_contents($fileUrl) !== false;
    
    return [
        'storage_config' => [
            'default' => config('filesystems.default'),
            'public' => [
                'driver' => config('filesystems.disks.public.driver'),
                'root' => config('filesystems.disks.public.root'),
                'url' => config('filesystems.disks.public.url'),
            ],
        ],
        'file_info' => $fileInfo,
        'file_accessible' => $fileAccessible,
        'file_url' => $fileUrl,
        'directories' => [
            'storage_path' => storage_path(),
            'public_path' => public_path(),
            'storage_app_public' => storage_path('app/public'),
            'public_storage' => public_path('storage'),
        ],
    ];
});

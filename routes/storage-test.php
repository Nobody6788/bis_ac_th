<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/storage-test', function () {
    // Simple test to check if we can write and read from storage
    $testContent = 'Test content ' . now()->toDateTimeString();
    $testPath = 'test-file.txt';
    
    // Write test file
    Storage::disk('public')->put($testPath, $testContent);
    
    // Read test file
    $storedContent = Storage::disk('public')->get($testPath);
    
    // Get URL
    $url = asset('storage/' . $testPath);
    
    // Check if file exists at URL
    $fileExistsAtUrl = @file_get_contents($url) !== false;
    
    return [
        'test_content' => $testContent,
        'stored_content' => $storedContent,
        'url' => $url,
        'file_exists_at_url' => $fileExistsAtUrl,
        'storage_path' => storage_path('app/public'),
        'public_path' => public_path('storage'),
        'is_link' => is_link(public_path('storage')),
        'link_target' => is_link(public_path('storage')) ? readlink(public_path('storage')) : 'Not a link',
    ];
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\SiteImageController;

Route::get('/', function () {
    return view('homepage');
})->name('home');

Route::get('/welcome', function () {
    return view('welcome');
});

// Admin Routes - Protected by admin middleware
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    // Dashboard
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    
    // News Management
    Route::resource('news', NewsController::class);
    
    // Gallery Management
    Route::resource('gallery', GalleryController::class);
    
    // Site Images Management
    Route::resource('site-images', SiteImageController::class);
});

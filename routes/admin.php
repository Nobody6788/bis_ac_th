<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\SiteImageController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProgramController;
use Illuminate\Support\Facades\Route;

// Admin Routes - Protected by admin middleware
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    
    // Dashboard
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    
    // Content Management
    Route::resource('content', ContentController::class);
    Route::post('content/{content}/toggle-status', [ContentController::class, 'toggleStatus'])->name('content.toggle-status');
    Route::post('content/bulk-update', [ContentController::class, 'bulkUpdate'])->name('content.bulk-update');
    Route::get('content/{content}/preview', [ContentController::class, 'preview'])->name('content.preview');
    
    // News Management
    Route::resource('news', NewsController::class);
    Route::post('news/{news}/toggle-publish', [NewsController::class, 'togglePublish'])->name('news.toggle-publish');
    Route::post('news/bulk-update', [NewsController::class, 'bulkUpdate'])->name('news.bulk-update');
    
    // Gallery Management
    Route::resource('gallery', GalleryController::class);
    Route::post('gallery/{gallery}/toggle-featured', [GalleryController::class, 'toggleFeatured'])->name('gallery.toggle-featured');
    Route::post('gallery/bulk-delete', [GalleryController::class, 'bulkDelete'])->name('gallery.bulk-delete');
    
    // Site Images Management
    Route::resource('site-images', SiteImageController::class);
    Route::post('site-images/{siteImage}/set-primary', [SiteImageController::class, 'setPrimary'])->name('site-images.set-primary');

    // Program Management
    Route::resource('programs', ProgramController::class);
    Route::post('programs/{program}/toggle-status', [ProgramController::class, 'toggleStatus'])->name('programs.toggle-status');

    // Staff Management
    Route::resource('staff', StaffController::class);
    
    // User Management
    Route::prefix('users')->name('users.')->group(function () {
        // List all approved admin users
        Route::get('/', [UserController::class, 'index'])->name('index');
        
        // Pending admin approvals (only for superadmin)
        Route::middleware(['auth', 'admin:superadmin'])->group(function () {
            Route::get('pending', [UserController::class, 'pending'])->name('pending');
            Route::post('{user}/approve', [UserController::class, 'approve'])->name('approve');
            Route::delete('{user}/reject', [UserController::class, 'reject'])->name('reject');
        });
    });
    
    // Debug content management
    Route::get('debug-content', function() {
        $sections = App\Models\ContentSection::orderBy('section_key')->get();
        return view('admin.debug-content', compact('sections'));
    })->name('debug-content');
});
<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomepageController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;
use App\Http\Middleware\LocaleMiddleware;

// Apply LocaleMiddleware to all web routes
Route::middleware([LocaleMiddleware::class])->group(function () {
    // Homepage Routes
    Route::get('/', [HomepageController::class, 'index'])->name('homepage');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/staff', [HomepageController::class, 'staff'])->name('staff');
    Route::get('/greeting', [HomepageController::class, 'greeting'])->name('greeting');
    Route::get('/news', [HomepageController::class, 'news'])->name('news');
    Route::get('/gallery', [HomepageController::class, 'gallery'])->name('gallery');
});

// Dashboard for authenticated users
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile Management
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Authentication Routes
require __DIR__.'/auth.php';

// Debug route for gallery
require __DIR__.'/gallery-debug.php';

// Language switching route
Route::post('/change-language', function(Request $request) {
    $supportedLocales = ['en', 'th'];
    $data = $request->json()->all();
    $locale = $data['language'] ?? 'en';
    
    if (in_array($locale, $supportedLocales)) {
        Session::put('locale', $locale);
        App::setLocale($locale);
    }
    
    return response()->json([
        'success' => true,
        'locale' => $locale,
        'message' => 'Language switched successfully'
    ]);
})->name('language.switch');

// API route for translations
Route::get('/api/translations/{locale}', function($locale) {
    $supportedLocales = ['en', 'th', 'ko'];
    
    if (!in_array($locale, $supportedLocales)) {
        $locale = 'en';
    }
    
    try {
        $translations = trans('frontend', [], $locale);
        
        // Flatten the nested array for easier JavaScript access
        $flattened = [];
        $flatten = function($array, $prefix = '') use (&$flattened, &$flatten) {
            foreach ($array as $key => $value) {
                $newKey = $prefix ? $prefix . '.' . $key : $key;
                if (is_array($value)) {
                    $flatten($value, $newKey);
                } else {
                    $flattened[$newKey] = $value;
                }
            }
        };
        
        $flatten($translations);
        
        return response()->json($flattened);
    } catch (Exception $e) {
        return response()->json(['error' => 'Translations not found'], 404);
    }
})->name('api.translations');

// Admin Routes
require __DIR__.'/admin.php';

// Debug route to test content management
Route::get('/debug-content', function() {
    $sections = \App\Models\ContentSection::all();
    $html = '<h1>Content Sections Debug</h1>';
    
    foreach($sections as $section) {
        $html .= '<div style="border: 1px solid #ccc; margin: 10px; padding: 10px;">';
        $html .= '<h3>' . $section->section_key . '</h3>';
        $html .= '<p><strong>Content:</strong> ' . $section->content . '</p>';
        $html .= '<p><strong>Active:</strong> ' . ($section->is_active ? 'Yes' : 'No') . '</p>';
        $html .= '<p><strong>Updated:</strong> ' . $section->updated_at . '</p>';
        $html .= '</div>';
    }
    
    return $html;
});

// Test route for storage configuration
// Debug route to check database connection and tables
Route::get('/debug/db', function () {
    try {
        // Test database connection
        DB::connection()->getPdo();
        
        // Get all tables
        $tables = DB::select('SHOW TABLES');
        
        return [
            'status' => 'connected',
            'database' => DB::connection()->getDatabaseName(),
            'tables' => $tables,
            'programs_columns' => Schema::hasTable('programs') ? Schema::getColumnListing('programs') : 'programs table does not exist'
        ];
    } catch (\Exception $e) {
        return [
            'status' => 'error',
            'message' => $e->getMessage(),
            'config' => [
                'driver' => config('database.default'),
                'database' => config('database.connections.' . config('database.default') . '.database')
            ]
        ];
    }
});

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
        'app_url' => config('app.url'),
        'filesystem_config' => [
            'default' => config('filesystems.default'),
            'disks' => [
                'public' => [
                    'driver' => config('filesystems.disks.public.driver'),
                    'root' => config('filesystems.disks.public.root'),
                    'url' => config('filesystems.disks.public.url'),
                    'visibility' => config('filesystems.disks.public.visibility'),
                ]
            ]
        ]
    ];
});

// Include test routes
require __DIR__.'/storage-test.php';

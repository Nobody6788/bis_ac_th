<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class GalleryImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'category',
        'is_featured',
        'sort_order',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
    ];

    /**
     * Get the full URL for the gallery image
     */
    public function getImageUrlAttribute(): ?string
    {
        if (!$this->image) {
            return null;
        }
        
        // Check if the image path is already a full URL
        if (filter_var($this->image, FILTER_VALIDATE_URL)) {
            return $this->image;
        }
        
        // Generate URL without relying on symbolic link
        $baseUrl = rtrim(config('app.url'), '/');
        $storagePath = str_replace('\\', '/', $this->image);
        
        // Remove 'public/' prefix if it exists
        if (strpos($storagePath, 'public/') === 0) {
            $storagePath = substr($storagePath, 7);
        }
        
        return "{$baseUrl}/storage/{$storagePath}";
    }

    /**
     * Scope for featured images
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Scope for ordered images
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('created_at', 'desc');
    }

    /**
     * Scope by category
     */
    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }
}

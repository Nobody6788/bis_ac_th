<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContentSection extends Model
{
    protected $fillable = [
        'section_key',
        'section_name',
        'content',
        'content_type',
        'page',
        'order',
        'is_active',
        'metadata'
    ];

    protected $casts = [
        'metadata' => 'array',
        'is_active' => 'boolean'
    ];

    /**
     * Scope to get active content sections
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope to get content by page
     */
    public function scopeByPage($query, $page)
    {
        return $query->where('page', $page);
    }

    /**
     * Get content by section key
     */
    public static function getContent($sectionKey, $default = '')
    {
        $section = self::where('section_key', $sectionKey)->active()->first();
        return $section ? $section->content : $default;
    }

    /**
     * Get formatted content based on content type
     */
    public function getFormattedContent()
    {
        switch ($this->content_type) {
            case 'html':
                return $this->content;
            case 'markdown':
                // For now, return as plain text. You can add markdown parser later
                return nl2br(e($this->content));
            case 'text':
            default:
                return nl2br(e($this->content));
        }
    }
}

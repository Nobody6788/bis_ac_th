<?php

namespace App\Helpers;

use Illuminate\Support\Facades\App;

class LocaleHelper
{
    /**
     * Get all supported locales
     */
    public static function getSupportedLocales(): array
    {
        return ['en', 'th', 'ko'];
    }
    
    /**
     * Get locale flags mapping
     */
    public static function getLocaleFlags(): array
    {
        return [
            'en' => '🇺🇸',
            'th' => '🇹🇭',
            'ko' => '🇰🇷'
        ];
    }
    
    /**
     * Get locale names mapping
     */
    public static function getLocaleNames(): array
    {
        return [
            'en' => 'English',
            'th' => 'ไทย',
            'ko' => '한국어'
        ];
    }
    
    /**
     * Get current locale flag
     */
    public static function getCurrentLocaleFlag(): string
    {
        $flags = self::getLocaleFlags();
        return $flags[App::getLocale()] ?? $flags['en'];
    }
    
    /**
     * Get current locale name
     */
    public static function getCurrentLocaleName(): string
    {
        $names = self::getLocaleNames();
        return $names[App::getLocale()] ?? $names['en'];
    }
    
    /**
     * Check if given locale is supported
     */
    public static function isSupported(string $locale): bool
    {
        return in_array($locale, self::getSupportedLocales());
    }
    
    /**
     * Get locale display string for dropdown
     */
    public static function getLocaleDisplay(string $locale, bool $includeFlag = true): string
    {
        $flags = self::getLocaleFlags();
        $names = self::getLocaleNames();
        
        $flag = $includeFlag ? ($flags[$locale] ?? '') : '';
        $name = $names[$locale] ?? $locale;
        
        return trim($flag . ' ' . $name);
    }
}
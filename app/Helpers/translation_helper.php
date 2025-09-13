<?php

if (!function_exists('__t')) {
    /**
     * Translate the given message.
     *
     * @param  string  $key
     * @param  array  $replace
     * @param  string|null  $locale
     * @return string|array|null
     */
    function __t($key = null, $replace = [], $locale = null)
    {
        if (is_null($key)) {
            return $key;
        }

        $translation = __("messages.$key", $replace, $locale);
        
        // If translation doesn't exist, return the last part of the key
        if ($translation === "messages.$key") {
            $parts = explode('.', $key);
            return end($parts);
        }
        
        return $translation;
    }
}

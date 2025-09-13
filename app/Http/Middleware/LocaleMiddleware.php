<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class LocaleMiddleware
{
    protected $supportedLocales = ['en', 'th'];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Get the locale from the request or session
        $locale = $this->getLocale($request);

        // Set the application locale
        App::setLocale($locale);

        // Share the current locale with all views
        view()->share('currentLocale', $locale);
        view()->share('otherLocale', $locale === 'en' ? 'th' : 'en');
        view()->share('isRTL', $locale === 'th');

        // Set the locale in the response
        $response = $next($request);
        $response->headers->set('Content-Language', $locale);
        $response->headers->set('Vary', 'Accept-Language');

        return $response;
    }

    /**
     * Get the locale from the request or session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function getLocale($request)
    {
        // Check URL parameter first
        if ($request->has('lang') && in_array($request->get('lang'), $this->supportedLocales)) {
            $locale = $request->get('lang');
            Session::put('locale', $locale);
            return $locale;
        }

        // Check session
        if (Session::has('locale') && in_array(Session::get('locale'), $this->supportedLocales)) {
            return Session::get('locale');
        }

        // Check browser preferences
        if ($request->header('Accept-Language')) {
            $browserLocales = $this->parseAcceptLanguage($request->header('Accept-Language'));
            foreach ($browserLocales as $browserLocale) {
                if (in_array($browserLocale, $this->supportedLocales)) {
                    Session::put('locale', $browserLocale);
                    return $browserLocale;
                }
            }
        }

        // Fallback to default
        $locale = config('app.locale', 'en');
        Session::put('locale', $locale);
        
        return $locale;
    }
    
    /**
     * Parse the Accept-Language header
     */
    private function parseAcceptLanguage($acceptLanguage): array
    {
        $languages = [];
        
        if ($acceptLanguage) {
            $parts = explode(',', $acceptLanguage);
            
            foreach ($parts as $part) {
                $part = trim($part);
                $langParts = explode(';', $part);
                $lang = trim($langParts[0]);
                
                // Extract just the language code (ignore country codes)
                if (strpos($lang, '-') !== false) {
                    $lang = substr($lang, 0, strpos($lang, '-'));
                }
                
                $languages[] = strtolower($lang);
            }
        }
        
        return array_unique($languages);
    }
}
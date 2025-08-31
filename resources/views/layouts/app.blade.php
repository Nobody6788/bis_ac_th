<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Boston International School Chiangmai - Excellence in Education')</title>
    <meta name="description" content="@yield('description', 'Boston International School Chiangmai provides world-class education with a focus on academic excellence, character development, and global citizenship.')">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700,800" rel="stylesheet" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/favicon.ico">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="@yield('title', 'Boston International School Chiangmai')">
    <meta property="og:description" content="@yield('description', 'Excellence in Education')">
    <meta property="og:image" content="@yield('og_image', asset('images/school-logo.jpg'))">
    <meta property="og:url" content="{{ url()->current() }}">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>
<body class="bg-gray-50 text-gray-900 antialiased">
    <!-- Skip to main content -->
    <a href="#main-content" class="sr-only focus:not-sr-only focus:absolute focus:top-0 focus:left-0 bg-blue-600 text-white p-2 z-50">
        Skip to main content
    </a>

    <!-- Header -->
    <header class="bg-white shadow-sm sticky top-0 z-40">
        <!-- Navigation Bar (White) -->
        <nav class="bg-white container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16 lg:h-20">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center space-x-3">
                        <img id="school-logo" src="/logo-en.jpeg" alt="School Logo" class="w-10 h-10 lg:w-12 lg:h-12 rounded-lg object-cover">
                        <div class="hidden sm:block">
                            <h1 class="text-xl lg:text-2xl font-bold text-gray-900" data-translate="school.name">Boston International School</h1>
                            <p class="text-sm -mt-1 text-black" data-translate="school.subtitle">Chiangmai</p>
                        </div>
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden lg:flex items-center space-x-8">
                    <!-- About BIS -->
                    <div class="relative group">
                        <button class="flex items-center space-x-1 px-3 py-2 font-medium transition-colors text-gray-700 hover:text-blue-600" data-translate="nav.about">
                            <span>About BIS</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div class="absolute left-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 py-2 z-50 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                            <a href="#ceo" class="block px-4 py-2 text-gray-700 hover:bg-gray-50 transition-colors">CEO</a>
                            <a href="#teachers" class="block px-4 py-2 text-gray-700 hover:bg-gray-50 transition-colors">Teachers</a>
                        </div>
                    </div>

                    <!-- News & Updates -->
                    <div class="relative group">
                        <button class="flex items-center space-x-1 px-3 py-2 font-medium transition-colors text-gray-700 hover:text-blue-600" data-translate="nav.notice">
                            <span>News & Updates</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div class="absolute left-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 py-2 z-50 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                            <a href="#news" class="block px-4 py-2 text-gray-700 hover:bg-gray-50 transition-colors">News & Notice</a>
                            <a href="#gallery" class="block px-4 py-2 text-gray-700 hover:bg-gray-50 transition-colors">Gallery</a>
                        </div>
                    </div>

                    <!-- Contact Us -->
                    <a href="#contact" class="text-gray-700 hover:text-blue-600 font-medium transition-colors px-3 py-2" data-translate="nav.contact">Contact Us</a>
                    
                    <!-- Language Dropdown -->
                    <div class="relative">
                        <button id="language-dropdown" class="flex items-center space-x-2 px-3 py-3 font-medium transition-colors border border-gray-300 text-gray-700 hover:border-blue-600 hover:text-blue-600 rounded-lg select-none min-h-11">
                            <span id="current-language">🇺🇸 <span class="hidden sm:inline">English</span></span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        
                        <div id="language-menu" class="absolute right-0 mt-2 w-40 bg-white rounded-lg shadow-lg border border-gray-200 py-2 z-50 hidden">
                            <a href="#" data-lang="en" class="flex items-center space-x-3 px-4 py-2 text-[--color-text-primary] hover:bg-gray-50 active:bg-gray-100 transition-colors select-none" style="-webkit-tap-highlight-color: transparent; -webkit-user-select: none; user-select: none;">
                                <span class="text-lg">🇺🇸</span>
                                <span class="font-medium">English</span>
                            </a>
                            <a href="#" data-lang="th" class="flex items-center space-x-3 px-4 py-2 text-[--color-text-primary] hover:bg-gray-50 active:bg-gray-100 transition-colors select-none" style="-webkit-tap-highlight-color: transparent; -webkit-user-select: none; user-select: none;">
                                <span class="text-lg">🇹🇭</span>
                                <span class="font-medium">ไทย</span>
                            </a>
                            <a href="#" data-lang="ko" class="flex items-center space-x-3 px-4 py-2 text-[--color-text-primary] hover:bg-gray-50 active:bg-gray-100 transition-colors select-none" style="-webkit-tap-highlight-color: transparent; -webkit-user-select: none; user-select: none;">
                                <span class="text-lg">🇰🇷</span>
                                <span class="font-medium">한국어</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Mobile Menu Button -->
                <div class="lg:hidden">
                    <button 
                        id="mobile-menu-button"
                        type="button" 
                        class="text-gray-700 hover:text-blue-600 hover:opacity-80 focus:outline-none transition-all"
                        aria-expanded="false"
                        aria-label="Toggle mobile menu"
                    >
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Navigation -->
            <div id="mobile-menu" class="lg:hidden hidden">
                <div class="bg-white px-2 pt-2 pb-3 space-y-1 border-t border-gray-200">
                    <!-- About BIS Section -->
                    <div class="px-3 py-2">
                        <h3 class="text-sm font-semibold text-gray-900">About BIS</h3>
                        <div class="mt-2 ml-2 space-y-1">
                            <a href="#ceo" class="block px-3 py-2 text-sm text-gray-700 hover:text-blue-600 transition-colors">CEO</a>
                            <a href="#teachers" class="block px-3 py-2 text-sm text-gray-700 hover:text-blue-600 transition-colors">Teachers</a>
                        </div>
                    </div>
                    
                    <!-- News & Updates Section -->
                    <div class="px-3 py-2">
                        <h3 class="text-sm font-semibold text-gray-900">News & Updates</h3>
                        <div class="mt-2 ml-2 space-y-1">
                            <a href="#news" class="block px-3 py-2 text-sm text-gray-700 hover:text-blue-600 transition-colors">News & Notice</a>
                            <a href="#gallery" class="block px-3 py-2 text-sm text-gray-700 hover:text-blue-600 transition-colors">Gallery</a>
                        </div>
                    </div>
                    
                    <!-- Contact Us -->
                    <a href="#contact" class="block px-3 py-2 text-gray-700 hover:text-blue-600 font-medium transition-colors">Contact Us</a>
                    
                    <!-- Mobile Language Selector -->
                    <div class="px-3 py-2">
                        <div class="relative">
                            <button 
                                id="mobile-language-dropdown" 
                                type="button"
                                class="flex items-center justify-between w-full px-4 py-3 font-medium border border-gray-300 rounded-lg bg-gray-50 text-gray-700 hover:bg-gray-100 hover:border-blue-600 transition-colors cursor-pointer select-none min-h-12"
                            >
                                <span id="mobile-current-language">🇺🇸 English</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            
                            <div id="mobile-language-menu" class="absolute left-0 right-0 mt-2 bg-white rounded-lg shadow-lg border border-gray-200 py-2 z-50 hidden">
                                <a href="#" data-lang="en" class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-50 transition-colors select-none">
                                    <span>🇺🇸</span>
                                    <span>English</span>
                                </a>
                                <a href="#" data-lang="th" class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-50 transition-colors select-none">
                                    <span>🇹🇭</span>
                                    <span>ไทย</span>
                                </a>
                                <a href="#" data-lang="ko" class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:bg-gray-50 transition-colors select-none">
                                    <span>🇰🇷</span>
                                    <span>한국어</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </header>

    <!-- Main Content -->
    <main id="main-content">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer style="background-color: var(--color-footer-black);" class="text-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- School Info -->
                <div class="lg:col-span-2">
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="w-12 h-12 bg-[--color-school-blue] rounded-lg flex items-center justify-center">
                            <span class="text-white font-bold text-2xl">B</span>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold" style="color: var(--color-text-white);" data-translate="school.name">Boston International School</h3>
                            <p style="color: var(--color-text-light-gray);" data-translate="school.tagline">Chiangmai</p>
                        </div>
                    </div>
                    <p class="mb-4 max-w-md" style="color: var(--color-text-light-gray);" data-translate="footer.description">
                        Empowering students to become global citizens through innovative education, 
                        character development, and academic excellence at Boston International School Chiangmai.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" style="color: var(--color-text-light-gray);" class="hover:text-white transition-colors">
                            <span class="sr-only">Facebook</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/>
                            </svg>
                        </a>
                        <a href="#" style="color: var(--color-text-light-gray);" class="hover:text-white transition-colors">
                            <span class="sr-only">Instagram</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 6.621 5.367 11.988 11.988 11.988s11.987-5.367 11.987-11.988C24.005 5.367 18.637.001 12.017.001zM8.449 16.988c-1.297 0-2.348-1.051-2.348-2.348s1.051-2.348 2.348-2.348 2.348 1.051 2.348 2.348-1.051 2.348-2.348 2.348zm7.718 0c-1.297 0-2.348-1.051-2.348-2.348s1.051-2.348 2.348-2.348 2.348 1.051 2.348 2.348-1.051 2.348-2.348 2.348z"/>
                            </svg>
                        </a>
                        <a href="#" style="color: var(--color-text-light-gray);" class="hover:text-white transition-colors">
                            <span class="sr-only">YouTube</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-lg font-semibold mb-4" style="color: var(--color-text-white);" data-translate="footer.links">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="#about" style="color: var(--color-text-sky-blue);" class="hover:text-white transition-colors">About Us</a></li>
                        <li><a href="#programs" style="color: var(--color-text-sky-blue);" class="hover:text-white transition-colors">Academic Programs</a></li>
                        <li><a href="#admissions" style="color: var(--color-text-sky-blue);" class="hover:text-white transition-colors">Admissions</a></li>
                        <li><a href="#gallery" style="color: var(--color-text-sky-blue);" class="hover:text-white transition-colors">Campus Tour</a></li>
                        <li><a href="#news" style="color: var(--color-text-sky-blue);" class="hover:text-white transition-colors">News & Events</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h4 class="text-lg font-semibold mb-4" style="color: var(--color-text-white);" data-translate="footer.contact">Contact Us</h4>
                    <div class="space-y-2" style="color: var(--color-text-white);">
                        <p class="flex items-center">
                            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            123 Education Avenue<br>Bangkok, Thailand 10110
                        </p>
                        <p class="flex items-center">
                            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            +66 2 123-4567
                        </p>
                        <p class="flex items-center">
                            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            info@pinnacleintl.edu
                        </p>
                    </div>
                </div>
            </div>

            <!-- Bottom Footer -->
            <div class="mt-8 pt-8 border-t border-gray-700 flex flex-col md:flex-row justify-between items-center">
                <p class="text-sm" style="color: var(--color-text-light-gray);" data-translate="footer.copyright">
                    &copy; {{ date('Y') }} Boston International School Chiangmai. All rights reserved.
                </p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="#" style="color: var(--color-text-light-gray);" class="hover:text-white text-sm transition-colors">Privacy Policy</a>
                    <a href="#" style="color: var(--color-text-light-gray);" class="hover:text-white text-sm transition-colors">Terms of Service</a>
                    <a href="#" style="color: var(--color-text-light-gray);" class="hover:text-white text-sm transition-colors">Accessibility</a>
                </div>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
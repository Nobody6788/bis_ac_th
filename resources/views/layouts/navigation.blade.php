<header class="w-full">
    <!-- Top Contact Bar -->
    <div class="bg-[#1e3a5f] text-white py-2 px-4">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row items-start md:items-center gap-2 md:gap-6">
                <div class="flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                    </svg>
                    <span>032-345-501</span>
                </div>
                <div class="flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    <span>info@ucis.ac.th</span>
                </div>
                <div class="flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <span>Admission Calendar</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Header -->
    <div class="bg-[#2c5282] text-white">
        <div class="max-w-7xl mx-auto">
            <!-- Navigation -->
            <nav class="flex items-center justify-between py-3 px-4">
                <div class="hidden md:flex items-center gap-8">
                    <!-- About BIS Dropdown -->
                    <div class="relative group">
                        <button class="flex items-center gap-1 text-sm font-medium hover:text-blue-200 transition-colors">
                            {{ __t('nav.about') }}
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <!-- Dropdown Menu -->
                        <div class="absolute left-0 mt-2 w-64 bg-white rounded-md shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                            <div class="py-1">
                                <a href="{{ route('homepage') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50">
                                    {{ __t('home.school_name') }}
                                </a>
                                <a href="{{ route('greeting') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50">
                                    {{ __t('home.greeting') }}
                                </a>
                                <a href="{{ route('staff') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50">
                                    {{ __t('home.teachers') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Notice Board Dropdown -->
                    <div class="relative group">
                        <button class="flex items-center gap-1 text-sm font-medium hover:text-blue-200 transition-colors">
                            {{ __t('nav.notice_board') }}
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <!-- Dropdown Menu -->
                        <div class="absolute left-0 mt-2 w-48 bg-white rounded-md shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                            <div class="py-1">
                                <a href="{{ route('news') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50">
                                    {{ __t('nav.news_notice') }}
                                </a>
                                <a href="{{ route('gallery') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50">
                                    {{ __t('nav.gallery') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <a href="{{ route('home') }}#contact" class="text-sm font-medium text-white hover:text-blue-200 transition-colors">
                        {{ __t('nav.contact') }}
                    </a>
                </div>
                
                <div class="hidden md:flex items-center">
                    <x-language-switcher :current-locale="app()->getLocale()" />
                </div>
                
                <!-- Mobile menu button -->
                <button @click="isMobileMenuOpen = !isMobileMenuOpen" class="md:hidden text-white focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </nav>

            <!-- Mobile Navigation Menu -->
            <div x-show="isMobileMenuOpen" class="md:hidden bg-[#2c5282] border-t border-blue-400/30">
                <div class="py-4 px-4 space-y-2">
                    <!-- About BIS Mobile Dropdown -->
                    <div x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center justify-between w-full text-sm font-medium hover:text-blue-200 transition-colors py-2 text-left">
                            {{ __t('nav.about') }}
                            <svg :class="{ 'transform rotate-180': open }" class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div x-show="open" class="ml-4 mt-1 space-y-1">
                            <a href="{{ route('homepage') }}" class="block py-1 text-sm text-blue-100 hover:text-white">
                                {{ __t('home.school_name') }}
                            </a>
                            <a href="{{ route('greeting') }}" class="block py-1 text-sm text-blue-100 hover:text-white">
                                {{ __t('home.greeting') }}
                            </a>
                            <a href="{{ route('staff') }}" class="block py-1 text-sm text-blue-100 hover:text-white">
                                {{ __t('home.teachers') }}
                            </a>
                        </div>
                    </div>

                    <!-- Notice Board Mobile Dropdown -->
                    <div x-data="{ open: false }" class="border-t border-blue-400/30 pt-2 mt-2">
                        <button @click="open = !open" class="flex items-center justify-between w-full text-sm font-medium hover:text-blue-200 transition-colors py-2 text-left">
                            {{ __t('nav.notice_board') }}
                            <svg :class="{ 'transform rotate-180': open }" class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div x-show="open" class="ml-4 mt-1 space-y-1">
                            <a href="{{ route('news') }}" class="block py-1 text-sm text-blue-100 hover:text-white">
                                {{ __t('nav.news_notice') }}
                            </a>
                            <a href="{{ route('gallery') }}" class="block py-1 text-sm text-blue-100 hover:text-white">
                                {{ __t('nav.gallery') }}
                            </a>
                        </div>
                    </div>

                    <a href="{{ route('home') }}#contact" class="block text-sm font-medium hover:text-blue-200 transition-colors py-2 w-full text-left border-t border-blue-400/30 pt-2 mt-2">
                        {{ __t('nav.contact') }}
                    </a>
                    
                    <div class="border-t border-blue-400/30 pt-2 mt-2">
                        <x-language-switcher :current-locale="app()->getLocale()" />
                    </div>
                </div>
            </div>

            <!-- School Branding Section -->
            <div class="flex flex-row items-center justify-start py-6 px-4 border-t border-blue-400/30 gap-4">
                <!-- English School Logo -->
                <div class="flex-shrink-0">
                    <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center p-2">
                        <img 
                            src="{{ asset('logos/english logo.jpeg') }}" 
                            alt="Boston International School English Logo" 
                            class="w-full h-full object-contain rounded-full"
                        />
                    </div>
                </div>

                <!-- School Info -->
                <div class="text-left">
                    <h1 class="text-xl lg:text-2xl font-bold">BOSTON INTERNATIONAL SCHOOL</h1>
                    <p class="text-blue-200 text-sm">Doisaket District Chiangmai</p>
                </div>
            </div>
        </div>
    </div>
</header>

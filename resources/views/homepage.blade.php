@extends('layouts.app')

@section('title', 'Boston International School Chiangmai - Inspiring Excellence, Nurturing Global Citizens')
@section('description', 'Boston International School Chiangmai provides world-class education with innovative teaching methods, diverse programs, and a commitment to developing future leaders.')

@section('content')
<!-- Hero Section -->
<section class="bg-white relative overflow-hidden">
    <!-- Background Elements -->
    <div class="absolute inset-0">
        <div class="absolute inset-0 bg-gray-50 bg-opacity-20"></div>
    </div>
    
    <div class="relative container mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-32">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Hero Content -->
            <div class="text-gray-900 animate-on-scroll">
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold leading-tight mb-6">
                    <span data-translate="hero.title.inspiring">Inspiring</span> 
                    <span class="text-[--color-school-gold]" data-translate="hero.title.excellence">Excellence</span>,
                    <br><span data-translate="hero.title.nurturing">Nurturing</span> 
                    <span class="text-[--color-school-green-light]" data-translate="hero.title.citizens">Global Citizens</span>
                </h1>
                
                <p class="text-xl lg:text-2xl mb-8 max-w-2xl text-gray-700" data-translate="hero.description">
                    At Boston International School Chiangmai, we empower students to become innovative thinkers, 
                    compassionate leaders, and responsible global citizens through world-class education.
                </p>
                
                <!-- Key Stats -->
                <div class="grid grid-cols-3 gap-8 mt-12 pt-8 border-t border-gray-200">
                    <div class="text-center animate-on-scroll stagger-delay-1">
                        <div class="text-3xl font-bold text-[--color-school-gold]">95%</div>
                        <div class="text-sm text-gray-600" data-translate="hero.stats.university">University Acceptance</div>
                    </div>
                    <div class="text-center animate-on-scroll stagger-delay-2">
                        <div class="text-3xl font-bold text-[--color-school-gold]">40+</div>
                        <div class="text-sm text-gray-600" data-translate="hero.stats.nationalities">Nationalities</div>
                    </div>
                    <div class="text-center animate-on-scroll stagger-delay-3">
                        <div class="text-3xl font-bold text-[--color-school-gold]">25</div>
                        <div class="text-sm text-gray-600" data-translate="hero.stats.years">Years Excellence</div>
                    </div>
                </div>
            </div>
            
            <!-- Hero Image Slider -->
            <div class="relative animate-on-scroll stagger-delay-2">
                <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-2xl p-8 shadow-2xl">
                    <!-- Slider Container -->
                    <div class="hero-slider-container relative overflow-hidden rounded-lg">
                        <div class="hero-slider-wrapper flex transition-transform duration-500 ease-in-out">
                            <!-- Slide 1 -->
                            <div class="hero-slide w-full flex-shrink-0">
                                <div class="w-full h-80 bg-gradient-to-br from-blue-100 to-blue-300 flex items-center justify-center rounded-lg">
                                    <div class="text-center text-blue-800">
                                        <svg class="w-20 h-20 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                        </svg>
                                        <p class="text-lg font-semibold">Academic Excellence</p>
                                        <p class="text-sm">Students in Learning Environment</p>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Slide 2 -->
                            <div class="hero-slide w-full flex-shrink-0">
                                <div class="w-full h-80 bg-gradient-to-br from-green-100 to-green-300 flex items-center justify-center rounded-lg">
                                    <div class="text-center text-green-800">
                                        <svg class="w-20 h-20 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                        </svg>
                                        <p class="text-lg font-semibold">Sports & Activities</p>
                                        <p class="text-sm">Active Student Life</p>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Slide 3 -->
                            <div class="hero-slide w-full flex-shrink-0">
                                <div class="w-full h-80 bg-gradient-to-br from-yellow-100 to-yellow-300 flex items-center justify-center rounded-lg">
                                    <div class="text-center text-yellow-800">
                                        <svg class="w-20 h-20 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4V2a1 1 0 011-1h8a1 1 0 011 1v2m-9 0h10m-10 0L7 21h10l-1-17M9 9v6m6-6v6"/>
                                        </svg>
                                        <p class="text-lg font-semibold">Arts & Creativity</p>
                                        <p class="text-sm">Creative Expression</p>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Slide 4 -->
                            <div class="hero-slide w-full flex-shrink-0">
                                <div class="w-full h-80 bg-gradient-to-br from-purple-100 to-purple-300 flex items-center justify-center rounded-lg">
                                    <div class="text-center text-purple-800">
                                        <svg class="w-20 h-20 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        <p class="text-lg font-semibold">Global Citizenship</p>
                                        <p class="text-sm">Diverse Community</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Navigation Dots -->
                        <div class="hero-slider-dots absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
                            <button class="hero-dot w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-75 transition-all duration-300" data-slide="0"></button>
                            <button class="hero-dot w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-75 transition-all duration-300" data-slide="1"></button>
                            <button class="hero-dot w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-75 transition-all duration-300" data-slide="2"></button>
                            <button class="hero-dot w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-75 transition-all duration-300" data-slide="3"></button>
                        </div>
                        
                        <!-- Navigation Arrows -->
                        <button class="hero-prev absolute left-4 top-1/2 transform -translate-y-1/2 w-10 h-10 bg-white bg-opacity-80 hover:bg-opacity-100 rounded-full flex items-center justify-center transition-all duration-300 shadow-lg">
                            <svg class="w-6 h-6 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                            </svg>
                        </button>
                        <button class="hero-next absolute right-4 top-1/2 transform -translate-y-1/2 w-10 h-10 bg-white bg-opacity-80 hover:bg-opacity-100 rounded-full flex items-center justify-center transition-all duration-300 shadow-lg">
                            <svg class="w-6 h-6 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section Divider -->
<div class="section-divider-blue"></div>

<!-- Programs & Features Section -->
<section id="programs" class="section-padding bg-[--color-bg-section]">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-16 animate-on-scroll">
            <h2 class="text-3xl lg:text-4xl font-bold text-[--color-text-primary] mb-6" data-translate="programs.title">
                Boston International School Chiangmai Features
            </h2>
            <p class="text-xl text-[--color-text-secondary] max-w-3xl mx-auto" data-translate="programs.subtitle">
                Our comprehensive programs and innovative approach to education prepare students 
                for success in an ever-changing global landscape.
            </p>
        </div>
        
        <!-- Features Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
            <!-- Feature 1: Multilingual Education -->
            <div class="card text-center animate-on-scroll stagger-delay-1">
                <div class="w-16 h-16 bg-[--color-school-blue] rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-[--color-text-primary] mb-4" data-translate="programs.multilingual.title">Multilingual Education</h3>
                <p class="text-[--color-text-secondary] mb-4" data-translate="programs.multilingual.desc">
                    Students master English, Thai, and choose from Mandarin, French, or Spanish, 
                    preparing them for global communication.
                </p>
                <div class="text-sm text-[--color-school-blue] font-medium" data-translate="programs.multilingual.badge">3+ Languages Offered</div>
            </div>
            
            <!-- Feature 2: STEAM Programs -->
            <div class="card text-center animate-on-scroll stagger-delay-2">
                <div class="w-16 h-16 bg-[--color-school-green] rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-[--color-text-primary] mb-4" data-translate="programs.steam.title">STEAM Innovation</h3>
                <p class="text-[--color-text-secondary] mb-4" data-translate="programs.steam.desc">
                    Cutting-edge Science, Technology, Engineering, Arts, and Mathematics programs 
                    foster creativity and critical thinking.
                </p>
                <div class="text-sm text-[--color-school-green] font-medium" data-translate="programs.steam.badge">State-of-the-art Labs</div>
            </div>
            
            <!-- Feature 3: International Curriculum -->
            <div class="card text-center animate-on-scroll stagger-delay-3">
                <div class="w-16 h-16 bg-[--color-school-gold] rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-[--color-text-primary] mb-4" data-translate="programs.ib.title">IB World School</h3>
                <p class="text-[--color-text-secondary] mb-4" data-translate="programs.ib.desc">
                    Authorized IB programmes from Primary Years through Diploma Programme, 
                    ensuring world-class education standards.
                </p>
                <div class="text-sm text-[--color-school-gold] font-medium" data-translate="programs.ib.badge">PYP • MYP • DP</div>
            </div>
            
            <!-- Feature 4: Sports Excellence -->
            <div class="card text-center animate-on-scroll stagger-delay-1">
                <div class="w-16 h-16 bg-[--color-accent-orange] rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-[--color-text-primary] mb-4" data-translate="programs.sports.title">Sports Excellence</h3>
                <p class="text-[--color-text-secondary] mb-4" data-translate="programs.sports.desc">
                    Comprehensive athletics program including swimming, football, basketball, 
                    tennis, and traditional Thai sports.
                </p>
                <div class="text-sm text-[--color-accent-orange] font-medium" data-translate="programs.sports.badge">15+ Sports Offered</div>
            </div>
            
            <!-- Feature 5: Arts & Creativity -->
            <div class="card text-center animate-on-scroll stagger-delay-2">
                <div class="w-16 h-16 bg-[--color-school-blue] rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4V2a1 1 0 011-1h8a1 1 0 011 1v2m-9 0h10m-10 0L7 21h10l-1-17M9 9v6m6-6v6"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-[--color-text-primary] mb-4" data-translate="programs.arts.title">Creative Arts</h3>
                <p class="text-[--color-text-secondary] mb-4" data-translate="programs.arts.desc">
                    Rich visual and performing arts programmes including music, drama, 
                    digital arts, and traditional Thai cultural arts.
                </p>
                <div class="text-sm text-[--color-school-blue] font-medium" data-translate="programs.arts.badge">Award-winning Programs</div>
            </div>
            
            <!-- Feature 6: Global Citizenship -->
            <div class="card text-center animate-on-scroll stagger-delay-3">
                <div class="w-16 h-16 bg-[--color-school-green] rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-[--color-text-primary] mb-4" data-translate="programs.global.title">Global Citizenship</h3>
                <p class="text-[--color-text-secondary] mb-4" data-translate="programs.global.desc">
                    Community service, cultural exchange programs, and global awareness 
                    initiatives develop responsible world citizens.
                </p>
                <div class="text-sm text-[--color-school-green] font-medium" data-translate="programs.global.badge">40+ Nationalities</div>
            </div>
        </div>
        
        <!-- Academic Programs Overview -->
        <div class="bg-white rounded-2xl p-8 lg:p-12 shadow-lg animate-on-scroll">
            <div class="text-center mb-12">
                <h3 class="text-2xl lg:text-3xl font-bold text-[--color-text-primary] mb-4">
                    Academic Programs by Level
                </h3>
                <p class="text-lg text-[--color-text-secondary]">
                    Continuous learning journey from Early Years to University preparation
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Early Years Program -->
                <div class="text-center p-6 bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl">
                    <div class="w-12 h-12 bg-[--color-school-blue] rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-white font-bold text-lg">K</span>
                    </div>
                    <h4 class="text-xl font-semibold text-[--color-text-primary] mb-3">Early Years (K1-K3)</h4>
                    <p class="text-[--color-text-secondary] mb-4">
                        Play-based learning fostering curiosity, creativity, and social skills 
                        in a nurturing multilingual environment.
                    </p>
                    <div class="text-sm text-[--color-school-blue] font-medium">Ages 3-6</div>
                </div>
                
                <!-- Primary Program -->
                <div class="text-center p-6 bg-gradient-to-br from-green-50 to-green-100 rounded-xl">
                    <div class="w-12 h-12 bg-[--color-school-green] rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-white font-bold text-lg">P</span>
                    </div>
                    <h4 class="text-xl font-semibold text-[--color-text-primary] mb-3">Primary (G1-G5)</h4>
                    <p class="text-[--color-text-secondary] mb-4">
                        IB Primary Years Programme developing inquiring minds through 
                        transdisciplinary themes and authentic learning.
                    </p>
                    <div class="text-sm text-[--color-school-green] font-medium">Ages 6-11</div>
                </div>
                
                <!-- Secondary Program -->
                <div class="text-center p-6 bg-gradient-to-br from-yellow-50 to-yellow-100 rounded-xl">
                    <div class="w-12 h-12 bg-[--color-school-gold] rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-white font-bold text-lg">S</span>
                    </div>
                    <h4 class="text-xl font-semibold text-[--color-text-primary] mb-3">Secondary (G6-G12)</h4>
                    <p class="text-[--color-text-secondary] mb-4">
                        IB Middle Years and Diploma Programmes preparing students for 
                        university success and lifelong learning.
                    </p>
                    <div class="text-sm text-[--color-school-gold] font-medium">Ages 11-18</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section Divider -->
<div class="section-divider-sky-blue"></div>

<!-- About Section -->
<section id="about" class="section-padding bg-[--color-bg-section]">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- About Content -->
            <div class="animate-on-scroll">
                <h2 class="text-3xl lg:text-4xl font-bold text-[--color-text-primary] mb-6" data-translate="about.title">
                    What is Boston International School Chiangmai?
                </h2>
                
                <p class="text-lg text-[--color-text-secondary] mb-6" data-translate="about.desc1">
                    Founded in 1999, Boston International School Chiangmai has been at the forefront of innovative education, 
                    nurturing students from over 40 nationalities to become confident, creative, and caring global citizens.
                </p>
                
                <p class="text-lg text-[--color-text-secondary] mb-8" data-translate="about.desc2">
                    Our comprehensive curriculum combines the best of international educational practices with 
                    local cultural understanding, preparing students for success in an interconnected world.
                </p>
                
                <div class="grid grid-cols-2 gap-6 mb-8">
                    <div class="text-center p-4 bg-[--color-bg-light] rounded-lg">
                        <div class="text-2xl font-bold text-[--color-school-blue] mb-2">850+</div>
                        <div class="text-sm text-[--color-text-secondary]" data-translate="about.stats.students">Students</div>
                    </div>
                    <div class="text-center p-4 bg-[--color-bg-light] rounded-lg">
                        <div class="text-2xl font-bold text-[--color-school-blue] mb-2">120+</div>
                        <div class="text-sm text-[--color-text-secondary]" data-translate="about.stats.faculty">Faculty</div>
                    </div>
                </div>
                
                <a href="#programs" class="btn-primary" data-translate="about.btn">Learn More About Our Programs</a>
            </div>
            
            <!-- About Visual -->
            <div class="animate-on-scroll stagger-delay-2">
                <div class="relative">
                    <div class="aspect-w-4 aspect-h-3 bg-gray-200 rounded-2xl overflow-hidden shadow-xl">
                        <div class="w-full h-96 bg-gradient-to-br from-blue-50 to-green-50 flex items-center justify-center">
                            <div class="text-center text-gray-600">
                                <svg class="w-24 h-24 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                </svg>
                                <p class="text-lg font-semibold">Our Campus</p>
                                <p class="text-sm">Beautiful learning environment</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Decorative Elements -->
                    <div class="absolute -top-6 -right-6 w-12 h-12 bg-[--color-school-gold] rounded-full"></div>
                    <div class="absolute -bottom-6 -left-6 w-16 h-16 bg-[--color-school-green] rounded-full opacity-80"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section Divider -->
<div class="section-divider-blue"></div>

<!-- Photo Gallery Section -->
<section id="gallery" class="section-padding bg-[--color-bg-section]">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 animate-on-scroll">
            <h2 class="text-3xl lg:text-4xl font-bold text-[--color-text-primary] mb-6">
                Photo Gallery
            </h2>
            <p class="text-xl text-[--color-text-secondary] max-w-3xl mx-auto">
                Explore our beautiful campus, modern facilities, and vibrant student life.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
            <div class="relative group overflow-hidden rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 animate-on-scroll">
                <div class="w-full h-64 bg-gradient-to-br from-blue-100 to-blue-200 flex items-center justify-center">
                    <div class="text-center text-gray-600">
                        <svg class="w-16 h-16 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                        <p class="font-semibold">Modern Classrooms</p>
                    </div>
                </div>
            </div>
            
            <div class="relative group overflow-hidden rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 animate-on-scroll">
                <div class="w-full h-64 bg-gradient-to-br from-green-100 to-green-200 flex items-center justify-center">
                    <div class="text-center text-gray-600">
                        <svg class="w-16 h-16 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                        </svg>
                        <p class="font-semibold">Science Labs</p>
                    </div>
                </div>
            </div>
            
            <div class="relative group overflow-hidden rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 animate-on-scroll">
                <div class="w-full h-64 bg-gradient-to-br from-yellow-100 to-yellow-200 flex items-center justify-center">
                    <div class="text-center text-gray-600">
                        <svg class="w-16 h-16 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                        <p class="font-semibold">Sports Facilities</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="text-center animate-on-scroll">
            <a href="#contact" class="btn-primary">Take a Virtual Tour</a>
        </div>
    </div>
</section>

<!-- Section Divider -->
<div class="section-divider-sky-blue"></div>

<!-- News & Events Section -->
<section id="news" class="section-padding bg-[--color-bg-light]">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 animate-on-scroll">
            <h2 class="text-3xl lg:text-4xl font-bold text-[--color-text-primary] mb-6">
                News & Notice
            </h2>
            <p class="text-xl text-[--color-text-secondary] max-w-3xl mx-auto">
                Stay updated with the latest happenings at Boston International School Chiangmai.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="card animate-on-scroll">
                <div class="w-full h-48 bg-gradient-to-br from-blue-100 to-blue-200 rounded-lg mb-4 flex items-center justify-center">
                    <svg class="w-16 h-16 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253"/>
                    </svg>
                </div>
                <div class="text-sm text-[--color-school-blue] font-semibold mb-2">Academic Excellence</div>
                <h3 class="text-xl font-semibold text-[--color-text-primary] mb-3">IB Diploma Results 2024</h3>
                <p class="text-[--color-text-secondary] mb-4">
                    Our students achieved outstanding results in the IB Diploma Programme with 98% pass rate and average score of 38 points.
                </p>
                <a href="#" class="text-[--color-school-blue] font-medium hover:underline">Read More →</a>
            </div>
            
            <div class="card animate-on-scroll stagger-delay-2">
                <div class="w-full h-48 bg-gradient-to-br from-green-100 to-green-200 rounded-lg mb-4 flex items-center justify-center">
                    <svg class="w-16 h-16 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 15.546c-.523 0-1.046.151-1.5.454a2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0A2.704 2.704 0 013 15.546L3 12l1.5-.5L6 11l1.5.5L9 12l1.5-.5L12 11l1.5.5L15 12l1.5-.5L18 11l1.5.5L21 12v3.546z"/>
                    </svg>
                </div>
                <div class="text-sm text-[--color-school-green] font-semibold mb-2">Sports Achievement</div>
                <h3 class="text-xl font-semibold text-[--color-text-primary] mb-3">Swimming Championship</h3>
                <p class="text-[--color-text-secondary] mb-4">
                    Our swim team won the International Schools Swimming Championship for the third consecutive year.
                </p>
                <a href="#" class="text-[--color-school-green] font-medium hover:underline">Read More →</a>
            </div>
            
            <div class="card animate-on-scroll stagger-delay-3">
                <div class="w-full h-48 bg-gradient-to-br from-purple-100 to-purple-200 rounded-lg mb-4 flex items-center justify-center">
                    <svg class="w-16 h-16 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                <div class="text-sm text-[--color-school-gold] font-semibold mb-2">Upcoming Event</div>
                <h3 class="text-xl font-semibold text-[--color-text-primary] mb-3">Open House 2024</h3>
                <p class="text-[--color-text-secondary] mb-4">
                    Join us for our annual Open House on September 15th, 2024. Experience our innovative learning environment.
                </p>
                <a href="#" class="text-[--color-school-gold] font-medium hover:underline">Learn More →</a>
            </div>
        </div>
    </div>
</section>

<!-- Section Divider -->
<div class="section-divider-blue"></div>

<!-- Admissions Section -->
<section id="admissions" class="section-padding bg-[--color-bg-section]">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="animate-on-scroll">
                <h2 class="text-3xl lg:text-4xl font-bold text-[--color-text-primary] mb-6">
                    Welcome to Boston International School Chiangmai Admissions
                </h2>
                <p class="text-lg text-[--color-text-secondary] mb-6">
                    We welcome students from diverse backgrounds who are eager to learn, grow, and contribute to our global community.
                </p>
                
                <div class="space-y-4 mb-8">
                    <h3 class="text-xl font-semibold text-[--color-text-primary]">How to Apply</h3>
                    <div class="space-y-3">
                        <div class="flex items-start space-x-3">
                            <div class="w-6 h-6 bg-[--color-school-blue] rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <span class="text-white text-sm font-bold">1</span>
                            </div>
                            <div>
                                <h4 class="font-semibold text-[--color-text-primary]">Submit Online Application</h4>
                                <p class="text-[--color-text-secondary] text-sm">Complete our comprehensive online application form.</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-3">
                            <div class="w-6 h-6 bg-[--color-school-green] rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <span class="text-white text-sm font-bold">2</span>
                            </div>
                            <div>
                                <h4 class="font-semibold text-[--color-text-primary]">Assessment & Interview</h4>
                                <p class="text-[--color-text-secondary] text-sm">Participate in assessments and family interviews.</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-3">
                            <div class="w-6 h-6 bg-[--color-school-gold] rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                <span class="text-white text-sm font-bold">3</span>
                            </div>
                            <div>
                                <h4 class="font-semibold text-[--color-text-primary]">Enrollment Decision</h4>
                                <p class="text-[--color-text-secondary] text-sm">Receive admission decision and complete enrollment.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="#contact" class="btn-primary">Start Application</a>
                    <a href="#" class="btn-outline">Download Brochure</a>
                </div>
            </div>
            
            <div class="animate-on-scroll stagger-delay-2">
                <div class="bg-[--color-bg-light] rounded-2xl p-8">
                    <h3 class="text-2xl font-bold text-[--color-text-primary] mb-6 text-center">
                        Admission Requirements
                    </h3>
                    
                    <div class="space-y-6">
                        <div class="border-l-4 border-[--color-school-blue] pl-4">
                            <h4 class="font-semibold text-[--color-text-primary] mb-2">Early Years (K1-K3)</h4>
                            <ul class="text-[--color-text-secondary] text-sm space-y-1">
                                <li>• Birth certificate</li>
                                <li>• Immunization records</li>
                                <li>• Previous school reports (if applicable)</li>
                            </ul>
                        </div>
                        
                        <div class="border-l-4 border-[--color-school-green] pl-4">
                            <h4 class="font-semibold text-[--color-text-primary] mb-2">Primary & Secondary</h4>
                            <ul class="text-[--color-text-secondary] text-sm space-y-1">
                                <li>• Academic transcripts (2 years)</li>
                                <li>• English proficiency assessment</li>
                                <li>• Teacher recommendations</li>
                                <li>• Personal statement</li>
                            </ul>
                        </div>
                        
                        <div class="bg-white rounded-lg p-4 border">
                            <h4 class="font-semibold text-[--color-text-primary] mb-2">Application Deadlines</h4>
                            <div class="text-sm text-[--color-text-secondary]">
                                <p><strong>August Start:</strong> April 30th</p>
                                <p><strong>January Start:</strong> October 31st</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section Divider -->
<div class="section-divider-sky-blue"></div>

<!-- Contact Section -->
<section id="contact" class="section-padding bg-[--color-bg-light]">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 animate-on-scroll">
            <h2 class="text-3xl lg:text-4xl font-bold text-[--color-text-primary] mb-6" data-translate="contact.title">
                Get in Touch
            </h2>
            <p class="text-xl text-[--color-text-secondary] max-w-3xl mx-auto" data-translate="contact.subtitle">
                Ready to start your journey with Boston International School Chiangmai? Contact our admissions team.
            </p>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Contact Form -->
            <div class="animate-on-scroll">
                <div class="bg-white rounded-2xl p-8 shadow-lg">
                    <h3 class="text-2xl font-bold text-[--color-text-primary] mb-6" data-translate="contact.form.title">Send us a Message</h3>
                    
                    <form class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="first_name" class="block text-sm font-medium text-[--color-text-primary] mb-2" data-translate="contact.form.firstname">First Name</label>
                                <input type="text" id="first_name" name="first_name" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[--color-school-blue] focus:border-transparent" required>
                            </div>
                            <div>
                                <label for="last_name" class="block text-sm font-medium text-[--color-text-primary] mb-2" data-translate="contact.form.lastname">Last Name</label>
                                <input type="text" id="last_name" name="last_name" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[--color-school-blue] focus:border-transparent" required>
                            </div>
                        </div>
                        
                        <div>
                            <label for="email" class="block text-sm font-medium text-[--color-text-primary] mb-2" data-translate="contact.form.email">Email</label>
                            <input type="email" id="email" name="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[--color-school-blue] focus:border-transparent" required>
                        </div>
                        
                        <div>
                            <label for="phone" class="block text-sm font-medium text-[--color-text-primary] mb-2" data-translate="contact.form.phone">Phone Number</label>
                            <input type="tel" id="phone" name="phone" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[--color-school-blue] focus:border-transparent">
                        </div>
                        
                        <div>
                            <label for="grade_level" class="block text-sm font-medium text-[--color-text-primary] mb-2" data-translate="contact.form.grade">Grade Level of Interest</label>
                            <select id="grade_level" name="grade_level" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[--color-school-blue] focus:border-transparent">
                                <option value="">Select Grade Level</option>
                                <option value="early_years">Early Years (K1-K3)</option>
                                <option value="primary">Primary (G1-G5)</option>
                                <option value="middle">Middle Years (G6-G10)</option>
                                <option value="diploma">Diploma Programme (G11-G12)</option>
                            </select>
                        </div>
                        
                        <div>
                            <label for="message" class="block text-sm font-medium text-[--color-text-primary] mb-2" data-translate="contact.form.message">Message</label>
                            <textarea id="message" name="message" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[--color-school-blue] focus:border-transparent" placeholder="Tell us about your interest..."></textarea>
                        </div>
                        
                        <button type="submit" class="btn-primary w-full" data-translate="contact.form.submit">Send Message</button>
                    </form>
                </div>
            </div>
            
            <!-- Contact Information -->
            <div class="animate-on-scroll stagger-delay-2">
                <div class="space-y-8">
                    <div class="bg-white rounded-2xl p-8 shadow-lg">
                        <h3 class="text-2xl font-bold text-[--color-text-primary] mb-6" data-translate="contact.info.title">Visit Our Campus</h3>
                        
                        <div class="space-y-4">
                            <div class="flex items-start space-x-4">
                                <div class="w-12 h-12 bg-[--color-school-blue] rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-[--color-text-primary] mb-1" data-translate="contact.info.address">Address</h4>
                                    <p class="text-[--color-text-secondary]">123 Education Avenue<br>Bangkok, Thailand 10110</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start space-x-4">
                                <div class="w-12 h-12 bg-[--color-school-green] rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-[--color-text-primary] mb-1" data-translate="contact.info.phone">Phone</h4>
                                    <p class="text-[--color-text-secondary]">+66 2 123-4567</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start space-x-4">
                                <div class="w-12 h-12 bg-[--color-school-gold] rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-[--color-text-primary] mb-1" data-translate="contact.info.email">Email</h4>
                                    <p class="text-[--color-text-secondary]">info@pinnacleintl.edu</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
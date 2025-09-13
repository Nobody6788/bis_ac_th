@extends('layouts.app')

@section('title', 'Boston International School Chiangmai - Inspiring Excellence, Nurturing Global Citizens')
@section('description', 'Boston International School Chiangmai provides world-class education with innovative teaching methods, diverse programs, and a commitment to developing future leaders.')

@section('content')
@php
    use App\Models\ContentSection;
    use App\Models\SiteImage;
    use Illuminate\Support\Str;
@endphp
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
                    <span data-translate="hero.title.inspiring">{{ __('frontend.hero.title.inspiring') }}</span> 
                    <span class="text-[--color-school-gold]" data-translate="hero.title.excellence">{{ __('frontend.hero.title.excellence') }}</span>,
                    <br><span data-translate="hero.title.nurturing">{{ __('frontend.hero.title.nurturing') }}</span> 
                    <span class="text-[--color-school-green-light]" data-translate="hero.title.citizens">{{ __('frontend.hero.title.citizens') }}</span>
                </h1>
                
                <p class="text-xl lg:text-2xl mb-8 max-w-2xl text-gray-700" data-translate="hero.description">
                    {{ __('frontend.hero.description') }}
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
                            <!-- Slide 1: Academic Excellence -->
                            <div class="hero-slide w-full flex-shrink-0">
                                @php $slide1 = SiteImage::getByLocation('hero-slide-1'); @endphp
                                @if($slide1)
                                    <div class="w-full h-80 relative rounded-lg overflow-hidden">
                                        <img src="{{ $slide1->image_url }}" alt="{{ $slide1->alt_text ?: 'Academic Excellence' }}" 
                                             class="w-full h-full object-cover">
                                        <div class="absolute inset-0 bg-blue-900 bg-opacity-30 flex items-center justify-center">
                                            <div class="text-center text-white">
                                                <p class="text-lg font-semibold mb-1">Academic Excellence</p>
                                                <p class="text-sm opacity-90">Students in Learning Environment</p>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="w-full h-80 bg-gradient-to-br from-blue-100 to-blue-300 flex items-center justify-center rounded-lg">
                                        <div class="text-center text-blue-800">
                                            <svg class="w-20 h-20 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                            </svg>
                                            <p class="text-lg font-semibold">Academic Excellence</p>
                                            <p class="text-sm">Students in Learning Environment</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            
                            <!-- Slide 2: Sports & Activities -->
                            <div class="hero-slide w-full flex-shrink-0">
                                @php $slide2 = SiteImage::getByLocation('hero-slide-2'); @endphp
                                @if($slide2)
                                    <div class="w-full h-80 relative rounded-lg overflow-hidden">
                                        <img src="{{ $slide2->image_url }}" alt="{{ $slide2->alt_text ?: 'Sports & Activities' }}" 
                                             class="w-full h-full object-cover">
                                        <div class="absolute inset-0 bg-green-900 bg-opacity-30 flex items-center justify-center">
                                            <div class="text-center text-white">
                                                <p class="text-lg font-semibold mb-1">Sports & Activities</p>
                                                <p class="text-sm opacity-90">Active Student Life</p>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="w-full h-80 bg-gradient-to-br from-green-100 to-green-300 flex items-center justify-center rounded-lg">
                                        <div class="text-center text-green-800">
                                            <svg class="w-20 h-20 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                            </svg>
                                            <p class="text-lg font-semibold">Sports & Activities</p>
                                            <p class="text-sm">Active Student Life</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            
                            <!-- Slide 3: Arts & Creativity -->
                            <div class="hero-slide w-full flex-shrink-0">
                                @php $slide3 = SiteImage::getByLocation('hero-slide-3'); @endphp
                                @if($slide3)
                                    <div class="w-full h-80 relative rounded-lg overflow-hidden">
                                        <img src="{{ $slide3->image_url }}" alt="{{ $slide3->alt_text ?: 'Arts & Creativity' }}" 
                                             class="w-full h-full object-cover">
                                        <div class="absolute inset-0 bg-yellow-900 bg-opacity-30 flex items-center justify-center">
                                            <div class="text-center text-white">
                                                <p class="text-lg font-semibold mb-1">Arts & Creativity</p>
                                                <p class="text-sm opacity-90">Creative Expression</p>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="w-full h-80 bg-gradient-to-br from-yellow-100 to-yellow-300 flex items-center justify-center rounded-lg">
                                        <div class="text-center text-yellow-800">
                                            <svg class="w-20 h-20 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4V2a1 1 0 011-1h8a1 1 0 011 1v2m-9 0h10m-10 0L7 21h10l-1-17M9 9v6m6-6v6"/>
                                            </svg>
                                            <p class="text-lg font-semibold">Arts & Creativity</p>
                                            <p class="text-sm">Creative Expression</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            
                            <!-- Slide 4: Global Citizenship -->
                            <div class="hero-slide w-full flex-shrink-0">
                                @php $slide4 = SiteImage::getByLocation('hero-slide-4'); @endphp
                                @if($slide4)
                                    <div class="w-full h-80 relative rounded-lg overflow-hidden">
                                        <img src="{{ $slide4->image_url }}" alt="{{ $slide4->alt_text ?: 'Global Citizenship' }}" 
                                             class="w-full h-full object-cover">
                                        <div class="absolute inset-0 bg-purple-900 bg-opacity-30 flex items-center justify-center">
                                            <div class="text-center text-white">
                                                <p class="text-lg font-semibold mb-1">Global Citizenship</p>
                                                <p class="text-sm opacity-90">Diverse Community</p>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="w-full h-80 bg-gradient-to-br from-purple-100 to-purple-300 flex items-center justify-center rounded-lg">
                                        <div class="text-center text-purple-800">
                                            <svg class="w-20 h-20 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            <p class="text-lg font-semibold">Global Citizenship</p>
                                            <p class="text-sm">Diverse Community</p>
                                        </div>
                                    </div>
                                @endif
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
                {{ __('frontend.programs.title') }}
            </h2>
            <p class="text-xl text-[--color-text-secondary] max-w-3xl mx-auto" data-translate="programs.subtitle">
                {{ __('frontend.programs.subtitle') }}
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
                    {{ ContentSection::getContent('about.title', 'What is Boston International School Chiangmai?') }}
                </h2>
                
                <p class="text-lg text-[--color-text-secondary] mb-6" data-translate="about.desc1">
                    {{ ContentSection::getContent('about.desc1', 'Founded in 1999, Boston International School Chiangmai has been at the forefront of innovative education, nurturing students from over 40 nationalities to become confident, creative, and caring global citizens.') }}
                </p>
                
                <p class="text-lg text-[--color-text-secondary] mb-8" data-translate="about.desc2">
                    {{ ContentSection::getContent('about.desc2', 'Our comprehensive curriculum combines the best of international educational practices with local cultural understanding, preparing students for success in an interconnected world.') }}
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
        
        @if($recentGalleryImages && $recentGalleryImages->count() > 0)
        <!-- Photo Gallery Slider -->
        <div class="photo-gallery-container relative max-w-6xl mx-auto mb-12 animate-on-scroll">
            <div class="relative overflow-hidden rounded-2xl shadow-2xl bg-white">
                <div class="photo-gallery-slider flex transition-transform duration-700 ease-in-out" style="width: {{ $recentGalleryImages->count() * 100 }}%">
                    @foreach($recentGalleryImages as $index => $image)
                    <div class="photo-gallery-slide flex-shrink-0 relative" style="width: {{ 100 / $recentGalleryImages->count() }}%">
                        <div class="aspect-w-16 aspect-h-9">
                            <img src="{{ $image->image_url }}" 
                                 alt="{{ $image->title }}" 
                                 class="w-full h-96 object-cover">
                        </div>
                        
                        <!-- Image Overlay Info -->
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent p-8">
                            <div class="text-white">
                                @if($image->category)
                                <span class="inline-block px-3 py-1 text-sm font-semibold bg-white/20 backdrop-blur-sm rounded-full mb-3">
                                    {{ ucfirst($image->category) }}
                                </span>
                                @endif
                                <h3 class="text-2xl font-bold mb-2">{{ $image->title }}</h3>
                                @if($image->description)
                                <p class="text-gray-200 text-lg opacity-90">{{ Str::limit($image->description, 120) }}</p>
                                @endif
                            </div>
                        </div>
                        
                        <!-- Slide Number Indicator -->
                        <div class="absolute top-4 right-4 bg-black/50 backdrop-blur-sm text-white px-3 py-1 rounded-full text-sm font-medium">
                            {{ $index + 1 }} / {{ $recentGalleryImages->count() }}
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <!-- Progress Bar -->
                <div class="absolute bottom-0 left-0 right-0 h-1 bg-white/20">
                    <div class="progress-bar h-full bg-white transition-all duration-75 ease-linear" style="width: 0%"></div>
                </div>
            </div>
            
            <!-- Slide Indicators -->
            <div class="flex justify-center mt-6 space-x-2">
                @foreach($recentGalleryImages as $index => $image)
                <button class="slide-indicator w-3 h-3 rounded-full transition-all duration-300 {{ $index === 0 ? 'bg-[--color-school-blue] scale-125' : 'bg-gray-300 hover:bg-gray-400' }}" 
                        data-slide="{{ $index }}"
                        aria-label="Go to slide {{ $index + 1 }}">
                </button>
                @endforeach
            </div>
        </div>
        @else
        <!-- Fallback when no images available -->
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
        @endif
        
        <div class="text-center animate-on-scroll">
            <a href="{{ route('gallery') }}" class="btn-primary">View Full Gallery</a>
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
            @forelse($recentNews as $index => $newsItem)
                <div class="card animate-on-scroll {{ $index === 1 ? 'stagger-delay-2' : ($index === 2 ? 'stagger-delay-3' : '') }}">
                    @if($newsItem->image_url)
                        <div class="w-full h-48 rounded-lg mb-4 overflow-hidden">
                            <img src="{{ $newsItem->image_url }}" alt="{{ $newsItem->title }}" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                        </div>
                    @else
                        <!-- Default gradient background based on category -->
                        @php
                            $gradients = [
                                'academic' => 'from-blue-100 to-blue-200',
                                'sports' => 'from-green-100 to-green-200',
                                'events' => 'from-purple-100 to-purple-200',
                                'announcements' => 'from-yellow-100 to-yellow-200',
                                'achievements' => 'from-orange-100 to-orange-200'
                            ];
                            $gradient = $gradients[$newsItem->category] ?? 'from-gray-100 to-gray-200';
                            
                            $iconColors = [
                                'academic' => 'text-blue-600',
                                'sports' => 'text-green-600',
                                'events' => 'text-purple-600',
                                'announcements' => 'text-yellow-600',
                                'achievements' => 'text-orange-600'
                            ];
                            $iconColor = $iconColors[$newsItem->category] ?? 'text-gray-600';
                            
                            $icons = [
                                'academic' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253',
                                'sports' => 'M21 15.546c-.523 0-1.046.151-1.5.454a2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0A2.704 2.704 0 013 15.546L3 12l1.5-.5L6 11l1.5.5L9 12l1.5-.5L12 11l1.5.5L15 12l1.5-.5L18 11l1.5.5L21 12v3.546z',
                                'events' => 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z',
                                'announcements' => 'M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z',
                                'achievements' => 'M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z'
                            ];
                            $iconPath = $icons[$newsItem->category] ?? 'M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z';
                        @endphp
                        <div class="w-full h-48 bg-gradient-to-br {{ $gradient }} rounded-lg mb-4 flex items-center justify-center">
                            <svg class="w-16 h-16 {{ $iconColor }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $iconPath }}"/>
                            </svg>
                        </div>
                    @endif
                    
                    @if($newsItem->category)
                        @php
                            $categoryColors = [
                                'academic' => 'text-[--color-school-blue]',
                                'sports' => 'text-[--color-school-green]',
                                'events' => 'text-[--color-school-gold]',
                                'announcements' => 'text-yellow-600',
                                'achievements' => 'text-orange-600'
                            ];
                            $categoryColor = $categoryColors[$newsItem->category] ?? 'text-gray-600';
                        @endphp
                        <div class="text-sm {{ $categoryColor }} font-semibold mb-2">{{ ucfirst($newsItem->category) }}</div>
                    @endif
                    
                    <h3 class="text-xl font-semibold text-[--color-text-primary] mb-3">{{ $newsItem->title }}</h3>
                    <p class="text-[--color-text-secondary] mb-4">
                        {{ $newsItem->excerpt ?: Str::limit(strip_tags($newsItem->content), 120) }}
                    </p>
                    
                    <div class="flex items-center justify-between">
                        <a href="{{ route('news') }}" class="{{ $categoryColor ?? 'text-[--color-school-blue]' }} font-medium hover:underline">Read More →</a>
                        @if($newsItem->published_at)
                            <span class="text-xs text-gray-500">{{ $newsItem->published_at->format('M j, Y') }}</span>
                        @endif
                    </div>
                </div>
            @empty
                <!-- Fallback content when no news items exist -->
                <div class="card animate-on-scroll">
                    <div class="w-full h-48 bg-gradient-to-br from-blue-100 to-blue-200 rounded-lg mb-4 flex items-center justify-center">
                        <svg class="w-16 h-16 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253"/>
                        </svg>
                    </div>
                    <div class="text-sm text-[--color-school-blue] font-semibold mb-2">Welcome</div>
                    <h3 class="text-xl font-semibold text-[--color-text-primary] mb-3">Latest School News</h3>
                    <p class="text-[--color-text-secondary] mb-4">
                        Stay tuned for the latest updates and announcements from Boston International School Chiangmai.
                    </p>
                    <a href="{{ route('news') }}" class="text-[--color-school-blue] font-medium hover:underline">Visit News Page →</a>
                </div>
            @endforelse
        </div>
    </div>
</section>


<!-- Contact Section -->
<section id="contact" class="section-padding bg-[--color-bg-light] mb-16">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 animate-on-scroll">
            <h2 class="text-3xl lg:text-4xl font-bold text-[--color-text-primary] mb-6" data-translate="contact.title">
                {{ ContentSection::getContent('contact.title', 'Get in Touch') }}
            </h2>
            <p class="text-xl text-[--color-text-secondary] max-w-3xl mx-auto" data-translate="contact.subtitle">
                {{ ContentSection::getContent('contact.subtitle', 'Ready to start your journey with Boston International School Chiangmai? Contact our admissions team.') }}
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
                        
                        <button type="submit" class="w-full px-6 py-3 bg-blue-900 text-white font-medium rounded-lg hover:bg-blue-800 transition-colors duration-300" data-translate="contact.form.submit">
    Send Message
</button>
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
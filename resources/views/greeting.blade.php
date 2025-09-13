@extends('layouts.app')

@section('title', 'Greeting - Boston International School Chiangmai')
@section('description', 'Message from the President of Boston International School Chiangmai about our vision and commitment to nurturing the next generation.')

@section('content')

<!-- Hero Section -->
<section class="bg-gradient-to-br from-blue-50 to-green-50 relative overflow-hidden">
    <div class="absolute inset-0">
        <div class="absolute inset-0 bg-white bg-opacity-20"></div>
    </div>
    
    <div class="relative container mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-32">
        <div class="text-center animate-on-scroll">
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold leading-tight mb-6 text-gray-900">
                GREETING
            </h1>
            <div class="w-24 h-1 bg-green-600 mx-auto mb-8"></div>
        </div>
    </div>
</section>

<!-- Section Divider -->
<div class="section-divider-sky-blue"></div>

<!-- Greeting Content Section -->
<section class="section-padding bg-[--color-bg-section]">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-16 animate-on-scroll">
            <h2 class="text-3xl lg:text-4xl font-bold text-[--color-text-primary] mb-6">
                Greetings from the President of Boston International School
            </h2>
        </div>
        
        <!-- Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
            <!-- Text Content -->
            <div class="animate-on-scroll">
                <div class="prose prose-lg max-w-none">
                    <div class="text-[--color-text-secondary] leading-relaxed space-y-6">
                        <p>
                            I came to this position with the thought and vision of whether I can nurture the next generation into useful human resources.
                        </p>
                        
                        <p>
                            Korean education is too obsessed with studying for the next generation, so I thought about a free environment where not only intellect but also character can be educated together. Then, I came to think that Chiang Mai's relaxed and relaxed atmosphere was suitable for establishing an international school, and with the help of many people, I was able to open the Boston International School in Chiang Mai.
                        </p>
                        
                        <p>
                            Having a vision seems to be the driving force behind amazing things.
                        </p>
                        
                        <p>
                            In 1992, I vaguely had a vision to build a school for the next generation, but now 33 years later, it has become a reality.
                        </p>
                        
                        <p>
                            I believe and pray that the students who learn at Boston International School will grow up to be people who are beneficial to humanity.
                        </p>
                        
                        <p>
                            I start this school with the hope that some of my students will win the Nobel Prize and that there will be talented people who will be of great benefit to mankind. After many years, he dreamed of the day when his students would make that dream a reality and established an international school. To the students and parents who will be with our school, I would like to tell you that the vision of our school is not light. When that vision is realized, I will pray every day that graduates of Boston International School will stand in their place.
                        </p>
                    </div>
                    
                    <!-- Signature -->
                    <div class="mt-12 text-center">
                        <div class="text-xl font-semibold text-[--color-text-primary]">
                            Chairman Th. M Yang Kyung-joon.
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Image Placeholder -->
            <div class="animate-on-scroll stagger-delay-1">
                <div class="bg-white rounded-2xl p-8 shadow-lg">
                    <div class="aspect-square bg-gradient-to-br from-gray-100 to-gray-200 rounded-xl flex items-center justify-center">
                        <div class="text-center text-gray-600">
                            <svg class="w-24 h-24 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            <p class="text-lg font-semibold">President Photo</p>
                            <p class="text-sm text-gray-500">Placeholder for Chairman Th. M Yang Kyung-joon</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="section-padding bg-gradient-to-r from-[--color-school-blue] to-[--color-school-green] text-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="animate-on-scroll">
            <h2 class="text-3xl lg:text-4xl font-bold mb-6">
                Join Our Vision for Excellence
            </h2>
            <p class="text-xl mb-8 max-w-3xl mx-auto opacity-90">
                Discover how Boston International School Chiangmai can help your child become a global citizen and contribute to humanity's future.
            </p>
            <a href="#contact" class="inline-block bg-white text-[--color-school-blue] px-8 py-4 rounded-full font-semibold text-lg hover:bg-gray-100 transition-all duration-300 shadow-lg hover:shadow-xl">
                Learn More About Our School
            </a>
        </div>
    </div>
</section>

@endsection
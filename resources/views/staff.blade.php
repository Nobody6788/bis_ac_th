@extends('layouts.app')

@section('title', 'Staff - Boston International School Chiangmai')
@section('description', 'Meet our experienced leadership team at Boston International School Chiangmai. Our dedicated educators and administrators bring decades of international education experience.')

@section('content')
@php
    use App\Models\ContentSection;
@endphp

<!-- Hero Section -->
<section class="bg-gradient-to-br from-blue-50 to-green-50 relative overflow-hidden">
    <div class="absolute inset-0">
        <div class="absolute inset-0 bg-white bg-opacity-20"></div>
    </div>
    
    <div class="relative container mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-32">
        <div class="text-center animate-on-scroll">
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold leading-tight mb-6 text-gray-900">
                <span data-translate="staff.title">{{ __('frontend.staff.title') }}</span>
            </h1>
            
            <p class="text-xl lg:text-2xl mb-8 max-w-4xl mx-auto text-gray-700" data-translate="staff.subtitle">
                {{ __('frontend.staff.subtitle') }}
            </p>
        </div>
    </div>
</section>

<!-- Section Divider -->
<div class="section-divider-sky-blue"></div>

<!-- Staff Section -->
<section id="staff-content" class="section-padding bg-[--color-bg-section]">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Staff Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($staff as $member)
                <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 animate-on-scroll text-center flex flex-col h-full">
                    <div class="w-36 h-36 mx-auto mb-6 rounded-full overflow-hidden flex-shrink-0">
                        @if($member->image)
                            <img src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->name }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                                <i class="fas fa-user text-4xl text-gray-400"></i>
                            </div>
                        @endif
                    </div>
                    <div class="flex-grow">
                        <h3 class="text-xl font-bold text-[--color-text-primary] mb-2">{{ $member->name }}</h3>
                        <p class="text-sm text-[--color-school-blue] font-semibold mb-1">{{ $member->position }}</p>
                        @if($member->bio)
                            <p class="text-[--color-text-secondary]">{{ $member->bio }}</p>
                        @endif
                    </div>
                </div>
            @empty
                <div class="md:col-span-2 lg:col-span-3 text-center py-12">
                    <p class="text-lg text-gray-600">No staff members have been added yet.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="section-padding bg-gradient-to-r from-[--color-school-blue] to-[--color-school-green] text-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="animate-on-scroll">
            <h2 class="text-3xl lg:text-4xl font-bold mb-6">
                Ready to Join Our Community?
            </h2>
            <p class="text-xl mb-8 max-w-3xl mx-auto opacity-90">
                Discover how our experienced leadership team can help your child thrive in an international education environment.
            </p>
            <a href="#contact" class="inline-block bg-white text-[--color-school-blue] px-8 py-4 rounded-full font-semibold text-lg hover:bg-gray-100 transition-all duration-300 shadow-lg hover:shadow-xl">
                Contact Our Admissions Team
            </a>
        </div>
    </div>
</section>

@endsection
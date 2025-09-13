@extends('layouts.app')

@section('title', 'News & Notice - Boston International School Chiangmai')
@section('description', 'Stay updated with the latest news, announcements, and notices from Boston International School Chiangmai.')

@section('content')

<!-- Hero Section -->
<section class="bg-gradient-to-br from-blue-50 to-green-50 relative overflow-hidden">
    <div class="absolute inset-0">
        <div class="absolute inset-0 bg-white bg-opacity-20"></div>
    </div>
    
    <div class="relative container mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-32">
        <div class="text-center animate-on-scroll">
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold leading-tight mb-6 text-gray-900">
                NEWS & NOTICE
            </h1>
            <p class="text-xl lg:text-2xl mb-8 max-w-4xl mx-auto text-gray-700">
                Stay informed with the latest updates, announcements, and important notices from our school community.
            </p>
            <div class="w-24 h-1 bg-green-600 mx-auto mb-8"></div>
        </div>
    </div>
</section>

<!-- Section Divider -->
<div class="section-divider-sky-blue"></div>

<!-- News Grid Section -->
<section class="section-padding bg-[--color-bg-section]">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Filter Tabs -->
        <div class="flex flex-wrap justify-center mb-12 animate-on-scroll">
            <div class="flex bg-white rounded-full p-1 shadow-lg">
                <button class="filter-btn active px-6 py-3 rounded-full font-semibold transition-all duration-300" data-filter="all">
                    All News
                </button>
                <button class="filter-btn px-6 py-3 rounded-full font-semibold transition-all duration-300" data-filter="announcement">
                    Announcements
                </button>
                <button class="filter-btn px-6 py-3 rounded-full font-semibold transition-all duration-300" data-filter="academic">
                    Academic News
                </button>
                <button class="filter-btn px-6 py-3 rounded-full font-semibold transition-all duration-300" data-filter="event">
                    Events
                </button>
            </div>
        </div>
        
        <!-- News Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="news-grid">
            @forelse($news as $index => $item)
                @php
                    // Define card classes based on index for different styling
                    $cardClasses = 'news-card bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 animate-on-scroll';
                    
                    // First item is featured and spans 2 columns on large screens
                    if($loop->first) {
                        $cardClasses .= ' lg:col-span-2';
                    } else {
                        $cardClasses .= ' stagger-delay-' . min($loop->index, 5);
                    }
                    
                    // Define category colors and icons
                    $categoryStyles = [
                        'academic' => [
                            'bg' => 'from-green-100 to-green-200',
                            'text' => 'text-green-600',
                            'badge' => 'bg-green-100 text-green-600',
                            'icon' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C20.832 18.477 19.246 18 17.5 18c-1.746 0-3.332.477-4.5 1.253',
                            'label' => 'Academic'
                        ],
                        'sports' => [
                            'bg' => 'from-blue-100 to-blue-200',
                            'text' => 'text-blue-600',
                            'badge' => 'bg-blue-100 text-blue-600',
                            'icon' => 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z',
                            'label' => 'Sports'
                        ],
                        'events' => [
                            'bg' => 'from-purple-100 to-purple-200',
                            'text' => 'text-purple-600',
                            'badge' => 'bg-purple-100 text-purple-600',
                            'icon' => 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z',
                            'label' => 'Event'
                        ],
                        'general' => [
                            'bg' => 'from-yellow-100 to-yellow-200',
                            'text' => 'text-yellow-600',
                            'badge' => 'bg-yellow-100 text-yellow-600',
                            'icon' => 'M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z',
                            'label' => 'Announcement'
                        ]
                    ];
                    
                    // Default to general if category not found
                    $category = strtolower($item->category);
                    $style = $categoryStyles[$category] ?? $categoryStyles['general'];
                    
                    // Format date
                    $formattedDate = $item->published_at ? $item->published_at->format('M d, Y') : 'Draft';
                @endphp
                
                <div class="{{ $cardClasses }}" data-category="{{ $category }}">
                    @if($item->image)
                        <div class="aspect-{{ $loop->first ? 'video' : 'square' }} overflow-hidden">
                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="w-full h-full object-cover">
                        </div>
                    @else
                        <div class="aspect-{{ $loop->first ? 'video' : 'square' }} bg-gradient-to-br {{ $style['bg'] }} flex items-center justify-center">
                            <div class="text-center {{ $style['text'] }}">
                                <svg class="{{ $loop->first ? 'w-16 h-16' : 'w-12 h-12' }} mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $style['icon'] }}"/>
                                </svg>
                                <p class="{{ $loop->first ? 'text-sm' : 'text-xs' }}">{{ $style['label'] }}</p>
                            </div>
                        </div>
                    @endif
                    
                    <div class="{{ $loop->first ? 'p-8' : 'p-6' }}">
                        <div class="flex items-center justify-between mb-{{ $loop->first ? '4' : '3' }}">
                            <span class="{{ $loop->first ? 'px-3 py-1 text-sm' : 'px-2 py-1 text-xs' }} {{ $style['badge'] }} font-semibold rounded-full">
                                {{ $style['label'] }}
                            </span>
                            <span class="text-gray-500 {{ $loop->first ? 'text-sm' : 'text-xs' }}">
                                {{ $formattedDate }}
                            </span>
                        </div>
                        
                        <h{{ $loop->first ? '2' : '3' }} class="{{ $loop->first ? 'text-2xl' : 'text-lg' }} font-bold text-[--color-text-primary] mb-{{ $loop->first ? '4' : '3' }}">
                            {{ $item->title }}
                        </h{{ $loop->first ? '2' : '3' }}>
                        
                        <p class="text-[--color-text-secondary] {{ $loop->first ? 'text-base mb-6' : 'text-sm mb-4' }} leading-relaxed">
                            {{ $item->excerpt ?: \Illuminate\Support\Str::limit(strip_tags($item->content), 150) }}
                        </p>
                        
                        <div class="flex items-center justify-between">
                            <a href="{{ route('news') }}" class="text-[--color-school-blue] font-semibold {{ $loop->first ? 'text-base' : 'text-sm' }} hover:text-blue-800 transition-colors">
                                Read More →
                            </a>
                            @if($loop->first)
                            <div class="flex items-center text-gray-400 text-sm">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                {{ rand(100, 500) }} views
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center py-12">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                    </svg>
                    <h3 class="mt-2 text-lg font-medium text-gray-900">No news yet</h3>
                    <p class="mt-1 text-sm text-gray-500">Check back later for the latest updates.</p>
                </div>
            @endforelse
        </div>
        
        @if($news->hasPages())
        <div class="mt-12">
            {{ $news->links() }}
        </div>
        @endif
        
        <!-- Load More Button -->
        <div class="text-center mt-12 mb-20 animate-on-scroll">
            <button class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded-full font-semibold text-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                Load More News
            </button>
        </div>
    </div>
</section>

<!-- Footer will be included in layout -->

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Filter functionality
    const filterButtons = document.querySelectorAll('.filter-btn');
    const newsCards = document.querySelectorAll('.news-card');
    
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            const filter = this.getAttribute('data-filter');
            
            // Update active button
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            // Filter news cards
            newsCards.forEach(card => {
                const category = card.getAttribute('data-category');
                if (filter === 'all' || category === filter) {
                    card.style.display = 'block';
                    card.style.animation = 'fadeIn 0.5s ease-in-out';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });
});
</script>

<style>
.filter-btn.active {
    background: linear-gradient(135deg, var(--color-school-blue), var(--color-school-green));
    color: white;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
}

.filter-btn:not(.active) {
    background-color: #f8fafc;
    color: #1f2937;
    border: 1px solid #e5e7eb;
}

.filter-btn:not(.active):hover {
    background-color: #e5e7eb;
    color: #111827;
    border-color: #d1d5db;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

.animate-on-scroll {
    opacity: 0;
    transform: translateY(30px);
    transition: all 0.6s ease-out;
}

.animate-on-scroll.in-view {
    opacity: 1;
    transform: translateY(0);
}

.stagger-delay-1 { transition-delay: 0.1s; }
.stagger-delay-2 { transition-delay: 0.2s; }
.stagger-delay-3 { transition-delay: 0.3s; }
.stagger-delay-4 { transition-delay: 0.4s; }
.stagger-delay-5 { transition-delay: 0.5s; }
</style>
@endpush
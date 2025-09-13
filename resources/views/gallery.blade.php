@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<div class="bg-white">
    <div class="max-w-7xl mx-auto px-4 py-16 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl font-bold text-gray-900 sm:text-5xl md:text-6xl">
                Gallery
            </h1>
            <p class="mt-3 max-w-md mx-auto text-base text-gray-600 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
                Explore our vibrant school life through captivating moments captured in our gallery.
            </p>
        </div>
    </div>
</div>

<!-- Featured Images Section -->
@if($featuredImages->count() > 0)
<div class="bg-gray-50 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900">Featured Images</h2>
            <p class="mt-4 text-lg text-gray-600">Highlights from our school activities and achievements</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($featuredImages as $image)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 gallery-item cursor-pointer transform hover:scale-105"
                 data-category="{{ $image->category }}"
                 onclick="openLightbox('{{ $image->image_url }}', '{{ addslashes($image->title) }}', '{{ addslashes($image->description) }}')">
                
                <!-- Image Container with Loading State -->
                <div class="relative bg-gray-100 min-h-[250px] flex items-center justify-center">
                    <!-- Loading Spinner -->
                    <div class="image-loading absolute inset-0 flex items-center justify-center bg-gray-100">
                        <div class="animate-spin rounded-full h-10 w-10 border-b-2 border-blue-600"></div>
                    </div>
                    
                    <!-- Main Image -->
                    <img src="{{ $image->image_url }}" 
                         alt="{{ $image->title }}" 
                         class="w-full h-64 object-cover image-loaded opacity-0 transition-opacity duration-300"
                         onload="this.classList.remove('opacity-0'); this.parentElement.querySelector('.image-loading').style.display='none';"
                         onerror="this.style.display='none'; this.parentElement.querySelector('.image-fallback').style.display='flex'; this.parentElement.querySelector('.image-loading').style.display='none';">
                    
                    <!-- Fallback Image -->
                    <div class="image-fallback absolute inset-0 flex items-center justify-center bg-gray-200" style="display: none;">
                        <div class="text-center text-gray-500">
                            <svg class="mx-auto h-16 w-16 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <p class="text-sm">Image not available</p>
                        </div>
                    </div>
                    
                    <!-- Featured Badge -->
                    <div class="absolute top-3 right-3">
                        <span class="bg-yellow-500 text-white px-3 py-1 rounded-full text-sm font-semibold shadow-lg">
                            <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            Featured
                        </span>
                    </div>
                    
                    <!-- Category Badge -->
                    <div class="absolute top-3 left-3">
                        <span class="bg-blue-600 text-white px-3 py-1 rounded-full text-sm font-semibold shadow-lg">
                            {{ ucfirst($image->category) }}
                        </span>
                    </div>
                </div>
                
                <!-- Card Content -->
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-3 line-clamp-2">{{ $image->title }}</h3>
                    @if($image->description)
                    <p class="text-gray-600 text-sm line-clamp-3">{{ $image->description }}</p>
                    @endif
                    
                                         <!-- Image Info -->
                     <div class="mt-4 flex items-center justify-between text-sm text-gray-500">
                         <span>{{ $image->created_at->format('M d, Y') }}</span>
                     </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif

<!-- Gallery Filter and Grid Section -->
<div class="bg-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Filter Controls -->
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-gray-900 text-center mb-8">All Gallery Images</h2>
            
            <div class="flex flex-wrap justify-center gap-4 mb-8">
                <button onclick="filterGallery('all')" 
                        class="filter-btn active px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200">
                    All Images
                </button>
                @foreach($categories as $category)
                <button onclick="filterGallery('{{ $category }}')" 
                        class="filter-btn px-6 py-3 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors duration-200">
                    {{ ucfirst($category) }}
                </button>
                @endforeach
                <button onclick="filterGallery('featured')" 
                        class="filter-btn px-6 py-3 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors duration-200">
                    Featured Only
                </button>
            </div>
        </div>

        <!-- Gallery Grid -->
        @if($images->count() > 0)
        <div id="gallery-grid" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($images as $image)
            <div class="gallery-item bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 cursor-pointer"
                 data-category="{{ $image->category }}"
                 data-featured="{{ $image->is_featured ? '1' : '0' }}"
                 onclick="openLightbox('{{ $image->image_url }}', '{{ addslashes($image->title) }}', '{{ addslashes($image->description) }}')">
                
                <!-- Image Container with Loading State -->
                <div class="relative bg-gray-100 min-h-[200px] flex items-center justify-center">
                    <!-- Loading Spinner -->
                    <div class="image-loading absolute inset-0 flex items-center justify-center bg-gray-100">
                        <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-blue-600"></div>
                    </div>
                    
                    <!-- Main Image -->
                    <img src="{{ $image->image_url }}" 
                         alt="{{ $image->title }}" 
                         class="w-full h-48 object-cover image-loaded opacity-0 transition-opacity duration-300"
                         onload="this.classList.remove('opacity-0'); this.parentElement.querySelector('.image-loading').style.display='none';"
                         onerror="this.style.display='none'; this.parentElement.querySelector('.image-fallback').style.display='flex'; this.parentElement.querySelector('.image-loading').style.display='none';">
                    
                    <!-- Fallback Image -->
                    <div class="image-fallback absolute inset-0 flex items-center justify-center bg-gray-200" style="display: none;">
                        <div class="text-center text-gray-500">
                            <svg class="mx-auto h-12 w-12 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <p class="text-sm">Image not available</p>
                        </div>
                    </div>
                    
                    <!-- Featured Badge -->
                    @if($image->is_featured)
                    <div class="absolute top-2 right-2">
                        <span class="bg-yellow-500 text-white px-2 py-1 rounded-full text-xs font-semibold shadow-lg">
                            <svg class="w-3 h-3 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            Featured
                        </span>
                    </div>
                    @endif
                    
                    <!-- Category Badge -->
                    <div class="absolute top-2 left-2">
                        <span class="bg-blue-600 text-white px-2 py-1 rounded-full text-xs font-semibold shadow-lg">
                            {{ ucfirst($image->category) }}
                        </span>
                    </div>
                </div>
                
                <!-- Card Content -->
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2 line-clamp-2">{{ $image->title }}</h3>
                    @if($image->description)
                    <p class="text-gray-600 text-sm line-clamp-2">{{ $image->description }}</p>
                    @endif
                    
                                         <!-- Image Info -->
                     <div class="mt-3 flex items-center justify-between text-xs text-gray-500">
                         <span>{{ $image->created_at->format('M d, Y') }}</span>
                     </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-12 flex justify-center">
            {{ $images->withQueryString()->links() }}
        </div>
        @else
        <div class="text-center py-16">
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <h3 class="mt-4 text-lg font-medium text-gray-900">No images found</h3>
            <p class="mt-2 text-gray-500">Gallery images will appear here once uploaded.</p>
        </div>
        @endif
    </div>
</div>

<!-- Lightbox Modal -->
<div id="lightbox" class="fixed inset-0 bg-black bg-opacity-75 z-50 hidden flex items-center justify-center p-4">
    <div class="relative max-w-4xl max-h-full">
        <!-- Close button -->
        <button onclick="closeLightbox()" 
                class="absolute top-4 right-4 z-10 text-white hover:text-gray-300 bg-black bg-opacity-50 rounded-full p-2">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
        
        <!-- Image -->
        <img id="lightbox-image" src="" alt="" class="max-w-full max-h-[80vh] object-contain">
        
        <!-- Content -->
        <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-75 text-white p-4">
            <h3 id="lightbox-title" class="text-xl font-semibold mb-2"></h3>
            <p id="lightbox-description" class="text-gray-300"></p>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
// Gallery filtering functionality
function filterGallery(category) {
    const items = document.querySelectorAll('.gallery-item');
    const buttons = document.querySelectorAll('.filter-btn');
    
    // Update button states
    buttons.forEach(btn => {
        btn.classList.remove('active', 'bg-blue-600', 'text-white');
        btn.classList.add('bg-gray-200', 'text-gray-700');
    });
    
    event.target.classList.remove('bg-gray-200', 'text-gray-700');
    event.target.classList.add('active', 'bg-blue-600', 'text-white');
    
    // Filter items
    items.forEach(item => {
        const itemCategory = item.dataset.category;
        const isFeatured = item.dataset.featured === '1';
        
        if (category === 'all') {
            item.style.display = 'block';
        } else if (category === 'featured') {
            item.style.display = isFeatured ? 'block' : 'none';
        } else {
            item.style.display = itemCategory === category ? 'block' : 'none';
        }
    });
}

// Lightbox functionality
function openLightbox(imageSrc, title, description) {
    const lightbox = document.getElementById('lightbox');
    const lightboxImage = document.getElementById('lightbox-image');
    const lightboxTitle = document.getElementById('lightbox-title');
    const lightboxDescription = document.getElementById('lightbox-description');
    
    lightboxImage.src = imageSrc;
    lightboxImage.alt = title;
    lightboxTitle.textContent = title;
    lightboxDescription.textContent = description || '';
    
    lightbox.classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeLightbox() {
    const lightbox = document.getElementById('lightbox');
    lightbox.classList.add('hidden');
    document.body.style.overflow = 'auto';
}

// Close lightbox on escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeLightbox();
    }
});

// Close lightbox when clicking outside the image
document.getElementById('lightbox').addEventListener('click', function(e) {
    if (e.target === this) {
        closeLightbox();
    }
});

// Image loading improvements
document.addEventListener('DOMContentLoaded', function() {
    // Preload images for better performance
    const images = document.querySelectorAll('.gallery-item img');
    images.forEach(img => {
        if (img.src) {
            const preloadImg = new Image();
            preloadImg.src = img.src;
        }
    });
    
    // Add loading animation for images
    const imageContainers = document.querySelectorAll('.gallery-item .relative');
    imageContainers.forEach(container => {
        const img = container.querySelector('img');
        const loading = container.querySelector('.image-loading');
        const fallback = container.querySelector('.image-fallback');
        
        if (img) {
            img.addEventListener('load', function() {
                if (loading) loading.style.display = 'none';
                this.classList.remove('opacity-0');
            });
            
            img.addEventListener('error', function() {
                if (loading) loading.style.display = 'none';
                if (fallback) fallback.style.display = 'flex';
                this.style.display = 'none';
            });
        }
    });
    
    // Add intersection observer for lazy loading (optional)
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src || img.src;
                    observer.unobserve(img);
                }
            });
        });
        
        images.forEach(img => {
            imageObserver.observe(img);
        });
    }
});
</script>
@endpush

@push('styles')
<style>
.gallery-item {
    transition: all 0.3s ease;
}

.gallery-item:hover {
    transform: translateY(-4px);
}

.filter-btn.active {
    box-shadow: 0 4px 6px -1px rgba(59, 130, 246, 0.3);
}

/* Aspect ratio utility for older browsers */
.aspect-w-16 {
    position: relative;
    width: 100%;
}

.aspect-w-16::before {
    content: '';
    display: block;
    padding-bottom: 56.25%; /* 16:9 ratio */
}

.aspect-h-9 {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
}
</style>
@endpush
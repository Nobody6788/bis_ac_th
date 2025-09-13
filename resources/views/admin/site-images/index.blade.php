@extends('layouts.admin')

@section('page-title', 'Site Images Management')

@section('content')
<div class="row">
    <div class="col-12">
        <!-- Header Card with Filters -->
        <div class="card mb-4">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        <i class="fas fa-images me-2 text-primary"></i>
                        Site Images Management
                    </h5>
                    <a href="{{ route('admin.site-images.create') }}" class="btn btn-primary btn-gradient">
                        <i class="fas fa-plus me-1"></i>
                        Upload New Image
                    </a>
                </div>
            </div>
            <div class="card-body">
                <!-- Filter Controls -->
                <div class="row g-3 mb-4">
                    <div class="col-md-4">
                        <label class="form-label small fw-bold text-muted">FILTER BY SECTION</label>
                        <select id="locationFilter" class="form-select form-select-sm">
                            <option value="">All Sections</option>
                            <option value="hero-slide">Hero Slider</option>
                            <option value="about-section">About Section</option>
                            <option value="programs-section">Programs Section</option>
                            <option value="facilities-section">Facilities Section</option>
                            <option value="footer-banner">Footer Banner</option>
                            <option value="contact-section">Contact Section</option>
                            <option value="banner-main">Main Banner</option>
                            <option value="gallery-featured">Gallery Featured</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small fw-bold text-muted">FILTER BY STATUS</label>
                        <select id="statusFilter" class="form-select form-select-sm">
                            <option value="">All Status</option>
                            <option value="active">Active Only</option>
                            <option value="inactive">Inactive Only</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small fw-bold text-muted">SEARCH</label>
                        <div class="input-group input-group-sm">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                            <input type="text" id="searchInput" class="form-control" placeholder="Search by name...">
                        </div>
                    </div>
                </div>
                
                <!-- Statistics Bar -->
                <div class="row g-2">
                    <div class="col-auto">
                        <div class="badge bg-primary">Total: <span id="totalCount">{{ $images->total() }}</span></div>
                    </div>
                    <div class="col-auto">
                        <div class="badge bg-success">Active: <span id="activeCount">{{ $images->where('is_active', true)->count() }}</span></div>
                    </div>
                    <div class="col-auto">
                        <div class="badge bg-secondary">Inactive: <span id="inactiveCount">{{ $images->where('is_active', false)->count() }}</span></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Images Grid -->
        <div class="card">
            <div class="card-body p-0">
                @if($images->count() > 0)
                    <div class="row g-4 p-4" id="imagesGrid">
                        @foreach($images as $image)
                            <div class="col-lg-4 col-md-6 image-card" 
                                 data-location="{{ $image->location }}" 
                                 data-status="{{ $image->is_active ? 'active' : 'inactive' }}"
                                 data-name="{{ strtolower($image->name) }}">
                                <div class="card h-100 border-0 shadow-hover image-item">
                                    <div class="position-relative overflow-hidden rounded-top">
                                        <img src="{{ $image->image_url }}" alt="{{ $image->alt_text }}" 
                                             class="card-img-top image-zoom" style="height: 220px; object-fit: cover; transition: transform 0.3s ease;">
                                        
                                        <!-- Status Badge -->
                                        <div class="position-absolute top-0 end-0 p-2">
                                            @if($image->is_active)
                                                <span class="badge bg-success shadow"><i class="fas fa-eye me-1"></i>Active</span>
                                            @else
                                                <span class="badge bg-secondary shadow"><i class="fas fa-eye-slash me-1"></i>Inactive</span>
                                            @endif
                                        </div>
                                        
                                        <!-- Location Badge -->
                                        <div class="position-absolute top-0 start-0 p-2">
                                            <span class="badge bg-primary bg-opacity-90 shadow">
                                                <i class="fas fa-map-marker-alt me-1"></i>
                                                {{ $locations[$image->location] ?? ucfirst(str_replace('-', ' ', $image->location)) }}
                                            </span>
                                        </div>
                                        
                                        <!-- Quick Action Overlay -->
                                        <div class="position-absolute bottom-0 start-0 end-0 bg-dark bg-opacity-75 p-2 quick-actions" style="transform: translateY(100%); transition: transform 0.3s ease;">
                                            <div class="btn-group w-100 btn-group-sm">
                                                <a href="{{ route('admin.site-images.show', $image) }}" 
                                                   class="btn btn-light" title="View Details">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.site-images.edit', $image) }}" 
                                                   class="btn btn-light" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <button type="button" class="btn btn-light" 
                                                        onclick="copyImageUrl('{{ $image->image_url }}')"
                                                        title="Copy URL">
                                                    <i class="fas fa-link"></i>
                                                </button>
                                                <form action="{{ route('admin.site-images.destroy', $image) }}" 
                                                      method="POST" class="d-inline" 
                                                      onsubmit="return confirm('Are you sure you want to delete this image?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-light text-danger" title="Delete">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="card-body">
                                        <h6 class="card-title fw-bold mb-2">{{ $image->name }}</h6>
                                        @if($image->description)
                                            <p class="card-text small text-muted mb-2">{{ Str::limit($image->description, 80) }}</p>
                                        @endif
                                        
                                        <div class="d-flex justify-content-between align-items-center mt-auto">
                                            <small class="text-muted">
                                                <i class="fas fa-clock me-1"></i>
                                                {{ $image->created_at->diffForHumans() }}
                                            </small>
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{ route('admin.site-images.show', $image) }}" 
                                                   class="btn btn-outline-info" title="View Details">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.site-images.edit', $image) }}" 
                                                   class="btn btn-outline-primary" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                    <!-- Pagination -->
                    @if($images->hasPages())
                        <div class="d-flex justify-content-center p-4 border-top">
                            {{ $images->links() }}
                        </div>
                    @endif
                @else
                    <div class="text-center py-5">
                        <div class="mb-4">
                            <i class="fas fa-images fa-4x text-muted opacity-50"></i>
                        </div>
                        <h5 class="text-muted mb-2">No Images Uploaded Yet</h5>
                        <p class="text-muted mb-4">Start building your website by uploading images for different sections including hero slider, about section, and more.</p>
                        <a href="{{ route('admin.site-images.create') }}" class="btn btn-primary btn-lg">
                            <i class="fas fa-plus me-2"></i>
                            Upload Your First Image
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Success Toast -->
@if(session('success'))
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div class="toast show" role="alert">
            <div class="toast-header">
                <i class="fas fa-check-circle text-success me-2"></i>
                <strong class="me-auto">Success</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
            </div>
            <div class="toast-body">
                {{ session('success') }}
            </div>
        </div>
    </div>
@endif
@endsection

@push('styles')
<style>
.btn-gradient {
    background: linear-gradient(45deg, #007bff, #0056b3);
    border: none;
    transition: all 0.3s ease;
}

.btn-gradient:hover {
    background: linear-gradient(45deg, #0056b3, #004085);
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(0,123,255,0.3);
}

.shadow-hover {
    transition: all 0.3s ease;
}

.shadow-hover:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
}

.image-item:hover .quick-actions {
    transform: translateY(0);
}

.image-item:hover .image-zoom {
    transform: scale(1.05);
}

.badge {
    font-size: 0.75rem;
}

.form-select-sm, .input-group-sm .form-control {
    border-radius: 0.375rem;
}

.image-card {
    transition: opacity 0.3s ease, transform 0.3s ease;
}

.image-card.filtered-out {
    opacity: 0.3;
    transform: scale(0.95);
}
</style>
@endpush

@push('scripts')
<script>
// Filter functionality
const locationFilter = document.getElementById('locationFilter');
const statusFilter = document.getElementById('statusFilter');
const searchInput = document.getElementById('searchInput');
const imageCards = document.querySelectorAll('.image-card');

function filterImages() {
    const locationValue = locationFilter.value.toLowerCase();
    const statusValue = statusFilter.value;
    const searchValue = searchInput.value.toLowerCase();
    
    let visibleCount = 0;
    let activeCount = 0;
    let inactiveCount = 0;
    
    imageCards.forEach(card => {
        const cardLocation = card.dataset.location.toLowerCase();
        const cardStatus = card.dataset.status;
        const cardName = card.dataset.name;
        
        let show = true;
        
        // Location filter
        if (locationValue && !cardLocation.includes(locationValue)) {
            show = false;
        }
        
        // Status filter
        if (statusValue && cardStatus !== statusValue) {
            show = false;
        }
        
        // Search filter
        if (searchValue && !cardName.includes(searchValue)) {
            show = false;
        }
        
        if (show) {
            card.classList.remove('filtered-out');
            visibleCount++;
            if (cardStatus === 'active') activeCount++;
            else inactiveCount++;
        } else {
            card.classList.add('filtered-out');
        }
    });
    
    // Update counts
    document.getElementById('totalCount').textContent = visibleCount;
    document.getElementById('activeCount').textContent = activeCount;
    document.getElementById('inactiveCount').textContent = inactiveCount;
}

// Event listeners
locationFilter.addEventListener('change', filterImages);
statusFilter.addEventListener('change', filterImages);
searchInput.addEventListener('input', filterImages);

// Copy URL functionality
function copyImageUrl(url) {
    navigator.clipboard.writeText(url).then(() => {
        showToast('URL copied to clipboard!', 'success');
    }).catch(() => {
        showToast('Failed to copy URL', 'error');
    });
}

// Toast notification function
function showToast(message, type = 'success') {
    const toastContainer = document.querySelector('.toast-container') || createToastContainer();
    const toast = document.createElement('div');
    toast.className = 'toast show';
    toast.innerHTML = `
        <div class="toast-header">
            <i class="fas fa-${type === 'success' ? 'check-circle text-success' : 'exclamation-circle text-danger'} me-2"></i>
            <strong class="me-auto">${type === 'success' ? 'Success' : 'Error'}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
        </div>
        <div class="toast-body">${message}</div>
    `;
    
    toastContainer.appendChild(toast);
    
    // Auto remove after 3 seconds
    setTimeout(() => {
        if (toast.parentNode) {
            toast.remove();
        }
    }, 3000);
}

function createToastContainer() {
    const container = document.createElement('div');
    container.className = 'toast-container position-fixed bottom-0 end-0 p-3';
    document.body.appendChild(container);
    return container;
}
</script>
@endpush
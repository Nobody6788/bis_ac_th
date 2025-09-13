@extends('layouts.admin')

@section('page-title', 'Site Image Details')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card shadow-lg border-0">
            <div class="card-header bg-gradient-primary text-white d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-0">
                        <i class="fas fa-image me-2"></i>
                        {{ $siteImage->name }}
                    </h5>
                    <p class="mb-0 small opacity-75">{{ $locations[$siteImage->location] ?? ucfirst(str_replace('-', ' ', $siteImage->location)) }}</p>
                </div>
                <div>
                    @if($siteImage->is_active)
                        <span class="badge bg-success bg-opacity-75 me-2 fs-6">
                            <i class="fas fa-eye me-1"></i>Active
                        </span>
                    @else
                        <span class="badge bg-secondary bg-opacity-75 me-2 fs-6">
                            <i class="fas fa-eye-slash me-1"></i>Inactive
                        </span>
                    @endif
                    <div class="btn-group">
                        <a href="{{ route('admin.site-images.edit', $siteImage) }}" class="btn btn-light btn-sm">
                            <i class="fas fa-edit me-1"></i>
                            Edit
                        </a>
                        <button type="button" class="btn btn-light btn-sm dropdown-toggle dropdown-toggle-split" 
                                data-bs-toggle="dropdown">
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ $siteImage->image_url }}" target="_blank">
                                <i class="fas fa-external-link-alt me-2"></i>View Full Size
                            </a></li>
                            <li><button class="dropdown-item" onclick="copyToClipboard('{{ $siteImage->image_url }}')">
                                <i class="fas fa-copy me-2"></i>Copy URL
                            </button></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('admin.site-images.destroy', $siteImage) }}" 
                                      method="POST" class="d-inline" 
                                      onsubmit="return confirm('Are you sure you want to delete this image?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="fas fa-trash me-2"></i>Delete Image
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body p-4">
                <div class="row">
                    <!-- Image Display -->
                    <div class="col-lg-8">
                        <div class="mb-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h6 class="text-muted mb-0">
                                    <i class="fas fa-eye me-2"></i>
                                    Image Preview
                                </h6>
                                <div class="btn-group btn-group-sm">
                                    <button class="btn btn-outline-primary" onclick="zoomImage()">
                                        <i class="fas fa-search-plus me-1"></i>Zoom
                                    </button>
                                    <a href="{{ $siteImage->image_url }}" target="_blank" class="btn btn-outline-info">
                                        <i class="fas fa-external-link-alt me-1"></i>Full Size
                                    </a>
                                </div>
                            </div>
                            <div class="border rounded-3 p-3 text-center bg-light position-relative image-container">
                                <img id="mainImage" src="{{ $siteImage->image_url }}" alt="{{ $siteImage->alt_text }}" 
                                     class="img-fluid rounded shadow-sm" style="max-height: 500px; object-fit: contain; cursor: zoom-in;">
                                
                                <!-- Image overlay info -->
                                <div class="position-absolute bottom-0 start-0 end-0 bg-dark bg-opacity-75 text-white p-2 rounded-bottom">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small>Click to zoom | Right-click to download</small>
                                        <button class="btn btn-sm btn-outline-light" onclick="copyToClipboard('{{ $siteImage->image_url }}')">
                                            <i class="fas fa-copy"></i> Copy URL
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Usage Instructions -->
                        <div class="card bg-info bg-opacity-10 border-info">
                            <div class="card-body">
                                <h6 class="card-title text-info">
                                    <i class="fas fa-code me-2"></i>
                                    How to Use This Image
                                </h6>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="card-text small mb-2">
                                            <strong>Image URL:</strong><br>
                                            <code class="text-break">{{ $siteImage->image_url }}</code>
                                            <button class="btn btn-outline-info btn-sm ms-2" onclick="copyToClipboard('{{ $siteImage->image_url }}')">
                                                <i class="fas fa-copy"></i>
                                            </button>
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="card-text small mb-2">
                                            <strong>Blade Template Usage:</strong><br>
                                            <code class="text-break">SiteImage::getByLocation('{{ $siteImage->location }}')</code>
                                            <button class="btn btn-outline-info btn-sm ms-2" onclick="copyToClipboard(`SiteImage::getByLocation('{{ $siteImage->location }}')`)">
                                                <i class="fas fa-copy"></i>
                                            </button>
                                        </p>
                                    </div>
                                </div>
                                
                                @if(str_contains($siteImage->location, 'hero-slide'))
                                    <div class="alert alert-info border-0 mt-2 mb-0">
                                        <i class="fas fa-info-circle me-2"></i>
                                        <strong>Hero Slider Usage:</strong> This image will automatically be used in the hero slider when active.
                                    </div>
                                @elseif($siteImage->location === 'hero-background')
                                    <div class="alert alert-info border-0 mt-2 mb-0">
                                        <i class="fas fa-info-circle me-2"></i>
                                        <strong>Hero Background:</strong> This image will be used as the hero section background when active.
                                    </div>
                                @else
                                    <div class="alert alert-info border-0 mt-2 mb-0">
                                        <i class="fas fa-info-circle me-2"></i>
                                        <strong>Section Usage:</strong> This image can be used in the {{ str_replace('-', ' ', $siteImage->location) }} section.
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    <!-- Image Details Sidebar -->
                    <div class="col-lg-4">
                        <div class="sticky-top" style="top: 1rem;">
                            <h6 class="text-muted mb-3">
                                <i class="fas fa-info-circle me-2"></i>
                                Image Details
                            </h6>
                            
                            <div class="card border-0 bg-light">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-sm table-borderless">
                                            <tr>
                                                <th width="40%" class="text-muted">Name:</th>
                                                <td class="fw-bold">{{ $siteImage->name }}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-muted">Location:</th>
                                                <td>
                                                    <span class="badge bg-primary">
                                                        {{ $locations[$siteImage->location] ?? ucfirst(str_replace('-', ' ', $siteImage->location)) }}
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-muted">Status:</th>
                                                <td>
                                                    @if($siteImage->is_active)
                                                        <span class="badge bg-success">
                                                            <i class="fas fa-eye me-1"></i>Active
                                                        </span>
                                                    @else
                                                        <span class="badge bg-secondary">
                                                            <i class="fas fa-eye-slash me-1"></i>Inactive
                                                        </span>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-muted">Alt Text:</th>
                                                <td>{{ $siteImage->alt_text ?: 'Not set' }}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-muted">Uploaded:</th>
                                                <td>{{ $siteImage->created_at->format('M d, Y g:i A') }}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-muted">Updated:</th>
                                                <td>{{ $siteImage->updated_at->format('M d, Y g:i A') }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            
                            @if($siteImage->description)
                                <div class="mt-3">
                                    <h6 class="text-muted mb-2">
                                        <i class="fas fa-align-left me-2"></i>
                                        Description
                                    </h6>
                                    <div class="card border-0 bg-light">
                                        <div class="card-body">
                                            <p class="small mb-0">{{ $siteImage->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            
                            <!-- Quick Actions -->
                            <div class="mt-4">
                                <h6 class="text-muted mb-3">
                                    <i class="fas fa-bolt me-2"></i>
                                    Quick Actions
                                </h6>
                                <div class="d-grid gap-2">
                                    <a href="{{ route('admin.site-images.edit', $siteImage) }}" class="btn btn-primary">
                                        <i class="fas fa-edit me-2"></i>Edit Image
                                    </a>
                                    <button class="btn btn-outline-info" onclick="copyToClipboard('{{ $siteImage->image_url }}')">
                                        <i class="fas fa-copy me-2"></i>Copy URL
                                    </button>
                                    <a href="{{ $siteImage->image_url }}" target="_blank" class="btn btn-outline-secondary">
                                        <i class="fas fa-external-link-alt me-2"></i>Open in New Tab
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Related Images -->
                @if($relatedImages && $relatedImages->count() > 1)
                    <div class="row mt-5">
                        <div class="col-12">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h6 class="text-muted mb-0">
                                    <i class="fas fa-layer-group me-2"></i>
                                    Other Images in "{{ $locations[$siteImage->location] ?? ucfirst(str_replace('-', ' ', $siteImage->location)) }}"
                                </h6>
                                <small class="text-muted">{{ $relatedImages->count() - 1 }} more image(s)</small>
                            </div>
                            <div class="row g-3">
                                @foreach($relatedImages as $related)
                                    @if($related->id !== $siteImage->id)
                                        <div class="col-lg-3 col-md-4 col-sm-6">
                                            <div class="card border-0 shadow-sm h-100">
                                                <div class="position-relative">
                                                    <img src="{{ $related->image_url }}" alt="{{ $related->alt_text }}" 
                                                         class="card-img-top" style="height: 150px; object-fit: cover;">
                                                    @if($related->is_active)
                                                        <span class="position-absolute top-0 end-0 m-2 badge bg-success">Active</span>
                                                    @endif
                                                </div>
                                                <div class="card-body p-3">
                                                    <h6 class="card-title small fw-bold mb-2">{{ Str::limit($related->name, 30) }}</h6>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <small class="text-muted">{{ $related->created_at->diffForHumans() }}</small>
                                                        <a href="{{ route('admin.site-images.show', $related) }}" 
                                                           class="btn btn-outline-primary btn-sm">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
                
                <div class="d-flex justify-content-between mt-5 pt-3 border-top">
                    <a href="{{ route('admin.site-images.index') }}" class="btn btn-outline-secondary btn-lg">
                        <i class="fas fa-arrow-left me-2"></i>
                        Back to Images
                    </a>
                    <div>
                        <a href="{{ route('admin.site-images.edit', $siteImage) }}" class="btn btn-primary btn-lg">
                            <i class="fas fa-edit me-2"></i>
                            Edit Image
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Image Zoom Modal -->
<div class="modal fade" id="imageZoomModal" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $siteImage->name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center p-0">
                <img src="{{ $siteImage->image_url }}" alt="{{ $siteImage->alt_text }}" 
                     class="img-fluid" style="max-height: 80vh;">
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.bg-gradient-primary {
    background: linear-gradient(45deg, #007bff, #0056b3);
}

.image-container {
    transition: all 0.3s ease;
}

.image-container:hover {
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
}

#mainImage {
    transition: transform 0.3s ease;
}

#mainImage:hover {
    transform: scale(1.02);
}

.sticky-top {
    z-index: 1020;
}
</style>
@endpush

@push('scripts')
<script>
function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(function() {
        showToast('Copied to clipboard!', 'success');
    }).catch(function() {
        showToast('Failed to copy', 'error');
    });
}

function zoomImage() {
    const modal = new bootstrap.Modal(document.getElementById('imageZoomModal'));
    modal.show();
}

// Click to zoom
document.getElementById('mainImage').addEventListener('click', zoomImage);

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

@php
    // Define locations array if not passed from controller
    $locations = $locations ?? [
        'hero-slide-1' => 'Hero Slider - Academic Excellence',
        'hero-slide-2' => 'Hero Slider - Sports & Activities', 
        'hero-slide-3' => 'Hero Slider - Arts & Creativity',
        'hero-slide-4' => 'Hero Slider - Global Citizenship',
        'hero-background' => 'Hero Section Background',
        'about-section' => 'About Section Image',
        'programs-section' => 'Programs Section Image',
        'facilities-section' => 'Facilities Section Image',
        'footer-banner' => 'Footer Banner Image',
        'contact-section' => 'Contact Section Image',
        'banner-main' => 'Main Banner Image',
        'gallery-featured' => 'Gallery Featured Image'
    ];
    
    // Get related images in the same location
    $relatedImages = $relatedImages ?? App\Models\SiteImage::where('location', $siteImage->location)->get();
@endphp
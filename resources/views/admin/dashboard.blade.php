@extends('layouts.admin')

@section('page-title', 'Dashboard')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 mb-0">
            <i class="fas fa-tachometer-alt me-2 text-primary"></i>
            Dashboard Overview
        </h1>
        <nav aria-label="breadcrumb" class="mt-2">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </nav>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.news.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i> New Article
        </a>
        <a href="{{ route('admin.gallery.create') }}" class="btn btn-success">
            <i class="fas fa-upload me-1"></i> Upload Image
        </a>
    </div>
</div>

<!-- Stats Grid -->
<div class="row g-4 mb-4">
    <!-- News Stats -->
    <div class="col-xl-3 col-md-6">
        <div class="card border-start border-primary border-3 h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-uppercase text-muted mb-1">Total News</h6>
                        <h2 class="mb-0">{{ $stats['total_news'] }}</h2>
                        <small class="text-muted">{{ $stats['published_news'] }} published</small>
                    </div>
                    <div class="bg-primary bg-opacity-10 p-3 rounded">
                        <i class="fas fa-newspaper fa-2x text-primary"></i>
                    </div>
                </div>
                <div class="mt-3">
                    <a href="{{ route('admin.news.index') }}" class="btn btn-sm btn-outline-primary w-100">
                        View All <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Gallery Stats -->
    <div class="col-xl-3 col-md-6">
        <div class="card border-start border-success border-3 h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-uppercase text-muted mb-1">Gallery</h6>
                        <h2 class="mb-0">{{ $stats['total_gallery_images'] }}</h2>
                        <small class="text-muted">In gallery collection</small>
                    </div>
                    <div class="bg-success bg-opacity-10 p-3 rounded">
                        <i class="fas fa-images fa-2x text-success"></i>
                    </div>
                </div>
                <div class="mt-3">
                    <a href="{{ route('admin.gallery.index') }}" class="btn btn-sm btn-outline-success w-100">
                        View Gallery <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Site Images Stats -->
    <div class="col-xl-3 col-md-6">
        <div class="card border-start border-info border-3 h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-uppercase text-muted mb-1">Site Images</h6>
                        <h2 class="mb-0">{{ $stats['total_site_images'] }}</h2>
                        <small class="text-muted">For hero &amp; sections</small>
                    </div>
                    <div class="bg-info bg-opacity-10 p-3 rounded">
                        <i class="fas fa-image fa-2x text-info"></i>
                    </div>
                </div>
                <div class="mt-3">
                    <a href="{{ route('admin.site-images.index') }}" class="btn btn-sm btn-outline-info w-100">
                        Manage Images <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Users Stats -->
    <div class="col-xl-3 col-md-6">
        <div class="card border-start border-warning border-3 h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-uppercase text-muted mb-1">Users</h6>
                        <h2 class="mb-0">{{ $stats['total_users'] }}</h2>
                        <small class="text-muted">{{ $stats['admin_users'] }} admins</small>
                    </div>
                    <div class="bg-warning bg-opacity-10 p-3 rounded">
                        <i class="fas fa-users fa-2x text-warning"></i>
                    </div>
                </div>
                <div class="mt-3">
                    <a href="{{ route('admin.users.index') }}" class="btn btn-sm btn-outline-warning w-100">
                        Manage Users <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-bolt me-2"></i>
                    Quick Actions
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- News Management -->
                    <div class="col-md-4 mb-3">
                        <div class="card border-primary h-100">
                            <div class="card-header bg-primary text-white">
                                <h6 class="mb-0">
                                    <i class="fas fa-newspaper me-2"></i>
                                    News Management
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6 mb-2">
                                        <a href="{{ route('admin.news.index') }}" class="btn btn-outline-primary btn-sm w-100">
                                            <i class="fas fa-list me-1"></i>
                                            All News
                                        </a>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <a href="{{ route('admin.news.create') }}" class="btn btn-primary btn-sm w-100">
                                            <i class="fas fa-plus me-1"></i>
                                            New Article
                                        </a>
                                    </div>
                                </div>
                                <small class="text-muted">{{ $stats['total_news'] }} articles ({{ $stats['published_news'] }} published)</small>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Gallery Management -->
                    <div class="col-md-4 mb-3">
                        <div class="card border-success h-100">
                            <div class="card-header bg-success text-white">
                                <h6 class="mb-0">
                                    <i class="fas fa-images me-2"></i>
                                    Gallery Management
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6 mb-2">
                                        <a href="{{ route('admin.gallery.index') }}" class="btn btn-outline-success btn-sm w-100">
                                            <i class="fas fa-images me-1"></i>
                                            View Gallery
                                        </a>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <a href="{{ route('admin.gallery.create') }}" class="btn btn-success btn-sm w-100">
                                            <i class="fas fa-plus me-1"></i>
                                            Add Images
                                        </a>
                                    </div>
                                </div>
                                <small class="text-muted">{{ $stats['total_gallery_images'] }} images in collection</small>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Site Images Management -->
                    <div class="col-md-4 mb-3">
                        <div class="card border-warning h-100">
                            <div class="card-header bg-warning text-dark">
                                <h6 class="mb-0">
                                    <i class="fas fa-image me-2"></i>
                                    Site Images
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6 mb-2">
                                        <a href="{{ route('admin.site-images.index') }}" class="btn btn-outline-warning btn-sm w-100">
                                            <i class="fas fa-list me-1"></i>
                                            All Images
                                        </a>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <a href="{{ route('admin.site-images.create') }}" class="btn btn-warning btn-sm w-100">
                                            <i class="fas fa-upload me-1"></i>
                                            Upload Image
                                        </a>
                                    </div>
                                </div>
                                <small class="text-muted">{{ $stats['total_site_images'] }} images for hero slider & sections</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Content Sections -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">
                    <i class="fas fa-edit me-2"></i>
                    Recent Content Updates
                </h5>
                <a href="{{ route('admin.content.index') }}" class="btn btn-sm btn-outline-info">
                    View All
                </a>
            </div>
            <div class="card-body">
                @if($recent_content->count() > 0)
                    <div class="row">
                        @foreach($recent_content as $content)
                            <div class="col-md-6 col-lg-4 mb-3">
                                <div class="card border-light h-100">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-start mb-2">
                                            <h6 class="card-title mb-1">{{ Str::limit($content->section_name, 25) }}</h6>
                                            @if($content->is_active)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-secondary">Inactive</span>
                                            @endif
                                        </div>
                                        <p class="text-muted small mb-2">
                                            <strong>Key:</strong> <code class="small">{{ $content->section_key }}</code><br>
                                            <strong>Page:</strong> {{ $content->page }}
                                        </p>
                                        <p class="text-muted small mb-3">{{ Str::limit($content->content, 80) }}</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <small class="text-muted">{{ $content->updated_at->diffForHumans() }}</small>
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{ route('admin.content.edit', $content) }}" 
                                                   class="btn btn-outline-primary btn-sm" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <button type="button" class="btn btn-outline-info btn-sm preview-btn" 
                                                        data-content-id="{{ $content->id }}" title="Preview">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <form action="{{ route('admin.content.toggle-status', $content) }}" 
                                                      method="POST" class="d-inline">
                                                    @csrf
                                                    <button type="submit" 
                                                            class="btn btn-outline-{{ $content->is_active ? 'warning' : 'success' }} btn-sm" 
                                                            title="{{ $content->is_active ? 'Deactivate' : 'Activate' }}">
                                                        <i class="fas fa-{{ $content->is_active ? 'eye-slash' : 'eye' }}"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center text-muted py-4">
                        <i class="fas fa-edit fa-3x mb-3 opacity-50"></i>
                        <p>No content sections yet.</p>
                        <a href="{{ route('admin.content.create') }}" class="btn btn-info">
                            Create First Content Section
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Recent Activity -->
<div class="row">
    <!-- Recent News -->
    <div class="col-lg-6 mb-4">
        <div class="card h-100">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">
                    <i class="fas fa-newspaper me-2"></i>
                    Recent News
                </h5>
                <a href="{{ route('admin.news.index') }}" class="btn btn-sm btn-outline-primary">
                    View All
                </a>
            </div>
            <div class="card-body">
                @if($recent_news->count() > 0)
                    @foreach($recent_news as $news)
                        <div class="d-flex align-items-center mb-3 pb-3 {{ !$loop->last ? 'border-bottom' : '' }}">
                            @if($news->image)
                                <img src="{{ $news->image_url }}" alt="{{ $news->title }}" 
                                     class="rounded me-3" style="width: 50px; height: 50px; object-fit: cover;">
                            @else
                                <div class="bg-light rounded me-3 d-flex align-items-center justify-content-center" 
                                     style="width: 50px; height: 50px;">
                                    <i class="fas fa-newspaper text-muted"></i>
                                </div>
                            @endif
                            <div class="flex-grow-1">
                                <h6 class="mb-1">{{ Str::limit($news->title, 40) }}</h6>
                                <small class="text-muted">
                                    {{ $news->created_at->diffForHumans() }}
                                    @if($news->is_published)
                                        <span class="badge bg-success ms-1">Published</span>
                                    @else
                                        <span class="badge bg-warning ms-1">Draft</span>
                                    @endif
                                </small>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="text-center text-muted py-4">
                        <i class="fas fa-newspaper fa-3x mb-3 opacity-50"></i>
                        <p>No news items yet.</p>
                        <a href="{{ route('admin.news.create') }}" class="btn btn-primary">
                            Create First News Item
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Recent Gallery Images -->
    <div class="col-lg-6 mb-4">
        <div class="card h-100">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">
                    <i class="fas fa-images me-2"></i>
                    Recent Gallery Images
                </h5>
                <a href="{{ route('admin.gallery.index') }}" class="btn btn-sm btn-outline-success">
                    View All
                </a>
            </div>
            <div class="card-body">
                @if($recent_images->count() > 0)
                    @foreach($recent_images as $image)
                        <div class="d-flex align-items-center mb-3 pb-3 {{ !$loop->last ? 'border-bottom' : '' }}">
                            <img src="{{ $image->image_url }}" alt="{{ $image->title }}" 
                                 class="rounded me-3" style="width: 50px; height: 50px; object-fit: cover;">
                            <div class="flex-grow-1">
                                <h6 class="mb-1">{{ Str::limit($image->title, 40) }}</h6>
                                <small class="text-muted">
                                    {{ $image->created_at->diffForHumans() }}
                                    @if($image->is_featured)
                                        <span class="badge bg-primary ms-1">Featured</span>
                                    @endif
                                </small>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="text-center text-muted py-4">
                        <i class="fas fa-images fa-3x mb-3 opacity-50"></i>
                        <p>No gallery images yet.</p>
                        <a href="{{ route('admin.gallery.create') }}" class="btn btn-success">
                            Upload First Image
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>


@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Handle preview button clicks
        document.querySelectorAll('.preview-btn').forEach(button => {
            button.addEventListener('click', function() {
                const contentId = this.getAttribute('data-content-id');
                if (contentId) {
                    previewContent(parseInt(contentId));
                }
            });
        });

        // Preview content function
        window.previewContent = function(contentId) {
            // Add your preview logic here
            alert('Previewing content with ID: ' + contentId);
            // Example: window.location.href = '/admin/content/' + contentId + '/preview';
        };
    });
</script>
@endsection


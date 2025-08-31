@extends('layouts.admin')

@section('page-title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-12">
        <h1 class="h3 mb-4">
            <i class="fas fa-tachometer-alt me-2"></i>
            Dashboard Overview
        </h1>
    </div>
</div>

<!-- Statistics Cards -->
<div class="row mb-4">
    <div class="col-lg-3 col-md-6 mb-3">
        <div class="card stats-card h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title text-muted mb-1">Total News</h6>
                        <h3 class="mb-0">{{ $stats['total_news'] }}</h3>
                    </div>
                    <div class="text-primary">
                        <i class="fas fa-newspaper fa-2x"></i>
                    </div>
                </div>
                <small class="text-muted">
                    {{ $stats['published_news'] }} published
                </small>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 mb-3">
        <div class="card stats-card h-100" style="border-left-color: #28a745;">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title text-muted mb-1">Gallery Images</h6>
                        <h3 class="mb-0">{{ $stats['total_gallery_images'] }}</h3>
                    </div>
                    <div class="text-success">
                        <i class="fas fa-images fa-2x"></i>
                    </div>
                </div>
                <small class="text-muted">In gallery collection</small>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 mb-3">
        <div class="card stats-card h-100" style="border-left-color: #ffc107;">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title text-muted mb-1">Site Images</h6>
                        <h3 class="mb-0">{{ $stats['total_site_images'] }}</h3>
                    </div>
                    <div class="text-warning">
                        <i class="fas fa-image fa-2x"></i>
                    </div>
                </div>
                <small class="text-muted">Placeholders replaced</small>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 mb-3">
        <div class="card stats-card h-100" style="border-left-color: #dc3545;">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title text-muted mb-1">Users</h6>
                        <h3 class="mb-0">{{ $stats['total_users'] }}</h3>
                    </div>
                    <div class="text-danger">
                        <i class="fas fa-users fa-2x"></i>
                    </div>
                </div>
                <small class="text-muted">
                    {{ $stats['admin_users'] }} admins
                </small>
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
                    <div class="col-md-4 mb-3">
                        <a href="{{ route('admin.news.create') }}" class="btn btn-primary w-100">
                            <i class="fas fa-plus me-2"></i>
                            Add News Item
                        </a>
                    </div>
                    <div class="col-md-4 mb-3">
                        <a href="{{ route('admin.gallery.create') }}" class="btn btn-success w-100">
                            <i class="fas fa-image me-2"></i>
                            Upload Gallery Image
                        </a>
                    </div>
                    <div class="col-md-4 mb-3">
                        <a href="{{ route('admin.site-images.create') }}" class="btn btn-warning w-100">
                            <i class="fas fa-edit me-2"></i>
                            Update Site Image
                        </a>
                    </div>
                </div>
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

<!-- System Information -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-info-circle me-2"></i>
                    System Information
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <strong>Laravel Version:</strong><br>
                        <span class="text-muted">{{ app()->version() }}</span>
                    </div>
                    <div class="col-md-3">
                        <strong>PHP Version:</strong><br>
                        <span class="text-muted">{{ PHP_VERSION }}</span>
                    </div>
                    <div class="col-md-3">
                        <strong>Environment:</strong><br>
                        <span class="badge bg-{{ app()->environment('production') ? 'danger' : 'success' }}">
                            {{ strtoupper(app()->environment()) }}
                        </span>
                    </div>
                    <div class="col-md-3">
                        <strong>Storage:</strong><br>
                        <span class="text-muted">
                            {{ config('filesystems.default') }} disk
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
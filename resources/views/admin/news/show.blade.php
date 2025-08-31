@extends('layouts.admin')

@section('page-title', 'View News Item')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0">
                <i class="fas fa-eye me-2"></i>
                View News Item
            </h1>
            <div class="btn-group">
                <a href="{{ route('admin.news.edit', $news) }}" class="btn btn-primary">
                    <i class="fas fa-edit me-2"></i>
                    Edit
                </a>
                <a href="{{ route('admin.news.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>
                    Back to News
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">{{ $news->title }}</h5>
                <div>
                    @if($news->is_published)
                        <span class="badge bg-success">Published</span>
                    @else
                        <span class="badge bg-warning">Draft</span>
                    @endif
                    <span class="badge bg-secondary">{{ ucfirst($news->category) }}</span>
                </div>
            </div>
            
            @if($news->image)
                <img src="{{ $news->image_url }}" alt="{{ $news->title }}" 
                     class="card-img-top" style="height: 400px; object-fit: cover;">
            @endif
            
            <div class="card-body">
                @if($news->excerpt)
                    <div class="alert alert-light border-start border-primary border-4 mb-4">
                        <h6 class="mb-2">Excerpt:</h6>
                        <p class="mb-0 text-muted">{{ $news->excerpt }}</p>
                    </div>
                @endif

                <div class="content">
                    {!! nl2br(e($news->content)) !!}
                </div>
            </div>
            
            <div class="card-footer">
                <div class="row text-muted small">
                    <div class="col-md-6">
                        <i class="fas fa-calendar me-1"></i>
                        Created: {{ $news->created_at->format('M d, Y \a\t g:i A') }}
                    </div>
                    <div class="col-md-6 text-md-end">
                        <i class="fas fa-edit me-1"></i>
                        Updated: {{ $news->updated_at->format('M d, Y \a\t g:i A') }}
                    </div>
                </div>
                @if($news->published_at)
                    <div class="row text-muted small mt-1">
                        <div class="col-12">
                            <i class="fas fa-globe me-1"></i>
                            Published: {{ $news->published_at->format('M d, Y \a\t g:i A') }}
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="card mt-4">
            <div class="card-header">
                <h5 class="mb-0">Actions</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6>Edit & Manage</h6>
                        <div class="d-grid gap-2">
                            <a href="{{ route('admin.news.edit', $news) }}" class="btn btn-primary">
                                <i class="fas fa-edit me-2"></i>
                                Edit News Item
                            </a>
                            
                            @if($news->is_published)
                                <form action="{{ route('admin.news.update', $news) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="title" value="{{ $news->title }}">
                                    <input type="hidden" name="content" value="{{ $news->content }}">
                                    <input type="hidden" name="excerpt" value="{{ $news->excerpt }}">
                                    <input type="hidden" name="category" value="{{ $news->category }}">
                                    <input type="hidden" name="is_published" value="0">
                                    <button type="submit" class="btn btn-warning w-100"
                                            onclick="return confirm('Are you sure you want to unpublish this news item?')">
                                        <i class="fas fa-eye-slash me-2"></i>
                                        Unpublish
                                    </button>
                                </form>
                            @else
                                <form action="{{ route('admin.news.update', $news) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="title" value="{{ $news->title }}">
                                    <input type="hidden" name="content" value="{{ $news->content }}">
                                    <input type="hidden" name="excerpt" value="{{ $news->excerpt }}">
                                    <input type="hidden" name="category" value="{{ $news->category }}">
                                    <input type="hidden" name="is_published" value="1">
                                    <button type="submit" class="btn btn-success w-100"
                                            onclick="return confirm('Are you sure you want to publish this news item?')">
                                        <i class="fas fa-globe me-2"></i>
                                        Publish Now
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <h6>Danger Zone</h6>
                        <div class="d-grid gap-2">
                            <button type="button" class="btn btn-outline-danger" onclick="confirmDelete()">
                                <i class="fas fa-trash me-2"></i>
                                Delete News Item
                            </button>
                        </div>
                        
                        <form id="delete-form" action="{{ route('admin.news.destroy', $news) }}" 
                              method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="col-lg-4">
        <!-- News Details -->
        <div class="card sticky-top" style="top: 20px;">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-info-circle me-2"></i>
                    News Details
                </h5>
            </div>
            <div class="card-body">
                <dl class="row mb-0">
                    <dt class="col-sm-5">Status:</dt>
                    <dd class="col-sm-7">
                        @if($news->is_published)
                            <span class="badge bg-success">Published</span>
                        @else
                            <span class="badge bg-warning">Draft</span>
                        @endif
                    </dd>
                    
                    <dt class="col-sm-5">Category:</dt>
                    <dd class="col-sm-7">
                        <span class="badge bg-secondary">{{ ucfirst($news->category) }}</span>
                    </dd>
                    
                    <dt class="col-sm-5">Created:</dt>
                    <dd class="col-sm-7">{{ $news->created_at->format('M d, Y') }}</dd>
                    
                    <dt class="col-sm-5">Updated:</dt>
                    <dd class="col-sm-7">{{ $news->updated_at->format('M d, Y') }}</dd>
                    
                    @if($news->published_at)
                        <dt class="col-sm-5">Published:</dt>
                        <dd class="col-sm-7">{{ $news->published_at->format('M d, Y') }}</dd>
                    @endif
                    
                    <dt class="col-sm-5">Has Image:</dt>
                    <dd class="col-sm-7">
                        @if($news->image)
                            <i class="fas fa-check text-success"></i> Yes
                        @else
                            <i class="fas fa-times text-danger"></i> No
                        @endif
                    </dd>
                    
                    <dt class="col-sm-5">Has Excerpt:</dt>
                    <dd class="col-sm-7">
                        @if($news->excerpt)
                            <i class="fas fa-check text-success"></i> Yes
                        @else
                            <i class="fas fa-times text-danger"></i> No
                        @endif
                    </dd>
                </dl>
            </div>
        </div>

        <!-- Related Actions -->
        <div class="card mt-3">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-link me-2"></i>
                    Related Actions
                </h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.news.create') }}" class="btn btn-outline-primary">
                        <i class="fas fa-plus me-2"></i>
                        Create New News
                    </a>
                    
                    <a href="{{ route('admin.news.index', ['category' => $news->category]) }}" 
                       class="btn btn-outline-secondary">
                        <i class="fas fa-filter me-2"></i>
                        View {{ ucfirst($news->category) }} News
                    </a>
                    
                    @if($news->is_published)
                        <a href="{{ route('home') }}#news" target="_blank" class="btn btn-outline-info">
                            <i class="fas fa-external-link-alt me-2"></i>
                            View on Site
                        </a>
                    @endif
                </div>
            </div>
        </div>

        <!-- Content Statistics -->
        <div class="card mt-3">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-chart-bar me-2"></i>
                    Content Stats
                </h5>
            </div>
            <div class="card-body">
                <dl class="row small mb-0">
                    <dt class="col-sm-7">Title Length:</dt>
                    <dd class="col-sm-5">{{ strlen($news->title) }} chars</dd>
                    
                    @if($news->excerpt)
                        <dt class="col-sm-7">Excerpt Length:</dt>
                        <dd class="col-sm-5">{{ strlen($news->excerpt) }} chars</dd>
                    @endif
                    
                    <dt class="col-sm-7">Content Length:</dt>
                    <dd class="col-sm-5">{{ strlen($news->content) }} chars</dd>
                    
                    <dt class="col-sm-7">Word Count:</dt>
                    <dd class="col-sm-5">{{ str_word_count(strip_tags($news->content)) }} words</dd>
                </dl>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function confirmDelete() {
        if (confirm('Are you sure you want to delete this news item? This action cannot be undone.')) {
            document.getElementById('delete-form').submit();
        }
    }
</script>
@endpush
@extends('layouts.admin')

@section('page-title', 'Gallery Management')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0">
                <i class="fas fa-images me-2"></i>
                Gallery Management
            </h1>
            <a href="{{ route('admin.gallery.create') }}" class="btn btn-success">
                <i class="fas fa-plus me-2"></i>
                Upload Image
            </a>
        </div>
    </div>
</div>

<!-- Filters -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form method="GET" action="{{ route('admin.gallery.index') }}" class="row g-3">
                    <div class="col-md-3">
                        <label for="category" class="form-label">Category</label>
                        <select name="category" id="category" class="form-select">
                            <option value="">All Categories</option>
                            <option value="academic" {{ request('category') == 'academic' ? 'selected' : '' }}>Academic</option>
                            <option value="sports" {{ request('category') == 'sports' ? 'selected' : '' }}>Sports</option>
                            <option value="events" {{ request('category') == 'events' ? 'selected' : '' }}>Events</option>
                            <option value="facilities" {{ request('category') == 'facilities' ? 'selected' : '' }}>Facilities</option>
                            <option value="general" {{ request('category') == 'general' ? 'selected' : '' }}>General</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="featured" class="form-label">Featured</label>
                        <select name="featured" id="featured" class="form-select">
                            <option value="">All Images</option>
                            <option value="1" {{ request('featured') == '1' ? 'selected' : '' }}>Featured Only</option>
                            <option value="0" {{ request('featured') == '0' ? 'selected' : '' }}>Non-Featured</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="search" class="form-label">Search</label>
                        <input type="text" name="search" id="search" class="form-control" 
                               placeholder="Search by title or description..." value="{{ request('search') }}">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">&nbsp;</label>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-outline-primary">
                                <i class="fas fa-search me-2"></i>Filter
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Gallery Grid -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Gallery Images ({{ $images->total() }} total)</h5>
                <div class="btn-group" role="group">
                    <input type="radio" class="btn-check" name="view" id="grid-view" checked>
                    <label class="btn btn-outline-secondary" for="grid-view">
                        <i class="fas fa-th"></i>
                    </label>
                    
                    <input type="radio" class="btn-check" name="view" id="list-view">
                    <label class="btn btn-outline-secondary" for="list-view">
                        <i class="fas fa-list"></i>
                    </label>
                </div>
            </div>
            <div class="card-body">
                @if($images->count() > 0)
                    <!-- Grid View -->
                    <div id="gridView" class="row">
                        @foreach($images as $image)
                            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                <div class="card h-100">
                                    <div class="position-relative">
                                        <img src="{{ $image->image_url }}" alt="{{ $image->title }}" 
                                             class="card-img-top" style="height: 200px; object-fit: cover;">
                                        
                                        @if($image->is_featured)
                                            <span class="position-absolute top-0 start-0 badge bg-primary m-2">
                                                <i class="fas fa-star me-1"></i>Featured
                                            </span>
                                        @endif
                                        
                                        <div class="position-absolute top-0 end-0 m-2">
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-dark btn-outline-light" type="button" 
                                                        data-bs-toggle="dropdown">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item" href="{{ route('admin.gallery.show', $image) }}">
                                                            <i class="fas fa-eye me-2"></i>View
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="{{ route('admin.gallery.edit', $image) }}">
                                                            <i class="fas fa-edit me-2"></i>Edit
                                                        </a>
                                                    </li>
                                                    <li><hr class="dropdown-divider"></li>
                                                    <li>
                                                        <button class="dropdown-item text-danger" 
                                                                onclick="confirmDelete({{ $image->id }})">
                                                            <i class="fas fa-trash me-2"></i>Delete
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="card-body">
                                        <h6 class="card-title">{{ Str::limit($image->title, 30) }}</h6>
                                        @if($image->description)
                                            <p class="card-text small text-muted">
                                                {{ Str::limit($image->description, 60) }}
                                            </p>
                                        @endif
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="badge bg-secondary">{{ ucfirst($image->category) }}</span>
                                            <small class="text-muted">{{ $image->created_at->format('M d') }}</small>
                                        </div>
                                    </div>
                                    
                                    <!-- Hidden delete form -->
                                    <form id="delete-form-{{ $image->id }}" 
                                          action="{{ route('admin.gallery.destroy', $image) }}" 
                                          method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- List View (Hidden by default) -->
                    <div id="listView" class="d-none">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Featured</th>
                                        <th>Upload Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($images as $image)
                                        <tr>
                                            <td>
                                                <img src="{{ $image->image_url }}" alt="{{ $image->title }}" 
                                                     class="rounded" style="width: 60px; height: 60px; object-fit: cover;">
                                            </td>
                                            <td>
                                                <div>
                                                    <h6 class="mb-1">{{ Str::limit($image->title, 40) }}</h6>
                                                    @if($image->description)
                                                        <small class="text-muted">{{ Str::limit($image->description, 60) }}</small>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge bg-secondary">{{ ucfirst($image->category) }}</span>
                                            </td>
                                            <td>
                                                @if($image->is_featured)
                                                    <span class="badge bg-primary">
                                                        <i class="fas fa-star me-1"></i>Featured
                                                    </span>
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </td>
                                            <td>{{ $image->created_at->format('M d, Y') }}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('admin.gallery.show', $image) }}" 
                                                       class="btn btn-sm btn-outline-info" title="View">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('admin.gallery.edit', $image) }}" 
                                                       class="btn btn-sm btn-outline-primary" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <button type="button" class="btn btn-sm btn-outline-danger" 
                                                            title="Delete" onclick="confirmDelete({{ $image->id }})">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <!-- Pagination -->
                    <div class="d-flex justify-content-center mt-4">
                        {{ $images->withQueryString()->links() }}
                    </div>
                @else
                    <div class="text-center py-5">
                        <i class="fas fa-images fa-3x text-muted mb-3"></i>
                        <h5 class="text-muted">No gallery images found</h5>
                        <p class="text-muted">Start by uploading your first gallery image.</p>
                        <a href="{{ route('admin.gallery.create') }}" class="btn btn-success">
                            <i class="fas fa-plus me-2"></i>
                            Upload Image
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function confirmDelete(id) {
        if (confirm('Are you sure you want to delete this gallery image? This action cannot be undone.')) {
            document.getElementById('delete-form-' + id).submit();
        }
    }

    // View toggle functionality
    document.addEventListener('DOMContentLoaded', function() {
        const gridViewRadio = document.getElementById('grid-view');
        const listViewRadio = document.getElementById('list-view');
        const gridView = document.getElementById('gridView');
        const listView = document.getElementById('listView');

        gridViewRadio.addEventListener('change', function() {
            if (this.checked) {
                gridView.classList.remove('d-none');
                listView.classList.add('d-none');
            }
        });

        listViewRadio.addEventListener('change', function() {
            if (this.checked) {
                listView.classList.remove('d-none');
                gridView.classList.add('d-none');
            }
        });
    });
</script>
@endpush
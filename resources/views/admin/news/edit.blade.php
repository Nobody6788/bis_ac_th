@extends('layouts.admin')

@section('page-title', 'Edit News Item')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0">
                <i class="fas fa-edit me-2"></i>
                Edit News Item
            </h1>
            <div class="btn-group">
                <a href="{{ route('admin.news.show', $news) }}" class="btn btn-outline-info">
                    <i class="fas fa-eye me-2"></i>
                    View
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
        <form action="{{ route('admin.news.update', $news) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">News Details</h5>
                </div>
                <div class="card-body">
                    <!-- Title -->
                    <div class="mb-3">
                        <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" id="title" 
                               class="form-control @error('title') is-invalid @enderror" 
                               value="{{ old('title', $news->title) }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Excerpt -->
                    <div class="mb-3">
                        <label for="excerpt" class="form-label">Excerpt</label>
                        <textarea name="excerpt" id="excerpt" rows="3" 
                                  class="form-control @error('excerpt') is-invalid @enderror" 
                                  placeholder="Brief summary of the news...">{{ old('excerpt', $news->excerpt) }}</textarea>
                        @error('excerpt')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Optional: A brief summary that will be displayed in news listings.</div>
                    </div>

                    <!-- Content -->
                    <div class="mb-3">
                        <label for="content" class="form-label">Content <span class="text-danger">*</span></label>
                        <textarea name="content" id="content" rows="10" 
                                  class="form-control @error('content') is-invalid @enderror" 
                                  required>{{ old('content', $news->content) }}</textarea>
                        @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Category -->
                    <div class="mb-3">
                        <label for="category" class="form-label">Category <span class="text-danger">*</span></label>
                        <select name="category" id="category" 
                                class="form-select @error('category') is-invalid @enderror" required>
                            <option value="">Select Category</option>
                            <option value="academic" {{ old('category', $news->category) == 'academic' ? 'selected' : '' }}>Academic</option>
                            <option value="sports" {{ old('category', $news->category) == 'sports' ? 'selected' : '' }}>Sports</option>
                            <option value="events" {{ old('category', $news->category) == 'events' ? 'selected' : '' }}>Events</option>
                            <option value="general" {{ old('category', $news->category) == 'general' ? 'selected' : '' }}>General</option>
                        </select>
                        @error('category')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Publishing Options -->
                    <div class="mb-3">
                        <div class="form-check">
                            <input type="checkbox" name="is_published" id="is_published" 
                                   class="form-check-input" value="1" 
                                   {{ old('is_published', $news->is_published) ? 'checked' : '' }}>
                            <label for="is_published" class="form-check-label">
                                Published
                            </label>
                        </div>
                        <div class="form-text">
                            @if($news->is_published && $news->published_at)
                                Currently published on {{ $news->published_at->format('M d, Y \a\t g:i A') }}
                            @else
                                If checked, the news item will be published immediately.
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Image Upload Section -->
            <div class="card mt-4">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-image me-2"></i>
                        Featured Image
                    </h5>
                </div>
                <div class="card-body">
                    <!-- Current Image -->
                    @if($news->image)
                        <div class="mb-3">
                            <label class="form-label">Current Image:</label>
                            <div class="position-relative d-inline-block">
                                <img src="{{ $news->image_url }}" alt="{{ $news->title }}" class="image-preview">
                                <div class="position-absolute top-0 end-0 m-2">
                                    <button type="button" class="btn btn-sm btn-danger" 
                                            onclick="confirmRemoveCurrentImage()" title="Remove Current Image">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="mt-2">
                                <small class="text-muted">
                                    Current image will be replaced if you upload a new one.
                                </small>
                            </div>
                        </div>
                    @endif

                    <!-- Drop Zone -->
                    <div id="imageDropZone" class="drop-zone mb-3" style="cursor: pointer;">
                        <div class="text-center">
                            <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                            <h6>
                                @if($news->image)
                                    Drop new image here or click to browse
                                @else
                                    Drop image here or click to browse
                                @endif
                            </h6>
                            <p class="text-muted mb-0">Maximum file size: 1GB</p>
                            <p class="text-muted">Supported formats: JPEG, PNG, JPG, GIF</p>
                        </div>
                    </div>

                    <!-- Hidden File Input -->
                    <input type="file" name="image" id="imageInput" 
                           class="form-control @error('image') is-invalid @enderror" 
                           accept="image/*" style="display: none;"
                           onchange="previewImage(this, 'imagePreview')">
                    
                    @error('image')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror

                    <!-- New Image Preview -->
                    <div id="imagePreviewContainer" class="mt-3" style="display: none;">
                        <label class="form-label">New Image Preview:</label>
                        <div class="position-relative d-inline-block">
                            <img id="imagePreview" src="" alt="Preview" class="image-preview">
                            <button type="button" class="btn btn-sm btn-danger position-absolute top-0 end-0 m-1" 
                                    onclick="removeNewImage()" title="Remove New Image">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>

                    <!-- File Input Alternative -->
                    <div class="mt-3">
                        <button type="button" class="btn btn-outline-primary" onclick="document.getElementById('imageInput').click()">
                            <i class="fas fa-upload me-2"></i>
                            {{ $news->image ? 'Change Image' : 'Choose Image File' }}
                        </button>
                    </div>

                    <!-- Remove Current Image Option -->
                    @if($news->image)
                        <div class="mt-3">
                            <div class="form-check">
                                <input type="checkbox" name="remove_image" id="remove_image" 
                                       class="form-check-input" value="1">
                                <label for="remove_image" class="form-check-label text-danger">
                                    Remove current image
                                </label>
                            </div>
                            <div class="form-text">Check this to remove the current image without replacing it.</div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Form Actions -->
            <div class="row mt-4">
                <div class="col-12">
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>
                            Update News Item
                        </button>
                        <a href="{{ route('admin.news.show', $news) }}" class="btn btn-outline-info">
                            <i class="fas fa-eye me-2"></i>
                            View
                        </a>
                        <a href="{{ route('admin.news.index') }}" class="btn btn-outline-secondary">
                            Cancel
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Info Panel -->
    <div class="col-lg-4">
        <div class="card sticky-top" style="top: 20px;">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-info-circle me-2"></i>
                    News Information
                </h5>
            </div>
            <div class="card-body">
                <dl class="row mb-0">
                    <dt class="col-sm-5">Created:</dt>
                    <dd class="col-sm-7">{{ $news->created_at->format('M d, Y g:i A') }}</dd>
                    
                    <dt class="col-sm-5">Updated:</dt>
                    <dd class="col-sm-7">{{ $news->updated_at->format('M d, Y g:i A') }}</dd>
                    
                    <dt class="col-sm-5">Status:</dt>
                    <dd class="col-sm-7">
                        @if($news->is_published)
                            <span class="badge bg-success">Published</span>
                        @else
                            <span class="badge bg-warning">Draft</span>
                        @endif
                    </dd>
                    
                    @if($news->published_at)
                        <dt class="col-sm-5">Published:</dt>
                        <dd class="col-sm-7">{{ $news->published_at->format('M d, Y g:i A') }}</dd>
                    @endif
                </dl>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-lightbulb me-2"></i>
                    Update Tips
                </h5>
            </div>
            <div class="card-body">
                <div class="alert alert-info">
                    <ul class="mb-0 small">
                        <li>Maximum file size: 1GB</li>
                        <li>Changes are saved immediately when you click update</li>
                        <li>Publishing status can be toggled anytime</li>
                        <li>New images replace the current one</li>
                        <li>Use the preview option to review changes</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Remove Current Image Modal -->
<div class="modal fade" id="removeImageModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Remove Current Image</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to remove the current image? This action cannot be undone.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" onclick="removeCurrentImage()">Remove Image</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Enhanced image preview functionality
    function previewImage(input, previewId) {
        const preview = document.getElementById(previewId);
        const container = document.getElementById('imagePreviewContainer');
        
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                container.style.display = 'block';
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function removeNewImage() {
        const input = document.getElementById('imageInput');
        const preview = document.getElementById('imagePreview');
        const container = document.getElementById('imagePreviewContainer');
        
        input.value = '';
        preview.src = '';
        container.style.display = 'none';
    }

    function confirmRemoveCurrentImage() {
        const modal = new bootstrap.Modal(document.getElementById('removeImageModal'));
        modal.show();
    }

    function removeCurrentImage() {
        document.getElementById('remove_image').checked = true;
        const modal = bootstrap.Modal.getInstance(document.getElementById('removeImageModal'));
        modal.hide();
    }

    // Setup drag and drop for image upload
    document.addEventListener('DOMContentLoaded', function() {
        setupDropZone('imageDropZone', 'imageInput');
        
        // Handle file input change
        document.getElementById('imageInput').addEventListener('change', function(e) {
            if (e.target.files.length > 0) {
                previewImage(e.target, 'imagePreview');
            }
        });
    });
</script>
@endpush
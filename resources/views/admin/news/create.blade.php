@extends('layouts.admin')

@section('page-title', 'Create News Item')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0">
                <i class="fas fa-plus me-2"></i>
                Create News Item
            </h1>
            <a href="{{ route('admin.news.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i>
                Back to News
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
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
                               value="{{ old('title') }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Excerpt -->
                    <div class="mb-3">
                        <label for="excerpt" class="form-label">Excerpt</label>
                        <textarea name="excerpt" id="excerpt" rows="3" 
                                  class="form-control @error('excerpt') is-invalid @enderror" 
                                  placeholder="Brief summary of the news...">{{ old('excerpt') }}</textarea>
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
                                  required>{{ old('content') }}</textarea>
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
                            <option value="academic" {{ old('category') == 'academic' ? 'selected' : '' }}>Academic</option>
                            <option value="sports" {{ old('category') == 'sports' ? 'selected' : '' }}>Sports</option>
                            <option value="events" {{ old('category') == 'events' ? 'selected' : '' }}>Events</option>
                            <option value="general" {{ old('category') == 'general' ? 'selected' : '' }}>General</option>
                        </select>
                        @error('category')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Publishing Options -->
                    <div class="mb-3">
                        <div class="form-check">
                            <input type="checkbox" name="is_published" id="is_published" 
                                   class="form-check-input" value="1" {{ old('is_published') ? 'checked' : '' }}>
                            <label for="is_published" class="form-check-label">
                                Publish immediately
                            </label>
                        </div>
                        <div class="form-text">If unchecked, the news item will be saved as a draft.</div>
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
                    <!-- Drop Zone -->
                    <div id="imageDropZone" class="drop-zone mb-3" style="cursor: pointer;">
                        <div class="text-center">
                            <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                            <h6>Drop image here or click to browse</h6>
                            <p class="text-muted mb-0">Maximum file size: 2MB</p>
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

                    <!-- Image Preview -->
                    <div id="imagePreviewContainer" class="mt-3" style="display: none;">
                        <label class="form-label">Preview:</label>
                        <div class="position-relative d-inline-block">
                            <img id="imagePreview" src="" alt="Preview" class="image-preview">
                            <button type="button" class="btn btn-sm btn-danger position-absolute top-0 end-0 m-1" 
                                    onclick="removeImage()" title="Remove Image">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>

                    <!-- File Input Alternative -->
                    <div class="mt-3">
                        <button type="button" class="btn btn-outline-primary" onclick="document.getElementById('imageInput').click()">
                            <i class="fas fa-upload me-2"></i>
                            Choose Image File
                        </button>
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="row mt-4">
                <div class="col-12">
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>
                            Create News Item
                        </button>
                        <button type="submit" name="save_and_continue" value="1" class="btn btn-success">
                            <i class="fas fa-save me-2"></i>
                            Save & Create Another
                        </button>
                        <a href="{{ route('admin.news.index') }}" class="btn btn-outline-secondary">
                            Cancel
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Preview Panel -->
    <div class="col-lg-4">
        <div class="card sticky-top" style="top: 20px;">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-eye me-2"></i>
                    Preview Tips
                </h5>
            </div>
            <div class="card-body">
                <div class="alert alert-info">
                    <h6><i class="fas fa-lightbulb me-2"></i>Tips for better news items:</h6>
                    <ul class="mb-0 small">
                        <li>Use clear, descriptive titles</li>
                        <li>Add an excerpt to summarize the content</li>
                        <li>Choose high-quality images (1200x800px recommended)</li>
                        <li>Select appropriate categories</li>
                        <li>Use the draft option to review before publishing</li>
                    </ul>
                </div>

                <div class="alert alert-warning">
                    <h6><i class="fas fa-exclamation-triangle me-2"></i>Image Guidelines:</h6>
                    <ul class="mb-0 small">
                        <li>Maximum file size: 2MB</li>
                        <li>Recommended dimensions: 1200x800px</li>
                        <li>Formats: JPEG, PNG, JPG, GIF</li>
                        <li>Use landscape orientation for best results</li>
                    </ul>
                </div>
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

    function removeImage() {
        const input = document.getElementById('imageInput');
        const preview = document.getElementById('imagePreview');
        const container = document.getElementById('imagePreviewContainer');
        
        input.value = '';
        preview.src = '';
        container.style.display = 'none';
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

    // Auto-generate excerpt from content if empty
    document.getElementById('content').addEventListener('blur', function() {
        const excerptField = document.getElementById('excerpt');
        if (!excerptField.value.trim() && this.value.trim()) {
            const plainText = this.value.replace(/<[^>]*>/g, ''); // Remove HTML tags
            excerptField.value = plainText.substring(0, 150).trim() + (plainText.length > 150 ? '...' : '');
        }
    });
</script>
@endpush
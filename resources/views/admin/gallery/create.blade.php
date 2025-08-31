@extends('layouts.admin')

@section('page-title', 'Upload Gallery Image')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0">
                <i class="fas fa-upload me-2"></i>
                Upload Gallery Image
            </h1>
            <a href="{{ route('admin.gallery.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i>
                Back to Gallery
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <!-- Image Upload Section -->
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-image me-2"></i>
                        Image Upload <span class="text-danger">*</span>
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
                           accept="image/*" style="display: none;" required
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

            <!-- Image Details -->
            <div class="card mt-4">
                <div class="card-header">
                    <h5 class="mb-0">Image Details</h5>
                </div>
                <div class="card-body">
                    <!-- Title -->
                    <div class="mb-3">
                        <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" id="title" 
                               class="form-control @error('title') is-invalid @enderror" 
                               value="{{ old('title') }}" required 
                               placeholder="Enter a descriptive title for the image">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" rows="4" 
                                  class="form-control @error('description') is-invalid @enderror" 
                                  placeholder="Optional description or caption for the image">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Optional: A detailed description that will be displayed with the image.</div>
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
                            <option value="facilities" {{ old('category') == 'facilities' ? 'selected' : '' }}>Facilities</option>
                            <option value="general" {{ old('category') == 'general' ? 'selected' : '' }}>General</option>
                        </select>
                        @error('category')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Featured Option -->
                    <div class="mb-3">
                        <div class="form-check">
                            <input type="checkbox" name="is_featured" id="is_featured" 
                                   class="form-check-input" value="1" {{ old('is_featured') ? 'checked' : '' }}>
                            <label for="is_featured" class="form-check-label">
                                Mark as Featured
                            </label>
                        </div>
                        <div class="form-text">Featured images are displayed more prominently in galleries.</div>
                    </div>

                    <!-- Sort Order -->
                    <div class="mb-3">
                        <label for="sort_order" class="form-label">Display Order</label>
                        <input type="number" name="sort_order" id="sort_order" 
                               class="form-control @error('sort_order') is-invalid @enderror" 
                               value="{{ old('sort_order', 0) }}" min="0" max="9999">
                        @error('sort_order')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Lower numbers appear first. Default is 0.</div>
                    </div>
                </div>
            </div>

            <!-- Bulk Upload Options -->
            <div class="card mt-4">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-layer-group me-2"></i>
                        Bulk Options
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-check">
                                <input type="checkbox" name="save_and_continue" id="save_and_continue" 
                                       class="form-check-input" value="1">
                                <label for="save_and_continue" class="form-check-label">
                                    Upload another image after saving
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input type="checkbox" name="apply_to_next" id="apply_to_next" 
                                       class="form-check-input" value="1">
                                <label for="apply_to_next" class="form-check-label">
                                    Use same settings for next image
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="row mt-4">
                <div class="col-12">
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-upload me-2"></i>
                            Upload Image
                        </button>
                        <a href="{{ route('admin.gallery.index') }}" class="btn btn-outline-secondary">
                            Cancel
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Guidelines Panel -->
    <div class="col-lg-4">
        <div class="card sticky-top" style="top: 20px;">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-info-circle me-2"></i>
                    Upload Guidelines
                </h5>
            </div>
            <div class="card-body">
                <div class="alert alert-info">
                    <h6><i class="fas fa-lightbulb me-2"></i>Image Best Practices:</h6>
                    <ul class="mb-0 small">
                        <li>Use high-quality, well-lit images</li>
                        <li>Landscape orientation works best for galleries</li>
                        <li>Keep file sizes reasonable (under 2MB)</li>
                        <li>Use descriptive titles and categories</li>
                        <li>Featured images appear first in galleries</li>
                    </ul>
                </div>

                <div class="alert alert-success">
                    <h6><i class="fas fa-check-circle me-2"></i>Technical Requirements:</h6>
                    <ul class="mb-0 small">
                        <li>Maximum file size: 2MB</li>
                        <li>Recommended dimensions: 1200x800px</li>
                        <li>Formats: JPEG, PNG, JPG, GIF</li>
                        <li>Images are automatically optimized</li>
                    </ul>
                </div>

                <div class="alert alert-warning">
                    <h6><i class="fas fa-tags me-2"></i>Category Guidelines:</h6>
                    <ul class="mb-0 small">
                        <li><strong>Academic:</strong> Classroom activities, graduation</li>
                        <li><strong>Sports:</strong> Athletic events, sports facilities</li>
                        <li><strong>Events:</strong> School events, ceremonies</li>
                        <li><strong>Facilities:</strong> School buildings, infrastructure</li>
                        <li><strong>General:</strong> Miscellaneous school photos</li>
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
            const file = input.files[0];
            
            // Validate file size
            if (file.size > 2 * 1024 * 1024) { // 2MB in bytes
                alert('File size must be less than 2MB');
                input.value = '';
                return;
            }
            
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                container.style.display = 'block';
                
                // Auto-generate title if empty
                const titleField = document.getElementById('title');
                if (!titleField.value.trim()) {
                    const fileName = file.name.replace(/\.[^/.]+$/, ""); // Remove extension
                    const cleanTitle = fileName.replace(/[-_]/g, ' ').replace(/\b\w/g, l => l.toUpperCase());
                    titleField.value = cleanTitle;
                }
            };
            reader.readAsDataURL(file);
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

        // Form validation
        document.querySelector('form').addEventListener('submit', function(e) {
            const imageInput = document.getElementById('imageInput');
            if (!imageInput.files || imageInput.files.length === 0) {
                e.preventDefault();
                alert('Please select an image to upload.');
                return false;
            }
        });
    });
</script>
@endpush
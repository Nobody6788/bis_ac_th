@extends('layouts.admin')

@section('page-title', 'Edit Site Image')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card shadow-lg border-0">
            <div class="card-header bg-gradient-primary text-white">
                <h5 class="mb-0">
                    <i class="fas fa-edit me-2"></i>
                    Edit Site Image: {{ $siteImage->name }}
                </h5>
                <p class="mb-0 small opacity-75">Update image details and replace image if needed</p>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('admin.site-images.update', $siteImage) }}" method="POST" enctype="multipart/form-data" id="imageEditForm">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <!-- Left Column - Current Image -->
                        <div class="col-lg-6">
                            <!-- Current Image Preview -->
                            <div class="mb-4">
                                <label class="form-label fw-bold">
                                    <i class="fas fa-image me-2 text-primary"></i>
                                    Current Image
                                </label>
                                <div class="border rounded-3 p-3 text-center bg-light position-relative">
                                    <img src="{{ $siteImage->image_url }}" alt="{{ $siteImage->alt_text }}" 
                                         class="img-fluid rounded shadow-sm" style="max-height: 300px; object-fit: contain;">
                                    <div class="position-absolute top-0 end-0 m-2">
                                        <span class="badge bg-{{ $siteImage->is_active ? 'success' : 'secondary' }}">
                                            {{ $siteImage->is_active ? 'Active' : 'Inactive' }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Replace Image Section -->
                            <div class="mb-4">
                                <label for="image" class="form-label fw-bold">
                                    <i class="fas fa-sync-alt me-2 text-warning"></i>
                                    Replace Image (Optional)
                                </label>
                                
                                <!-- Drag & Drop Zone for replacement -->
                                <div id="imageDropZone" class="drop-zone border-2 border-dashed border-warning rounded-3 p-3 text-center bg-light position-relative">
                                    <div id="dropZoneContent">
                                        <i class="fas fa-cloud-upload-alt fa-2x text-warning mb-2"></i>
                                        <h6 class="text-warning mb-1">Drop new image here to replace</h6>
                                        <p class="text-muted small mb-2">or <span class="text-warning fw-bold">click to browse</span></p>
                                        <div class="small text-muted">
                                            JPEG, PNG, JPG, GIF | Max: 1GB
                                        </div>
                                    </div>
                                    
                                    <input type="file" class="form-control d-none @error('image') is-invalid @enderror" 
                                           id="imageInput" name="image" accept="image/*">
                                    
                                    @error('image')
                                        <div class="invalid-feedback d-block mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <!-- New Image Preview -->
                            <div class="mb-4" id="newImagePreview" style="display: none;">
                                <label class="form-label fw-bold">
                                    <i class="fas fa-eye me-2 text-success"></i>
                                    New Image Preview
                                </label>
                                <div class="border rounded-3 p-3 text-center bg-white position-relative">
                                    <img id="previewImg" src="" alt="New Preview" 
                                         class="img-fluid rounded" style="max-height: 300px; object-fit: contain;">
                                    <button type="button" class="btn btn-sm btn-outline-danger position-absolute top-0 end-0 m-2" 
                                            onclick="removeNewPreview()" title="Remove new image">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Right Column - Form Fields -->
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="name" class="form-label fw-bold">
                                        <i class="fas fa-tag me-2 text-primary"></i>
                                        Image Name <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" 
                                           id="name" name="name" value="{{ old('name', $siteImage->name) }}" 
                                           placeholder="e.g., Academic Excellence Slide">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-12 mb-3">
                                    <label for="location" class="form-label fw-bold">
                                        <i class="fas fa-map-marker-alt me-2 text-primary"></i>
                                        Section/Location <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select form-select-lg @error('location') is-invalid @enderror" 
                                            id="location" name="location">
                                        <option value="">Select Section</option>
                                        @foreach($locations as $key => $label)
                                            <option value="{{ $key }}" 
                                                    {{ old('location', $siteImage->location) == $key ? 'selected' : '' }}>
                                                {{ $label }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('location')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="description" class="form-label fw-bold">
                                    <i class="fas fa-align-left me-2 text-primary"></i>
                                    Description
                                </label>
                                <textarea class="form-control @error('description') is-invalid @enderror" 
                                          id="description" name="description" rows="3" 
                                          placeholder="Optional description of the image...">{{ old('description', $siteImage->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="alt_text" class="form-label fw-bold">
                                    <i class="fas fa-universal-access me-2 text-primary"></i>
                                    Alt Text (Accessibility)
                                </label>
                                <input type="text" class="form-control @error('alt_text') is-invalid @enderror" 
                                       id="alt_text" name="alt_text" value="{{ old('alt_text', $siteImage->alt_text) }}" 
                                       placeholder="Descriptive text for screen readers">
                                @error('alt_text')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">
                                    <i class="fas fa-info-circle me-1"></i>
                                    This text will be read by screen readers for accessibility.
                                </div>
                            </div>
                            
                            <div class="mb-4">
                                <div class="form-check form-switch form-check-lg">
                                    <input class="form-check-input" type="checkbox" id="is_active" 
                                           name="is_active" value="1" 
                                           {{ old('is_active', $siteImage->is_active) ? 'checked' : '' }}>
                                    <label class="form-check-label fw-bold" for="is_active">
                                        <i class="fas fa-eye me-2 text-success"></i>
                                        Set as Active Image
                                    </label>
                                </div>
                                <div class="form-text">
                                    <i class="fas fa-info-circle me-1"></i>
                                    Only one image can be active per section. Setting this as active will deactivate other images in the same section.
                                </div>
                            </div>
                            
                            <!-- Current Image Info -->
                            <div class="alert alert-light border">
                                <h6 class="alert-heading mb-2">
                                    <i class="fas fa-info-circle me-2"></i>
                                    Current Image Details
                                </h6>
                                <div class="row small">
                                    <div class="col-6">
                                        <strong>Created:</strong><br>
                                        {{ $siteImage->created_at->format('M d, Y') }}
                                    </div>
                                    <div class="col-6">
                                        <strong>Last Updated:</strong><br>
                                        {{ $siteImage->updated_at->format('M d, Y') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Recommended Sizes Info -->
                    <div class="alert alert-info border-0 bg-light">
                        <h6 class="alert-heading">
                            <i class="fas fa-lightbulb me-2"></i>
                            Recommended Image Sizes (for new uploads)
                        </h6>
                        <div class="row small">
                            <div class="col-md-4">
                                <strong>Hero Slides:</strong><br>
                                800×600px or 1200×800px
                            </div>
                            <div class="col-md-4">
                                <strong>Section Images:</strong><br>
                                600×400px
                            </div>
                            <div class="col-md-4">
                                <strong>Banners:</strong><br>
                                1200×300px
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-between pt-3 border-top">
                        <a href="{{ route('admin.site-images.index') }}" class="btn btn-outline-secondary btn-lg">
                            <i class="fas fa-arrow-left me-2"></i>
                            Back to Images
                        </a>
                        <div>
                            <a href="{{ route('admin.site-images.show', $siteImage) }}" class="btn btn-info btn-lg me-2">
                                <i class="fas fa-eye me-2"></i>
                                View Details
                            </a>
                            <button type="submit" class="btn btn-primary btn-lg btn-gradient" id="submitBtn">
                                <span id="submitText">
                                    <i class="fas fa-save me-2"></i>
                                    Update Image
                                </span>
                                <span id="submitLoader" class="d-none">
                                    <i class="fas fa-spinner fa-spin me-2"></i>
                                    Updating...
                                </span>
                            </button>
                        </div>
                    </div>
                </form>
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

.btn-gradient {
    background: linear-gradient(45deg, #007bff, #0056b3);
    border: none;
    color: white;
}

.btn-gradient:hover {
    background: linear-gradient(45deg, #0056b3, #004085);
    color: white;
}

.drop-zone {
    cursor: pointer;
    transition: all 0.3s ease;
}

.drop-zone:hover {
    border-color: #ffc107 !important;
    background-color: #fff8e1 !important;
}

.drop-zone.dragover {
    border-color: #28a745 !important;
    background-color: #f0fff4 !important;
}

.form-check-lg .form-check-input {
    width: 2rem;
    height: 1rem;
}

.form-check-lg .form-check-label {
    font-size: 1.1rem;
}
</style>
@endpush

@push('scripts')
<script>
// Drag and Drop functionality for replacement image
const dropZone = document.getElementById('imageDropZone');
const fileInput = document.getElementById('imageInput');
const newPreviewDiv = document.getElementById('newImagePreview');
const previewImg = document.getElementById('previewImg');
const dropZoneContent = document.getElementById('dropZoneContent');

// Make drop zone clickable
dropZone.addEventListener('click', () => fileInput.click());

// Prevent default drag behaviors
['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
    dropZone.addEventListener(eventName, preventDefaults, false);
    document.body.addEventListener(eventName, preventDefaults, false);
});

function preventDefaults(e) {
    e.preventDefault();
    e.stopPropagation();
}

// Highlight drop zone when item is dragged over it
['dragenter', 'dragover'].forEach(eventName => {
    dropZone.addEventListener(eventName, highlight, false);
});

['dragleave', 'drop'].forEach(eventName => {
    dropZone.addEventListener(eventName, unhighlight, false);
});

function highlight(e) {
    dropZone.classList.add('dragover');
}

function unhighlight(e) {
    dropZone.classList.remove('dragover');
}

// Handle dropped files
dropZone.addEventListener('drop', handleDrop, false);

function handleDrop(e) {
    const dt = e.dataTransfer;
    const files = dt.files;
    
    if (files.length > 0) {
        fileInput.files = files;
        handleFileSelect(files[0]);
    }
}

// Handle file input change
fileInput.addEventListener('change', function(e) {
    if (e.target.files.length > 0) {
        handleFileSelect(e.target.files[0]);
    }
});

function handleFileSelect(file) {
    if (file && file.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.onload = function(e) {
            previewImg.src = e.target.result;
            newPreviewDiv.style.display = 'block';
            
            // Update drop zone
            dropZoneContent.innerHTML = `
                <i class="fas fa-check-circle fa-2x text-success mb-2"></i>
                <h6 class="text-success mb-0">${file.name}</h6>
                <p class="text-muted small mb-0">New image selected</p>
            `;
        };
        reader.readAsDataURL(file);
    }
}

function removeNewPreview() {
    fileInput.value = '';
    newPreviewDiv.style.display = 'none';
    dropZoneContent.innerHTML = `
        <i class="fas fa-cloud-upload-alt fa-2x text-warning mb-2"></i>
        <h6 class="text-warning mb-1">Drop new image here to replace</h6>
        <p class="text-muted small mb-2">or <span class="text-warning fw-bold">click to browse</span></p>
        <div class="small text-muted">
            JPEG, PNG, JPG, GIF | Max: 2MB
        </div>
    `;
}

// Form submission with loading state
document.getElementById('imageEditForm').addEventListener('submit', function() {
    const submitBtn = document.getElementById('submitBtn');
    const submitText = document.getElementById('submitText');
    const submitLoader = document.getElementById('submitLoader');
    
    submitBtn.disabled = true;
    submitText.classList.add('d-none');
    submitLoader.classList.remove('d-none');
});
</script>
@endpush
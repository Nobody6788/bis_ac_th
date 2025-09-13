@extends('layouts.admin')

@section('page-title', 'Create Content Section')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">
                <i class="fas fa-plus me-2"></i>
                Create Content Section
            </h1>
            <a href="{{ route('admin.content.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i>
                Back to Content List
            </a>
        </div>
    </div>
</div>

@if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fas fa-exclamation-triangle me-2"></i>
        Please fix the following errors:
        <ul class="mb-0 mt-2">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">
            <i class="fas fa-edit me-2"></i>
            Content Section Details
        </h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.content.store') }}" method="POST">
            @csrf
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="section_name" class="form-label">Section Name *</label>
                    <input type="text" 
                           class="form-control @error('section_name') is-invalid @enderror" 
                           id="section_name" 
                           name="section_name" 
                           value="{{ old('section_name') }}" 
                           placeholder="e.g., Hero Title, About Description"
                           required>
                    @error('section_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6 mb-3">
                    <label for="section_key" class="form-label">Section Key *</label>
                    <input type="text" 
                           class="form-control @error('section_key') is-invalid @enderror" 
                           id="section_key" 
                           name="section_key" 
                           value="{{ old('section_key') }}" 
                           placeholder="e.g., hero.title, about.description"
                           required>
                    <small class="text-muted">Unique identifier for this content section</small>
                    @error('section_key')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="page" class="form-label">Page *</label>
                    <select class="form-select @error('page') is-invalid @enderror" id="page" name="page" required>
                        <option value="">Select Page</option>
                        <option value="homepage" {{ old('page') == 'homepage' ? 'selected' : '' }}>Homepage</option>
                        <option value="about" {{ old('page') == 'about' ? 'selected' : '' }}>About</option>
                        <option value="contact" {{ old('page') == 'contact' ? 'selected' : '' }}>Contact</option>
                        <option value="programs" {{ old('page') == 'programs' ? 'selected' : '' }}>Programs</option>
                        <option value="news" {{ old('page') == 'news' ? 'selected' : '' }}>News</option>
                        <option value="gallery" {{ old('page') == 'gallery' ? 'selected' : '' }}>Gallery</option>
                    </select>
                    @error('page')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-4 mb-3">
                    <label for="content_type" class="form-label">Content Type *</label>
                    <select class="form-select @error('content_type') is-invalid @enderror" id="content_type" name="content_type" required>
                        <option value="">Select Type</option>
                        <option value="text" {{ old('content_type') == 'text' ? 'selected' : '' }}>Plain Text</option>
                        <option value="html" {{ old('content_type') == 'html' ? 'selected' : '' }}>HTML</option>
                        <option value="markdown" {{ old('content_type') == 'markdown' ? 'selected' : '' }}>Markdown</option>
                    </select>
                    @error('content_type')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-4 mb-3">
                    <label for="order" class="form-label">Display Order</label>
                    <input type="number" 
                           class="form-control @error('order') is-invalid @enderror" 
                           id="order" 
                           name="order" 
                           value="{{ old('order', 0) }}" 
                           min="0"
                           placeholder="0">
                    <small class="text-muted">Lower numbers appear first</small>
                    @error('order')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="mb-3">
                <label for="content" class="form-label">Content *</label>
                <textarea class="form-control @error('content') is-invalid @enderror" 
                          id="content" 
                          name="content" 
                          rows="8" 
                          placeholder="Enter the content here..."
                          required>{{ old('content') }}</textarea>
                @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="metadata" class="form-label">Metadata (Optional)</label>
                <textarea class="form-control @error('metadata') is-invalid @enderror" 
                          id="metadata" 
                          name="metadata" 
                          rows="3" 
                          placeholder='{"css_class": "custom-class", "attributes": {"data-aos": "fade-up"}}'
                >{{ old('metadata') }}</textarea>
                <small class="text-muted">JSON format for additional attributes like CSS classes, data attributes, etc.</small>
                @error('metadata')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-check mb-4">
                <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                <label class="form-check-label" for="is_active">
                    Active (display on website)
                </label>
            </div>
            
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>
                    Create Content Section
                </button>
                <a href="{{ route('admin.content.index') }}" class="btn btn-outline-secondary">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
// Auto-generate section key from section name
document.getElementById('section_name').addEventListener('input', function() {
    const sectionName = this.value;
    const sectionKey = sectionName
        .toLowerCase()
        .replace(/[^a-z0-9\s]/g, '') // Remove special characters
        .replace(/\s+/g, '.') // Replace spaces with dots
        .replace(/\.+/g, '.') // Replace multiple dots with single dot
        .replace(/^\.+|\.+$/g, ''); // Remove leading/trailing dots
    
    document.getElementById('section_key').value = sectionKey;
});

// Content type change handler
document.getElementById('content_type').addEventListener('change', function() {
    const contentTextarea = document.getElementById('content');
    const value = this.value;
    
    if (value === 'html') {
        contentTextarea.placeholder = 'Enter HTML content here...';
    } else if (value === 'markdown') {
        contentTextarea.placeholder = 'Enter Markdown content here...';
    } else {
        contentTextarea.placeholder = 'Enter plain text content here...';
    }
});
</script>
@endsection
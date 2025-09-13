@props(['program' => null])

@push('styles')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<style>
    body {
        margin: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f3f5f9;
        padding: 20px;
        color: #333;
    }

    .form-container {
        max-width: 700px;
        margin: 0 auto;
        background-color: #fff;
        padding: 20px 25px;
        border-radius: 6px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.05);
        font-size: 14px;
    }

    h1 {
        font-size: 18px;
        margin-bottom: 15px;
        color: #333;
        font-weight: 600;
    }

    h2 {
        font-size: 15px;
        margin: 20px 0 10px;
        color: #666;
        font-weight: 500;
    }

    label {
        display: block;
        margin: 12px 0 4px;
        font-weight: 500;
        color: #333;
    }

    input[type="text"],
    input[type="number"],
    textarea {
        width: 100%;
        padding: 8px 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 13px;
        margin-bottom: 5px;
    }

    textarea {
        min-height: 100px;
        resize: vertical;
    }

    .image-upload {
        text-align: center;
        margin: 15px 0;
        cursor: pointer;
    }

    .image-upload img {
        width: 150px;
        height: 150px;
        object-fit: contain;
        opacity: 0.3;
    }

    .upload-info {
        font-size: 12px;
        color: #666;
        text-align: center;
        margin: 5px 0 15px;
    }

    .checkbox {
        margin: 15px 0;
        display: flex;
        align-items: center;
    }

    .checkbox input {
        margin-right: 8px;
    }

    .form-actions {
        display: flex;
        justify-content: space-between;
        margin-top: 25px;
        padding-top: 15px;
        border-top: 1px solid #eee;
    }

    .form-actions button,
    .form-actions a {
        padding: 8px 20px;
        font-size: 13px;
        border-radius: 4px;
        border: none;
        cursor: pointer;
        text-decoration: none;
        transition: all 0.2s;
    }

    .form-actions .cancel {
        background: none;
        color: #3b82f6;
    }

    .form-actions .cancel:hover {
        text-decoration: underline;
    }

    .form-actions .submit {
        background-color: #3b82f6;
        color: white;
    }

    .form-actions .submit:hover {
        background-color: #2563eb;
    }

    .error-message {
        color: #dc2626;
        font-size: 12px;
        margin-top: 4px;
    }

    #editor {
        border: 1px solid #ccc;
        border-radius: 4px;
        min-height: 200px;
    }

    @media (max-width: 600px) {
        .form-actions {
            flex-direction: column;
            gap: 10px;
        }

        .form-actions button,
        .form-actions a {
            width: 100%;
            text-align: center;
        }
    }
</style>
@endpush

<div class="form-container">
    <h1>{{ isset($program) ? 'Edit' : 'Add New' }} Program</h1>
    <h2>Program Info</h2>

    <form action="{{ isset($program) ? route('admin.programs.update', $program) : route('admin.programs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($program))
            @method('PUT')
        @endif

        <label for="title">Title *</label>
        <input type="text" id="title" name="title" required 
               value="{{ old('title', $program->title ?? '') }}" 
               placeholder="Program title">
        @error('title')
            <div class="error-message">{{ $message }}</div>
        @enderror

        <label for="description">Short Description</label>
        <input type="text" id="description" name="description"
               value="{{ old('description', $program->description ?? '') }}" 
               placeholder="Brief description">
        @error('description')
            <div class="error-message">{{ $message }}</div>
        @enderror

        <label for="content">Content</label>
        <div id="editor">{!! old('content', $program->content ?? '') !!}</div>
        <textarea id="content" name="content" class="hidden">{{ old('content', $program->content ?? '') }}</textarea>
        @error('content')
            <div class="error-message">{{ $message }}</div>
        @enderror

        <label>Featured Image</label>
        <div class="image-upload" onclick="document.getElementById('image').click()">
            @if(isset($program) && $program->image_url)
                <img id="image-preview" src="{{ $program->image_url }}" alt="{{ $program->title }}" style="opacity: 1;">
            @else
                <img id="image-preview" src="https://img.icons8.com/ios/500/image--v1.png" alt="Upload Placeholder">
            @endif
            <div class="upload-info">Click to upload</div>
        </div>
        <input type="file" id="image" name="image" accept="image/*" class="hidden">
        @if(isset($program) && $program->image)
            <div class="checkbox">
                <input type="checkbox" id="remove_image" name="remove_image" value="1">
                <label for="remove_image">Remove current image</label>
            </div>
        @endif
        <div class="upload-info">
            Max size: 2MB · 800x500px · JPG/PNG/GIF
        </div>
        @error('image')
            <div class="error-message">{{ $message }}</div>
        @enderror

        <label for="order">Order</label>
        <input type="number" id="order" name="order" 
               value="{{ old('order', $program->order ?? 0) }}" min="0">
        @error('order')
            <div class="error-message">{{ $message }}</div>
        @enderror

        <div class="checkbox">
            <input type="checkbox" id="is_active" name="is_active" value="1" 
                   {{ (old('is_active', $program->is_active ?? true) ? 'checked' : '') }}>
            <label for="is_active">Show on website</label>
        </div>

        <div class="form-actions">
            <a href="{{ route('admin.programs.index') }}" class="cancel">Cancel</a>
            <button type="submit" class="submit">{{ isset($program) ? 'Update' : 'Create' }}</button>
        </div>
    </form>
</div>

@push('scripts')
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Quill editor
    const quill = new Quill('#editor', {
        theme: 'snow',
        modules: {
            toolbar: [
                [{ 'header': [1, 2, 3, false] }],
                ['bold', 'italic', 'underline', 'strike'],
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                ['link', 'image'],
                ['clean']
            ]
        },
        placeholder: 'Enter program content here...'
    });

    // Sync Quill editor with form's content textarea
    const form = document.querySelector('form');
    const contentInput = document.getElementById('content');
    
    // Set initial content
    contentInput.value = quill.root.innerHTML;
    
    // Update textarea on editor change
    quill.on('text-change', function() {
        contentInput.value = quill.root.innerHTML;
    });

    // Handle image upload preview
    const imageInput = document.getElementById('image');
    const imagePreview = document.getElementById('image-preview');
    
    if (imageInput) {
        imageInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    imagePreview.src = event.target.result;
                    imagePreview.style.opacity = '1';
                };
                reader.readAsDataURL(file);
            }
        });
    }

    // Handle form submission
    if (form) {
        form.addEventListener('submit', function(e) {
            // Ensure content is up to date
            contentInput.value = quill.root.innerHTML;
            return true;
        });
    }
});
</script>
@endpush

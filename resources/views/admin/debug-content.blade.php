@extends('layouts.admin')

@section('page-title', 'Debug Content Sections')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">
                <i class="fas fa-bug me-2"></i>
                Debug Content Sections
            </h1>
            <a href="{{ route('admin.content.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i>
                Back to Content Management
            </a>
        </div>
    </div>
</div>

<div class="alert alert-info">
    <i class="fas fa-info-circle me-2"></i>
    This page shows the current state of all content sections in the database for debugging purposes.
</div>

<div class="row">
    @foreach($sections as $section)
        <div class="col-md-6 mb-4">
            <div class="card {{ $section->is_active ? 'border-success' : 'border-danger' }}">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <strong>{{ $section->section_key }}</strong>
                    @if($section->is_active)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-danger">Inactive</span>
                    @endif
                </div>
                <div class="card-body">
                    <h6 class="card-title">{{ $section->section_name }}</h6>
                    <p class="card-text">
                        <strong>Content:</strong><br>
                        <span class="text-break">{{ $section->content }}</span>
                    </p>
                    <small class="text-muted">
                        <strong>Page:</strong> {{ $section->page }} | 
                        <strong>Type:</strong> {{ $section->content_type }} | 
                        <strong>Order:</strong> {{ $section->order }}<br>
                        <strong>Updated:</strong> {{ $section->updated_at->format('M d, Y g:i A') }}
                    </small>
                    <hr>
                    <div class="mt-2">
                        <strong>Test getContent():</strong><br>
                        <code>{{ App\Models\ContentSection::getContent($section->section_key, 'DEFAULT_VALUE') }}</code>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('admin.content.edit', $section) }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="card mt-4">
    <div class="card-header">
        <h5 class="mb-0">
            <i class="fas fa-code me-2"></i>
            Content Section Usage in Views
        </h5>
    </div>
    <div class="card-body">
        <p>Content sections are used in Blade templates with the following syntax:</p>
        <pre class="bg-light p-3 rounded"><code>@{{ ContentSection::getContent('section_key', 'default_value') }}</code></pre>
        
        <h6 class="mt-3">Example usages from homepage:</h6>
        <ul>
            <li><code>@{{ ContentSection::getContent('hero.title.inspiring', 'Inspiring') }}</code></li>
            <li><code>@{{ ContentSection::getContent('hero.description', 'Default description') }}</code></li>
            <li><code>@{{ ContentSection::getContent('about.title', 'About Us') }}</code></li>
        </ul>
    </div>
</div>
@endsection
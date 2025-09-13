@extends('layouts.admin')

@section('page-title', 'Content Management')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">
                <i class="fas fa-edit me-2"></i>
                Content Management
            </h1>
            <a href="{{ route('admin.content.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>
                Add New Content
            </a>
        </div>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0">
                <i class="fas fa-list me-2"></i>
                All Content Sections
            </h5>
            <div class="d-flex gap-2">
                <button type="button" class="btn btn-outline-primary btn-sm" id="bulkActionBtn" style="display: none;">
                    <i class="fas fa-tasks me-1"></i>
                    Bulk Actions
                </button>
                <div class="dropdown" style="display: none;" id="bulkActionsDropdown">
                    <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        <i class="fas fa-cog me-1"></i>
                        Actions
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#" onclick="bulkAction('activate')"><i class="fas fa-eye me-2"></i>Activate Selected</a></li>
                        <li><a class="dropdown-item" href="#" onclick="bulkAction('deactivate')"><i class="fas fa-eye-slash me-2"></i>Deactivate Selected</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="#" onclick="bulkAction('delete')"><i class="fas fa-trash me-2"></i>Delete Selected</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        @if($contents->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th width="40">
                                <input type="checkbox" class="form-check-input" id="selectAllContent" onchange="toggleSelectAll()">
                            </th>
                            <th>Section Name</th>
                            <th>Section Key</th>
                            <th>Page</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Order</th>
                            <th>Updated</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contents as $content)
                            <tr>
                                <td>
                                    <input type="checkbox" class="form-check-input content-checkbox" 
                                           value="{{ $content->id }}" onchange="updateBulkActions()">
                                </td>
                                <td>
                                    <strong>{{ $content->section_name }}</strong>
                                    @if(strlen($content->content) > 50)
                                        <br><small class="text-muted">{{ Str::limit($content->content, 50) }}</small>
                                    @endif
                                </td>
                                <td>
                                    <code>{{ $content->section_key }}</code>
                                </td>
                                <td>
                                    <span class="badge bg-secondary">{{ $content->page }}</span>
                                </td>
                                <td>
                                    <span class="badge bg-info">{{ $content->content_type }}</span>
                                </td>
                                <td>
                                    @if($content->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>{{ $content->order }}</td>
                                <td>
                                    <small class="text-muted">{{ $content->updated_at->diffForHumans() }}</small>
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.content.edit', $content) }}" 
                                           class="btn btn-sm btn-outline-primary" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        
                                        <form action="{{ route('admin.content.toggle-status', $content) }}" 
                                              method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" 
                                                    class="btn btn-sm btn-outline-{{ $content->is_active ? 'warning' : 'success' }}" 
                                                    title="{{ $content->is_active ? 'Deactivate' : 'Activate' }}">
                                                <i class="fas fa-{{ $content->is_active ? 'eye-slash' : 'eye' }}"></i>
                                            </button>
                                        </form>
                                        
                                        <form action="{{ route('admin.content.destroy', $content) }}" 
                                              method="POST" class="d-inline"
                                              onsubmit="return confirm('Are you sure you want to delete this content section?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-edit fa-3x text-muted mb-3"></i>
                <h5 class="text-muted">No Content Sections Found</h5>
                <p class="text-muted">Create your first content section to start managing website content.</p>
                <a href="{{ route('admin.content.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>
                    Create First Content Section
                </a>
            </div>
        @endif
    </div>
</div>

<!-- Bulk Action Form -->
<form id="bulkActionForm" action="{{ route('admin.content.bulk-update') }}" method="POST" style="display: none;">
    @csrf
    <input type="hidden" name="action" id="bulkActionType">
    <input type="hidden" name="content_ids" id="bulkContentIds">
</form>

@endsection

@push('scripts')
<script>
// Bulk Actions JavaScript
function toggleSelectAll() {
    const selectAll = document.getElementById('selectAllContent');
    const checkboxes = document.querySelectorAll('.content-checkbox');
    
    checkboxes.forEach(checkbox => {
        checkbox.checked = selectAll.checked;
    });
    
    updateBulkActions();
}

function updateBulkActions() {
    const checkboxes = document.querySelectorAll('.content-checkbox:checked');
    const bulkActionBtn = document.getElementById('bulkActionBtn');
    const bulkActionsDropdown = document.getElementById('bulkActionsDropdown');
    const selectAll = document.getElementById('selectAllContent');
    
    if (checkboxes.length > 0) {
        bulkActionBtn.style.display = 'block';
        bulkActionsDropdown.style.display = 'block';
    } else {
        bulkActionBtn.style.display = 'none';
        bulkActionsDropdown.style.display = 'none';
    }
    
    // Update "select all" checkbox state
    const allCheckboxes = document.querySelectorAll('.content-checkbox');
    selectAll.checked = allCheckboxes.length > 0 && checkboxes.length === allCheckboxes.length;
    selectAll.indeterminate = checkboxes.length > 0 && checkboxes.length < allCheckboxes.length;
}

function bulkAction(action) {
    const checkboxes = document.querySelectorAll('.content-checkbox:checked');
    
    if (checkboxes.length === 0) {
        alert('Please select at least one content section.');
        return;
    }
    
    let confirmMessage = '';
    switch (action) {
        case 'activate':
            confirmMessage = `Are you sure you want to activate ${checkboxes.length} content section(s)?`;
            break;
        case 'deactivate':
            confirmMessage = `Are you sure you want to deactivate ${checkboxes.length} content section(s)?`;
            break;
        case 'delete':
            confirmMessage = `Are you sure you want to delete ${checkboxes.length} content section(s)? This action cannot be undone.`;
            break;
    }
    
    if (confirm(confirmMessage)) {
        const contentIds = Array.from(checkboxes).map(cb => cb.value);
        
        document.getElementById('bulkActionType').value = action;
        document.getElementById('bulkContentIds').value = JSON.stringify(contentIds);
        document.getElementById('bulkActionForm').submit();
    }
}

// Initialize bulk actions on page load
document.addEventListener('DOMContentLoaded', function() {
    updateBulkActions();
});
</script>
@endpush
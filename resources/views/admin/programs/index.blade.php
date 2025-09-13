@extends('layouts.admin')

@section('content')
<div class="container" style="max-width: 900px; margin: auto; padding: 20px;">
    <h1 style="font-size: 2rem; color: #1c2b33; margin-bottom: 20px;">Programs Management</h1>
    
    <div class="program-box" style="background-color: #ffffff; box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05); padding: 20px; border-radius: 6px;">
        <div class="header-row" style="display: flex; justify-content: space-between; font-weight: bold; color: #444; border-bottom: 1px solid #eee; padding-bottom: 10px; margin-bottom: 10px;">
            <span style="flex: 1;">Image</span>
            <span style="flex: 2;">Title</span>
            <span style="flex: 1;">Status</span>
            <span style="flex: 0.5;">Order</span>
            <span style="flex: 1; text-align: right;">Actions</span>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        @if($programs->count() > 0)
            @foreach($programs as $program)
                <div class="program-row" style="display: flex; align-items: center; padding: 12px 0; border-bottom: 1px solid #f0f0f0;">
                    <div style="flex: 1;">
                        @if($program->image)
                            <img src="{{ asset('storage/' . $program->image) }}" alt="{{ $program->title }}" style="width: 60px; height: 40px; object-fit: cover; border-radius: 4px;">
                        @else
                            <div style="width: 60px; height: 40px; background: #f0f0f0; display: flex; align-items: center; justify-content: center; border-radius: 4px;">
                                <span style="color: #999; font-size: 0.8rem;">No image</span>
                            </div>
                        @endif
                    </div>
                    <div style="flex: 2; padding: 0 10px;">{{ $program->title }}</div>
                    <div style="flex: 1;">
                        <span style="display: inline-block; padding: 3px 8px; border-radius: 12px; font-size: 0.8rem; background-color: {{ $program->status === 'active' ? '#e3fcef' : '#fee2e2' }}; color: {{ $program->status === 'active' ? '#0e9f6e' : '#dc2626' }};">
                            {{ ucfirst($program->status) }}
                        </span>
                    </div>
                    <div style="flex: 0.5;">{{ $program->order ?? '-' }}</div>
                    <div style="flex: 1; text-align: right;">
                        <a href="{{ route('admin.programs.edit', $program->id) }}" style="color: #3b82f6; margin-right: 10px; text-decoration: none;">Edit</a>
                        <form action="{{ route('admin.programs.destroy', $program->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background: none; border: none; color: #ef4444; cursor: pointer;" onclick="return confirm('Are you sure you want to delete this program?')">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        @else
            <div class="no-programs" style="color: #666; font-size: 0.95rem; padding: 20px 0; text-align: center;">
                No programs found. <a href="{{ route('admin.programs.create') }}" style="color: #007bff; text-decoration: none;">Create one</a>.
            </div>
        @endif
    </div>
    
    <div style="margin-top: 20px; text-align: right;">
        <a href="{{ route('admin.programs.create') }}" style="background-color: #3b82f6; color: white; padding: 8px 16px; border-radius: 4px; text-decoration: none; display: inline-flex; align-items: center;">
            <svg style="width: 16px; height: 16px; margin-right: 6px;" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            Add New Program
        </a>
    </div>
</div>

@push('scripts')
<script>
function toggleStatus(programId) {
    fetch(`/admin/programs/${programId}/toggle-status`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json',
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({})
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            window.location.reload();
        }
    })
    .catch(error => console.error('Error:', error));
}
</script>
@endpush
@endsection

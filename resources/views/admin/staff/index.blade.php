@extends('layouts.admin')

@section('page-title', 'Staff Management')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Staff Members</h3>
        <div class="card-tools">
            <a href="{{ route('admin.staff.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add Staff Member
            </a>
        </div>
    </div>
    <div class="card-body">

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Sort Order</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($staff as $member)
                                    <tr>
                                        <td>
                                            @if($member->image)
                                                <img src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->name }}" class="img-thumbnail" style="width: 50px; height: 50px; object-fit: cover;">
                                            @else
                                                <span class="text-muted">No Image</span>
                                            @endif
                                        </td>
                                        <td>{{ $member->name }}</td>
                                        <td>{{ $member->position }}</td>
                                        <td>{{ $member->sort_order }}</td>
                                        <td class="text-end">
                                            <a href="{{ route('admin.staff.edit', $member) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                            <form action="{{ route('admin.staff.destroy', $member) }}" method="POST" class="d-inline ms-1" onsubmit="return confirm('Are you sure you want to delete this staff member?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-4">No staff members found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
    </div>
</div>
@endsection

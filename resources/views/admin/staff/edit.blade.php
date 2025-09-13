@extends('layouts.admin')

@section('page-title', 'Edit Staff Member')

@section('content')
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit {{ $staff->name }}</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.staff.update', $staff) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $staff->name) }}" required>
                        @error('name')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="position">Position</label>
                        <input type="text" name="position" id="position" class="form-control @error('position') is-invalid @enderror" value="{{ old('position', $staff->position) }}">
                        @error('position')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="bio">Bio</label>
                        <textarea name="bio" id="bio" rows="4" class="form-control @error('bio') is-invalid @enderror">{{ old('bio', $staff->bio) }}</textarea>
                        @error('bio')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="image">Image</label>
                        <div class="custom-file">
                            <input type="file" name="image" id="image" class="custom-file-input @error('image') is-invalid @enderror">
                            <label class="custom-file-label" for="image">Choose file</label>
                        </div>
                        @error('image')
                            <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                        @if ($staff->image)
                            <div class="mt-2">
                                <p class="text-sm text-muted">Current Image:</p>
                                <img src="{{ asset('storage/' . $staff->image) }}" alt="{{ $staff->name }}" class="img-thumbnail" style="max-height: 100px;">
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="sort_order">Sort Order</label>
                        <input type="number" name="sort_order" id="sort_order" class="form-control @error('sort_order') is-invalid @enderror" value="{{ old('sort_order', $staff->sort_order) }}">
                        @error('sort_order')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('admin.staff.index') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

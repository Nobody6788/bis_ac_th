@extends('layouts.admin')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
        <div class="md:flex md:items-center md:justify-between">
            <div class="flex-1 min-w-0">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                    Edit Program: {{ $program->title }}
                </h2>
            </div>
        </div>

        <div class="mt-8">
            <form action="{{ route('admin.programs.update', $program) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('admin.programs.form', ['program' => $program])
            </form>
        </div>
    </div>
</div>
@endsection

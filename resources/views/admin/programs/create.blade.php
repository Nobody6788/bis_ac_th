@extends('layouts.admin')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
        <div class="md:flex md:items-center md:justify-between">
            <div class="flex-1 min-w-0">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                    Add New Program
                </h2>
            </div>
        </div>

        <div class="mt-8">
            <form action="{{ route('admin.programs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('admin.programs.form')
            </form>
        </div>
    </div>
</div>
@endsection

@extends('layouts.admin')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
        <div class="md:flex md:items-center md:justify-between">
            <div class="flex-1 min-w-0">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                    {{ $program->title }}
                </h2>
                <div class="mt-1 flex flex-col sm:flex-row sm:flex-wrap sm:mt-0 sm:space-x-6">
                    <div class="mt-2 flex items-center text-sm text-gray-500">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $program->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $program->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </div>
                    <div class="mt-2 flex items-center text-sm text-gray-500">
                        <span>Order: {{ $program->order }}</span>
                    </div>
                </div>
            </div>
            <div class="mt-4 flex md:mt-0 md:ml-4">
                <a href="{{ route('admin.programs.edit', $program) }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Edit
                </a>
                <a href="{{ route('admin.programs.index') }}" class="ml-3 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Back to Programs
                </a>
            </div>
        </div>

        <div class="mt-8 bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <div class="flex flex-col md:flex-row">
                    @if($program->image_url)
                        <div class="md:w-1/3 mb-4 md:mb-0 md:mr-6">
                            <img src="{{ $program->image_url }}" alt="{{ $program->title }}" class="w-full h-auto rounded-lg shadow">
                        </div>
                    @endif
                    <div class="flex-1">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Program Details
                        </h3>
                        @if($program->description)
                            <p class="mt-2 text-gray-600">{{ $program->description }}</p>
                        @endif
                    </div>
                </div>

                @if($program->content)
                    <div class="mt-6 border-t border-gray-200 pt-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">
                            Content
                        </h3>
                        <div class="prose max-w-none">
                            {!! $program->content !!}
                        </div>
                    </div>
                @endif

                <div class="mt-6 border-t border-gray-200 pt-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">
                        Metadata
                    </h3>
                    <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">
                                Created At
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                {{ $program->created_at->format('F j, Y, g:i a') }}
                            </dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">
                                Last Updated
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                {{ $program->updated_at->format('F j, Y, g:i a') }}
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

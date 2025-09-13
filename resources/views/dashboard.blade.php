<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Card -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">
                                Welcome back, {{ auth()->user()->name }}!
                            </h3>
                            <p class="text-gray-600">
                                You're successfully logged into Boston International School Chiangmai.
                            </p>
                        </div>
                        <div class="text-blue-600">
                            <svg class="w-16 h-16" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.84L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.84l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- User Information Card -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <h4 class="text-lg font-semibold text-gray-900 mb-4">
                        <svg class="w-5 h-5 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                        </svg>
                        Account Information
                    </h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                            <p class="text-gray-900">{{ auth()->user()->name }}</p>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <p class="text-gray-900">{{ auth()->user()->email }}</p>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Role</label>
                            <p class="text-gray-900 capitalize">{{ auth()->user()->role ?? 'User' }}</p>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Member Since</label>
                            <p class="text-gray-900">{{ auth()->user()->created_at->format('M d, Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Links Card -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <h4 class="text-lg font-semibold text-gray-900 mb-4">
                        <svg class="w-5 h-5 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                        </svg>
                        Quick Links
                    </h4>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <a href="{{ route('home') }}" class="bg-blue-50 hover:bg-blue-100 p-4 rounded-lg transition-colors group">
                            <div class="flex items-center">
                                <div class="bg-blue-500 text-white p-2 rounded-lg mr-3 group-hover:bg-blue-600 transition-colors">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h5 class="font-medium text-gray-900">School Website</h5>
                                    <p class="text-sm text-gray-600">Visit our main website</p>
                                </div>
                            </div>
                        </a>
                        
                        <a href="{{ route('profile.edit') }}" class="bg-green-50 hover:bg-green-100 p-4 rounded-lg transition-colors group">
                            <div class="flex items-center">
                                <div class="bg-green-500 text-white p-2 rounded-lg mr-3 group-hover:bg-green-600 transition-colors">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h5 class="font-medium text-gray-900">Edit Profile</h5>
                                    <p class="text-sm text-gray-600">Update your information</p>
                                </div>
                            </div>
                        </a>
                        
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <div class="flex items-center">
                                <div class="bg-gray-400 text-white p-2 rounded-lg mr-3">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <div>
                                    <h5 class="font-medium text-gray-900">Support</h5>
                                    <p class="text-sm text-gray-600">Contact school support</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Information -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-center">
                    <div class="text-gray-600">
                        <p class="mb-2">
                            <strong>Boston International School Chiangmai</strong>
                        </p>
                        <p class="text-sm">
                            Thank you for being part of our educational community.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

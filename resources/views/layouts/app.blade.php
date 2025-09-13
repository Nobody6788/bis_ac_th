<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('favcon/favicon.ico') }}" type="image/x-icon">
        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-white">
        <div class="min-h-0">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                @if(isset($slot))
                    {{ $slot }}
                @else
                    @yield('content')
                @endif
            </main>

            <!-- Footer -->
            <footer class="bg-blue-900 text-white py-8">
                <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex flex-col md:flex-row items-start justify-between space-y-6 md:space-y-0">
                        <!-- School Information -->
                        <div class="text-left flex-1">
                            <h3 class="text-xl font-bold text-white mb-4">
                                Boston International School Chiang Mai (BISCM)
                            </h3>
                            <div class="text-white space-y-2">
                                <p class="text-sm">Boston International School Chiang Mai</p>
                                <p class="text-sm">Address. 153 Village No. 1 T. Sanpuloei A. Doissket Chiang Mai 50220 Thailand</p>
                                <p class="text-sm">Fax. 061-780-7000 &nbsp;&nbsp;&nbsp; E-Mail. chingu0403@naver.com</p>
                            </div>
                            <p class="text-xs text-gray-300 mt-4">
                                COPYRIGHT(C) BOSTON INTERNATIONAL SCHOOL CHIANG MAI. ALL RIGHTS RESERVED.
                            </p>
                        </div>
                        
                        <!-- Contact and Social Media -->
                        <div class="flex flex-col items-end space-y-4">
                            <!-- Contact Links -->
                            <div class="flex space-x-6 text-sm">
                                <a href="#" class="text-cyan-400 hover:text-cyan-300 transition-colors">Privacy Policy</a>
                                <a href="#" class="text-cyan-400 hover:text-cyan-300 transition-colors">Contact Us</a>
                            </div>
                            
                            <!-- Social Media Icons -->
                            <div class="flex items-center space-x-4">
                                <span class="text-sm font-medium">SNS</span>
                                <!-- Facebook -->
                                <a href="#" class="text-cyan-400 hover:text-cyan-300 transition-colors" aria-label="Facebook">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                    </svg>
                                </a>
                                <!-- Naver Blog -->
                                <a href="#" class="text-cyan-400 hover:text-cyan-300 transition-colors" aria-label="Naver Blog">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M16.273 12.845 7.376 0H0v24h7.726l8.898-12.845L24 24V0h-7.727z"/>
                                    </svg>
                                </a>
                                <!-- YouTube -->
                                <a href="#" class="text-cyan-400 hover:text-cyan-300 transition-colors" aria-label="YouTube">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>

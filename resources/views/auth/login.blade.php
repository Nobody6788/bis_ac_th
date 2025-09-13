<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Admin Login - {{ config('app.name', 'Boston International School') }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .school-colors {
            background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
        }
        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .login-card {
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }
        .input-focus:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }
    </style>
</head>
<body class="antialiased">
    <!-- Background with school colors and pattern -->
    <div class="min-h-screen school-colors relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: radial-gradient(circle at 25% 25%, white 2px, transparent 2px), radial-gradient(circle at 75% 75%, white 2px, transparent 2px); background-size: 50px 50px; background-position: 0 0, 25px 25px;"></div>
        </div>
        
        <!-- Main Content -->
        <div class="relative z-10 min-h-screen flex items-center justify-center px-4 py-12">
            <div class="w-full max-w-md">
                <!-- Login Card -->
                <div class="glass-effect rounded-2xl login-card p-8">
                    <!-- School Logo and Branding -->
                    <div class="text-center mb-8">
                        <div class="inline-flex items-center justify-center w-20 h-20 mb-4">
                            <x-school-logo class="w-full h-full" />
                        </div>
                        <h1 class="text-2xl font-bold text-gray-900 mb-2">Admin Portal</h1>
                        <p class="text-gray-600">Boston International School</p>
                        <p class="text-sm text-gray-500">Doisaket District, Chiangmai</p>
                    </div>
                    
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-6" :status="session('status')" />
                    
                    <!-- Login Form -->
                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf
                        
                        <!-- Email Address -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                Email Address
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                    </svg>
                                </div>
                                <input id="email" 
                                       type="email" 
                                       name="email" 
                                       value=""
                                       required 
                                       autofocus 
                                       autocomplete="off"
                                       class="input-focus block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-0 transition-all duration-200 bg-white/50"
                                       placeholder="Enter your email">
                            </div>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        
                        <!-- Password -->
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                                Password
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                </div>
                                <input id="password" 
                                       type="password" 
                                       name="password" 
                                       required 
                                       autocomplete="current-password"
                                       class="input-focus block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-0 transition-all duration-200 bg-white/50"
                                       placeholder="••••••••">
                            </div>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        
                        <!-- Submit Button -->
                        <div class="space-y-4">
                            <button type="submit" 
                                    class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                </svg>
                                Sign In
                            </button>
                            
                            <!-- Register Link -->
                            <div class="text-center mt-4">
                                <p class="text-sm text-gray-600">
                                    Don't have an account? 
                                    <button type="button" 
                                            onclick="toggleRegister()" 
                                            class="font-medium text-blue-600 hover:text-blue-500 focus:outline-none transition-colors duration-200">
                                        Sign up
                                    </button>
                                </p>
                            </div>
                        </div>
                    </form>
                    
                    <!-- Registration Form (Hidden by default) -->
                    <form id="registerForm" method="POST" action="{{ route('register') }}" class="hidden opacity-0 transition-opacity duration-300 ease-in-out">
                        @csrf
                        <div class="space-y-6">
                            <div class="text-center">
                                <h3 class="text-lg font-medium text-gray-900 mb-2">Create an account</h3>
                                <p class="text-sm text-gray-500">Join our community today</p>
                            </div>
                            
                            <!-- Name -->
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                    Full Name
                                </label>
                                <input id="name" 
                                       type="text" 
                                       name="name" 
                                       required 
                                       autofocus
                                       class="input-focus block w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-0 transition-all duration-200 bg-white/50"
                                       placeholder="John Doe">
                            </div>
                            
                            <!-- Email -->
                            <div>
                                <label for="register_email" class="block text-sm font-medium text-gray-700 mb-2">
                                    Email Address
                                </label>
                                <input id="register_email" 
                                       type="email" 
                                       name="email" 
                                       required
                                       class="input-focus block w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-0 transition-all duration-200 bg-white/50"
                                       placeholder="you@example.com">
                            </div>
                            
                            <!-- Password -->
                            <div>
                                <label for="register_password" class="block text-sm font-medium text-gray-700 mb-2">
                                    Password
                                </label>
                                <input id="register_password"
                                       type="password"
                                       name="password"
                                       required
                                       autocomplete="new-password"
                                       class="input-focus block w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-0 transition-all duration-200 bg-white/50"
                                       placeholder="••••••••">
                            </div>
                            
                            <!-- Confirm Password -->
                            <div>
                                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">
                                    Confirm Password
                                </label>
                                <input id="password_confirmation"
                                       type="password"
                                       name="password_confirmation"
                                       required
                                       class="input-focus block w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-0 transition-all duration-200 bg-white/50"
                                       placeholder="••••••••">
                            </div>
                            
                            <!-- Register Button -->
                            <div>
                                <button type="submit" 
                                        class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all duration-200">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                                    </svg>
                                    Create Account
                                </button>
                            </div>
                            
                            <!-- Back to Login -->
                            <div class="text-center">
                                <button type="button" 
                                        onclick="toggleRegister()" 
                                        class="text-sm text-blue-600 hover:text-blue-500 focus:outline-none inline-flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                    </svg>
                                    Back to login
                                </button>
                            </div>
                        </div>
                    </form>
                    
                    <script>
                        function toggleRegister() {
                            // Use a class instead of attribute selector with dynamic content
                            const loginForm = document.querySelector('form[action*="login"]');
                            const registerForm = document.getElementById('registerForm');
                            
                            // Toggle forms with animation
                            loginForm.classList.toggle('hidden');
                            loginForm.classList.toggle('opacity-0');
                            registerForm.classList.toggle('hidden');
                            registerForm.classList.toggle('opacity-0');
                            
                            // Trigger reflow for smooth animation
                            void loginForm.offsetWidth;
                            void registerForm.offsetWidth;
                            
                            // Toggle opacity for fade effect
                            setTimeout(() => {
                                loginForm.classList.toggle('opacity-100');
                                registerForm.classList.toggle('opacity-100');
                            }, 10);
                        }
                    </script>
                    
                    @push('scripts')
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            // Initialize any form-specific JavaScript here
                        });
                    </script>
                    @endpush
                    
                    <!-- Footer -->
                    <div class="mt-8 pt-6 border-t border-gray-200">
                        <div class="text-center">
                            <p class="text-xs text-gray-500">
                                &copy; {{ date('Y') }} Boston International School. All rights reserved.
                            </p>
                            <p class="text-xs text-gray-400 mt-1">
                                Secure Admin Access Portal
                            </p>
                        </div>
                    </div>
                </div>
                
                <!-- Back to Website Link -->
                <div class="text-center mt-6">
                    <a href="{{ route('homepage') }}" 
                       class="inline-flex items-center text-white/90 hover:text-white text-sm font-medium transition-colors duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Back to Website
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

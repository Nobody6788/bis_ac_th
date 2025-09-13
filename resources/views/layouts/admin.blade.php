<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Admin Panel</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('favcon/favicon.ico') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom CSS -->
    <style>
        /* Sidebar styles */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: 250px;
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            box-shadow: 4px 0 15px rgba(0,0,0,0.1);
            z-index: 1000;
            overflow-y: auto;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            padding: 1.5rem 0;
            border-right: 1px solid rgba(255,255,255,0.1);
            transform: translateX(0);
        }
        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.85);
            padding: 0.75rem 1.5rem;
            border-radius: 0 30px 30px 0;
            margin: 0.125rem 1rem 0.125rem 0;
            transition: all 0.25s ease;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }
        
        .sidebar .nav-link i {
            margin-right: 12px;
            width: 20px;
            text-align: center;
            font-size: 1.1em;
        }
        
        .sidebar .nav-link:before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 4px;
            background: rgba(255,255,255,0.8);
            transform: scaleY(0);
            transition: transform 0.2s ease;
        }
        .sidebar .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: #fff;
            transform: translateX(8px);
        }
        
        .sidebar .nav-link:hover:before {
            transform: scaleY(1);
        }
        .sidebar .nav-link.active {
            background: linear-gradient(90deg, rgba(255,255,255,0.15), rgba(255,255,255,0.05));
            color: #fff;
            font-weight: 600;
            transform: translateX(8px);
        }
        
        .sidebar .nav-link.active:before {
            transform: scaleY(1);
            background: #fff;
        }
        /* Main content styles moved to container-fluid */
        
        /* Ensure content doesn't get hidden under fixed sidebar */
        body {
            overflow-x: hidden;
            min-height: 100vh;
            background-color: #f5f7fa;
            font-family: 'Figtree', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            color: #2d3748;
            line-height: 1.6;
            padding: 0 0 0 250px; /* Add left padding to body */
            margin: 0;
            position: relative;
        }
        
        
        /* Card styling for content sections */
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.05);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            margin-bottom: 1.5rem;
            overflow: hidden;
        }
        
        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        }
        
        .card-header {
            background: #fff;
            border-bottom: 1px solid rgba(0,0,0,0.05);
            padding: 1.25rem 1.5rem;
            font-weight: 600;
            color: #2d3748;
        }
        
        .card-body {
            padding: 1.5rem;
        }
        
        /* Mobile styles */
        @media (max-width: 991.98px) {
            body {
                padding-left: 0 !important;
            }
            .sidebar {
                transform: translateX(-100%);
                z-index: 1050;
                width: 280px;
                position: fixed;
                height: 100vh;
                top: 0;
                left: 0;
            }
            .sidebar.show {
                transform: translateX(0);
                box-shadow: 4px 0 15px rgba(0,0,0,0.1);
            }
            .sidebar-backdrop {
                display: block;
                opacity: 0;
                visibility: hidden;
                transition: opacity 0.3s ease, visibility 0.3s ease;
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: rgba(0,0,0,0.5);
                z-index: 999;
                cursor: pointer;
            }
            .sidebar-backdrop.show {
                opacity: 1;
                visibility: visible;
            }
        }
        
        
        @media (max-width: 991.98px) {
            .sidebar-backdrop.show {
                display: block;
            }
        }
        .navbar-brand {
            font-weight: 600;
        }
        .stats-card {
            border-left: 4px solid #007bff;
            transition: transform 0.2s ease;
        }
        .stats-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .image-preview {
            max-width: 200px;
            max-height: 200px;
            object-fit: cover;
            border-radius: 0.375rem;
        }
        .drop-zone {
            border: 2px dashed #ccc;
            border-radius: 0.375rem;
            padding: 2rem;
            text-align: center;
            transition: border-color 0.3s;
        }
        .drop-zone.dragover {
            border-color: #007bff;
            background-color: #f8f9fa;
        }
        .card {
            border: none;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: box-shadow 0.3s ease;
        }
        .card:hover {
            box-shadow: 0 4px 8px rgba(0,0,0,0.15);
        }
        .btn {
            transition: all 0.3s ease;
        }
    </style>

    @stack('styles')
</head>
<body>
    <!-- Mobile Toggle Button -->
    <button class="btn btn-primary d-lg-none position-fixed" id="sidebarToggle" style="z-index: 1001; top: 10px; left: 10px;">
        <i class="fas fa-bars"></i>
    </button>
    
    <!-- Mobile Backdrop -->
    <div class="sidebar-backdrop" id="sidebarBackdrop"></div>
    
    <!-- Sidebar -->
    <nav class="sidebar" id="sidebar">
            <div class="px-4 py-3 mb-4">
                <div class="d-flex align-items-center mb-3">
                    <i class="fas fa-graduation-cap me-3" style="font-size: 1.75rem; color: #fff;"></i>
                    <div>
                        <h5 class="text-white mb-0" style="font-weight: 700; letter-spacing: 0.5px;">BIS CHIANGMAI</h5>
                        <p class="text-white-50 small mb-0" style="opacity: 0.8;">Admin Panel</p>
                    </div>
                </div>
                
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('admin.dashboard') }}">
                            <i class="fas fa-tachometer-alt me-2"></i>
                            Dashboard
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.content.index') }}">
                            <i class="fas fa-edit me-2"></i>
                            Content Management
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.debug-content') }}">
                            <i class="fas fa-bug me-2"></i>
                            Debug Content
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.news.*') ? 'active' : '' }}" 
                           href="{{ route('admin.news.index') }}">
                            <i class="fas fa-newspaper me-2"></i>
                            News Management
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}" 
                           href="{{ route('admin.gallery.index') }}">
                            <i class="fas fa-images me-2"></i>
                            Gallery Management
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.site-images.*') ? 'active' : '' }}" 
                           href="{{ route('admin.site-images.index') }}">
                            <i class="fas fa-image me-2"></i>
                            Site Images
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.staff.*') ? 'active' : '' }}" 
                           href="{{ route('admin.staff.index') }}">
                            <i class="fas fa-users me-2"></i>
                            Teacher Page Content
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.programs.*') ? 'active' : '' }}" 
                           href="{{ route('admin.programs.index') }}">
                            <i class="fas fa-list-alt me-2"></i>
                            Programs Management
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}" 
                           href="{{ route('admin.users.index') }}">
                            <i class="fas fa-users me-2"></i>
                            User Management
                        </a>
                    </li>
                    
                    <hr class="text-white-50">
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}" target="_blank">
                            <i class="fas fa-external-link-alt me-2"></i>
                            View Site
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="nav-link border-0 bg-transparent w-100 text-start">
                                <i class="fas fa-sign-out-alt me-2"></i>
                                Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>

    <!-- Main Content -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @yield('content')

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Initialize when DOM is fully loaded
        document.addEventListener('DOMContentLoaded', function() {
            // File input preview functionality
            function previewImage(input, previewId) {
                if (input.files && input.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const preview = document.getElementById(previewId);
                        if (preview) {
                            preview.src = e.target.result;
                        }
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }

            // Get DOM elements
            const sidebar = document.getElementById('sidebar');
            const sidebarBackdrop = document.getElementById('sidebarBackdrop');
            const sidebarToggle = document.getElementById('sidebarToggle');
            
            // Toggle sidebar function
            const toggleSidebar = () => {
                if (!sidebar) return;
                sidebar.classList.toggle('show');
                if (sidebarBackdrop) {
                    sidebarBackdrop.classList.toggle('show');
                }
                document.body.style.overflow = sidebar.classList.contains('show') ? 'hidden' : '';
            };
            
            // Initialize tooltips
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            tooltipTriggerList.forEach(function(tooltipTriggerEl) {
                new bootstrap.Tooltip(tooltipTriggerEl);
            });
            
            // Set up event listeners if elements exist
            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', function(e) {
                    e.stopPropagation();
                    toggleSidebar();
                });
            }

            if (sidebarBackdrop) {
                sidebarBackdrop.addEventListener('click', toggleSidebar);
            }

            // Close sidebar when clicking on nav links on mobile
            const navLinks = document.querySelectorAll('.sidebar .nav-link');
            navLinks.forEach(link => {
                link.addEventListener('click', function() {
                    if (window.innerWidth < 992) {
                        toggleSidebar();
                    }
                });
            });

            // Setup drop zones
            function setupDropZone(dropZoneId, fileInputId) {
                const dropZone = document.getElementById(dropZoneId);
                const fileInput = document.getElementById(fileInputId);
                
                if (!dropZone || !fileInput) return;

                function preventDefaults(e) {
                    e.preventDefault();
                    e.stopPropagation();
                }

                function highlight() {
                    dropZone.classList.add('dragover');
                }

                function unhighlight() {
                    dropZone.classList.remove('dragover');
                }

                function handleDrop(e) {
                    const dt = e.dataTransfer;
                    const files = dt.files;
                    
                    if (files.length > 0) {
                        fileInput.files = files;
                        const event = new Event('change', { bubbles: true });
                        fileInput.dispatchEvent(event);
                    }
                }

                ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                    dropZone.addEventListener(eventName, preventDefaults, false);
                    document.body.addEventListener(eventName, preventDefaults, false);
                });

                ['dragenter', 'dragover'].forEach(eventName => {
                    dropZone.addEventListener(eventName, highlight, false);
                });

                ['dragleave', 'drop'].forEach(eventName => {
                    dropZone.addEventListener(eventName, unhighlight, false);
                });

                dropZone.addEventListener('drop', handleDrop, false);
                dropZone.addEventListener('click', () => fileInput.click());
            }

            // Setup common drop zones
            setupDropZone('imageDropZone', 'imageInput');

            // Update custom file input label
            const fileInputs = document.querySelectorAll('.custom-file-input');
            fileInputs.forEach(function(input) {
                input.addEventListener('change', function(e) {
                    const fileName = e.target.files[0] ? e.target.files[0].name : 'Choose file';
                    const nextSibling = e.target.nextElementSibling;
                    if (nextSibling && nextSibling.classList.contains('custom-file-label')) {
                        nextSibling.innerText = fileName;
                    }
                });
            });
        });
    </script>

    @stack('scripts')
</body>
</html>
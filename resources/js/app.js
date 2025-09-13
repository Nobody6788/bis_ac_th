import './bootstrap';

import Alpine from 'alpinejs';
import './translations.js';
import './hero-slider.js';
import './photo-gallery-slider.js';

// Initialize Alpine.js
window.Alpine = Alpine;

// Create a store for language management
Alpine.store('language', {
    current: localStorage.getItem('preferredLanguage') || 'en',
    
    change(lang) {
        this.current = lang;
        localStorage.setItem('preferredLanguage', lang);
        document.documentElement.lang = lang;
        
        // Dispatch a custom event that other components can listen to
        window.dispatchEvent(new CustomEvent('language-changed', { detail: { language: lang } }));
        
        // You can add AJAX call here to update the language on the server side if needed
        fetch('/change-language', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ language: lang })
        }).then(response => {
            if (response.redirected) {
                window.location.href = response.url;
            }
        });
    }
});

Alpine.start();

// About BIS Dropdown functionality
document.addEventListener('DOMContentLoaded', function() {
    const aboutDropdownButton = document.getElementById('about-dropdown');
    const aboutMenu = document.getElementById('about-menu');
    
    if (aboutDropdownButton && aboutMenu) {
        // Toggle dropdown on button click
        aboutDropdownButton.addEventListener('click', function(e) {
            e.preventDefault();
            aboutMenu.classList.toggle('hidden');
        });
        
        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            if (!aboutDropdownButton.contains(e.target) && !aboutMenu.contains(e.target)) {
                aboutMenu.classList.add('hidden');
            }
        });
        
        // Close dropdown on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                aboutMenu.classList.add('hidden');
            }
        });
    }
    
    // Notice Board Dropdown functionality
    const noticeDropdownButton = document.getElementById('notice-dropdown');
    const noticeMenu = document.getElementById('notice-menu');
    
    if (noticeDropdownButton && noticeMenu) {
        // Toggle dropdown on button click
        noticeDropdownButton.addEventListener('click', function(e) {
            e.preventDefault();
            noticeMenu.classList.toggle('hidden');
        });
        
        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            if (!noticeDropdownButton.contains(e.target) && !noticeMenu.contains(e.target)) {
                noticeMenu.classList.add('hidden');
            }
        });
        
        // Close dropdown on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                noticeMenu.classList.add('hidden');
            }
        });
    }
    
    // Mobile About BIS Dropdown for guests
    const mobileAboutDropdownButton = document.getElementById('mobile-about-dropdown');
    const mobileAboutMenu = document.getElementById('mobile-about-menu');
    
    if (mobileAboutDropdownButton && mobileAboutMenu) {
        mobileAboutDropdownButton.addEventListener('click', function(e) {
            e.preventDefault();
            mobileAboutMenu.classList.toggle('hidden');
        });
    }
    
    // Mobile About BIS Dropdown for authenticated users
    const mobileAboutDropdownButtonAuth = document.getElementById('mobile-about-dropdown-auth');
    const mobileAboutMenuAuth = document.getElementById('mobile-about-menu-auth');
    
    if (mobileAboutDropdownButtonAuth && mobileAboutMenuAuth) {
        mobileAboutDropdownButtonAuth.addEventListener('click', function(e) {
            e.preventDefault();
            mobileAboutMenuAuth.classList.toggle('hidden');
        });
    }
    
    // Mobile Notice Board Dropdown for guests
    const mobileNoticeDropdownButton = document.getElementById('mobile-notice-dropdown');
    const mobileNoticeMenu = document.getElementById('mobile-notice-menu');
    
    if (mobileNoticeDropdownButton && mobileNoticeMenu) {
        mobileNoticeDropdownButton.addEventListener('click', function(e) {
            e.preventDefault();
            mobileNoticeMenu.classList.toggle('hidden');
        });
    }
    
    // Mobile Notice Board Dropdown for authenticated users
    const mobileNoticeDropdownButtonAuth = document.getElementById('mobile-notice-dropdown-auth');
    const mobileNoticeMenuAuth = document.getElementById('mobile-notice-menu-auth');
    
    if (mobileNoticeDropdownButtonAuth && mobileNoticeMenuAuth) {
        mobileNoticeDropdownButtonAuth.addEventListener('click', function(e) {
            e.preventDefault();
            mobileNoticeMenuAuth.classList.toggle('hidden');
        });
    }
});

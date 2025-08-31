import './bootstrap';
import './translations.js';

// Application functionality
document.addEventListener('DOMContentLoaded', function() {
    // Smooth scrolling for anchor links
    const anchorLinks = document.querySelectorAll('a[href^="#"]');
    anchorLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
    
    // Intersection Observer for fade-in animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('fade-in-up');
            }
        });
    }, observerOptions);
    
    // Observe all elements with the 'animate-on-scroll' class
    document.querySelectorAll('.animate-on-scroll').forEach(el => {
        observer.observe(el);
    });
    
    // Gallery lightbox functionality
    const galleryImages = document.querySelectorAll('.gallery-image');
    galleryImages.forEach(img => {
        img.addEventListener('click', function() {
            // Basic lightbox functionality - can be enhanced with a library
            const lightbox = document.createElement('div');
            lightbox.className = 'fixed inset-0 bg-black bg-opacity-90 flex items-center justify-center z-50';
            lightbox.innerHTML = `
                <div class="relative max-w-4xl max-h-full p-4">
                    <img src="${this.src}" alt="${this.alt}" class="max-w-full max-h-full object-contain">
                    <button class="absolute top-4 right-4 text-white text-2xl font-bold hover:text-gray-300">&times;</button>
                </div>
            `;
            
            document.body.appendChild(lightbox);
            
            lightbox.addEventListener('click', function(e) {
                if (e.target === lightbox || e.target.textContent === '×') {
                    document.body.removeChild(lightbox);
                }
            });
        });
    });
    
    // Hero Slider functionality
    initHeroSlider();
});

// Hero Slider Implementation
function initHeroSlider() {
    const sliderWrapper = document.querySelector('.hero-slider-wrapper');
    const slides = document.querySelectorAll('.hero-slide');
    const dots = document.querySelectorAll('.hero-dot');
    const prevBtn = document.querySelector('.hero-prev');
    const nextBtn = document.querySelector('.hero-next');
    
    if (!sliderWrapper || !slides.length) return;
    
    let currentSlide = 0;
    let isTransitioning = false;
    let autoSlideInterval;
    
    // Initialize first slide
    updateSlider();
    startAutoSlide();
    
    // Previous slide
    if (prevBtn) {
        prevBtn.addEventListener('click', () => {
            if (isTransitioning) return;
            currentSlide = currentSlide === 0 ? slides.length - 1 : currentSlide - 1;
            updateSlider();
            resetAutoSlide();
        });
    }
    
    // Next slide
    if (nextBtn) {
        nextBtn.addEventListener('click', () => {
            if (isTransitioning) return;
            currentSlide = currentSlide === slides.length - 1 ? 0 : currentSlide + 1;
            updateSlider();
            resetAutoSlide();
        });
    }
    
    // Dot navigation
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            if (isTransitioning || index === currentSlide) return;
            currentSlide = index;
            updateSlider();
            resetAutoSlide();
        });
    });
    
    // Update slider position and active states
    function updateSlider() {
        if (isTransitioning) return;
        
        isTransitioning = true;
        
        // Move slider
        const translateX = -currentSlide * 25; // Each slide is 25% wide
        sliderWrapper.style.transform = `translateX(${translateX}%)`;
        
        // Update dots
        dots.forEach((dot, index) => {
            dot.classList.toggle('active', index === currentSlide);
        });
        
        // Update slide states
        slides.forEach((slide, index) => {
            slide.classList.toggle('active', index === currentSlide);
        });
        
        // Reset transition flag after animation completes
        setTimeout(() => {
            isTransitioning = false;
        }, 600); // Match CSS transition duration
    }
    
    // Auto-slide functionality
    function startAutoSlide() {
        autoSlideInterval = setInterval(() => {
            if (!isTransitioning) {
                currentSlide = currentSlide === slides.length - 1 ? 0 : currentSlide + 1;
                updateSlider();
            }
        }, 4000); // Change slide every 4 seconds
    }
    
    function resetAutoSlide() {
        clearInterval(autoSlideInterval);
        startAutoSlide();
    }
    
    // Pause auto-slide on hover
    const sliderContainer = document.querySelector('.hero-slider-container');
    if (sliderContainer) {
        sliderContainer.addEventListener('mouseenter', () => {
            clearInterval(autoSlideInterval);
        });
        
        sliderContainer.addEventListener('mouseleave', () => {
            startAutoSlide();
        });
    }
    
    // Keyboard navigation
    document.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowLeft' && !isTransitioning) {
            currentSlide = currentSlide === 0 ? slides.length - 1 : currentSlide - 1;
            updateSlider();
            resetAutoSlide();
        } else if (e.key === 'ArrowRight' && !isTransitioning) {
            currentSlide = currentSlide === slides.length - 1 ? 0 : currentSlide + 1;
            updateSlider();
            resetAutoSlide();
        }
    });
}

// Photo Gallery Slider for Homepage
class PhotoGallerySlider {
    constructor(container) {
        this.container = container;
        this.slider = container.querySelector('.photo-gallery-slider');
        this.slides = container.querySelectorAll('.photo-gallery-slide');
        this.indicators = container.querySelectorAll('.slide-indicator');
        this.progressBar = container.querySelector('.progress-bar');
        this.currentSlide = 0;
        this.totalSlides = this.slides.length;
        this.isAutoPlaying = true;
        this.autoPlayInterval = null;
        this.progressInterval = null;
        this.slideInterval = 4000; // 4 seconds per slide
        this.progressStep = 100 / (this.slideInterval / 50); // Update progress every 50ms
        this.progressValue = 0;
        
        this.init();
    }
    
    init() {
        if (this.totalSlides === 0) return;
        
        this.setupSlider();
        this.setupIndicators();
        this.startAutoPlay();
        this.addEventListeners();
    }
    
    setupSlider() {
        // Set initial position
        this.updateSliderPosition();
        
        // Show first slide
        this.slides[0].classList.add('active');
        
        // Start progress bar
        this.resetProgress();
    }
    
    setupIndicators() {
        // Add click listeners to indicators
        this.indicators.forEach((indicator, index) => {
            indicator.addEventListener('click', () => {
                this.goToSlide(index);
            });
        });
    }
    
    updateSliderPosition() {
        if (this.slider) {
            this.slider.style.transform = `translateX(-${this.currentSlide * 100}%)`;
        }
    }
    
    updateIndicators() {
        this.indicators.forEach((indicator, index) => {
            if (index === this.currentSlide) {
                indicator.classList.remove('bg-gray-300', 'hover:bg-gray-400');
                indicator.classList.add('bg-[--color-school-blue]', 'scale-125');
            } else {
                indicator.classList.remove('bg-[--color-school-blue]', 'scale-125');
                indicator.classList.add('bg-gray-300', 'hover:bg-gray-400');
            }
        });
    }
    
    resetProgress() {
        this.progressValue = 0;
        if (this.progressBar) {
            this.progressBar.style.width = '0%';
        }
    }
    
    startProgressBar() {
        this.resetProgress();
        
        if (this.progressInterval) {
            clearInterval(this.progressInterval);
        }
        
        this.progressInterval = setInterval(() => {
            if (this.isAutoPlaying) {
                this.progressValue += this.progressStep;
                
                if (this.progressBar) {
                    this.progressBar.style.width = `${Math.min(this.progressValue, 100)}%`;
                }
                
                if (this.progressValue >= 100) {
                    clearInterval(this.progressInterval);
                }
            }
        }, 50);
    }
    
    nextSlide() {
        this.slides[this.currentSlide].classList.remove('active');
        this.currentSlide = (this.currentSlide + 1) % this.totalSlides;
        this.slides[this.currentSlide].classList.add('active');
        this.updateSliderPosition();
        this.updateIndicators();
        this.startProgressBar();
    }
    
    prevSlide() {
        this.slides[this.currentSlide].classList.remove('active');
        this.currentSlide = (this.currentSlide - 1 + this.totalSlides) % this.totalSlides;
        this.slides[this.currentSlide].classList.add('active');
        this.updateSliderPosition();
        this.updateIndicators();
        this.startProgressBar();
    }
    
    goToSlide(index) {
        if (index === this.currentSlide || index < 0 || index >= this.totalSlides) return;
        
        this.slides[this.currentSlide].classList.remove('active');
        this.currentSlide = index;
        this.slides[this.currentSlide].classList.add('active');
        this.updateSliderPosition();
        this.updateIndicators();
        this.startProgressBar();
        
        // Reset auto-play timer
        this.stopAutoPlay();
        this.startAutoPlay();
    }
    
    startAutoPlay() {
        if (this.totalSlides <= 1) return;
        
        this.startProgressBar();
        
        this.autoPlayInterval = setInterval(() => {
            if (this.isAutoPlaying) {
                this.nextSlide();
            }
        }, this.slideInterval);
    }
    
    stopAutoPlay() {
        if (this.autoPlayInterval) {
            clearInterval(this.autoPlayInterval);
            this.autoPlayInterval = null;
        }
        
        if (this.progressInterval) {
            clearInterval(this.progressInterval);
            this.progressInterval = null;
        }
    }
    
    pauseAutoPlay() {
        this.isAutoPlaying = false;
    }
    
    resumeAutoPlay() {
        this.isAutoPlaying = true;
    }
    
    addEventListeners() {
        // Pause auto-play on hover
        this.container.addEventListener('mouseenter', () => {
            this.pauseAutoPlay();
        });
        
        this.container.addEventListener('mouseleave', () => {
            this.resumeAutoPlay();
        });
        
        // Handle visibility change (pause when tab is not active)
        document.addEventListener('visibilitychange', () => {
            if (document.hidden) {
                this.pauseAutoPlay();
            } else {
                this.resumeAutoPlay();
            }
        });
        
        // Touch/swipe support for mobile
        let startX = 0;
        let endX = 0;
        
        this.container.addEventListener('touchstart', (e) => {
            startX = e.touches[0].clientX;
            this.pauseAutoPlay();
        });
        
        this.container.addEventListener('touchmove', (e) => {
            endX = e.touches[0].clientX;
        });
        
        this.container.addEventListener('touchend', () => {
            const diff = startX - endX;
            const threshold = 50;
            
            if (Math.abs(diff) > threshold) {
                if (diff > 0) {
                    this.nextSlide();
                } else {
                    this.prevSlide();
                }
            }
            
            this.resumeAutoPlay();
        });
        
        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (this.container.matches(':hover') || this.container.contains(document.activeElement)) {
                if (e.key === 'ArrowLeft') {
                    e.preventDefault();
                    this.prevSlide();
                } else if (e.key === 'ArrowRight') {
                    e.preventDefault();
                    this.nextSlide();
                }
            }
        });
    }
    
    destroy() {
        this.stopAutoPlay();
        // Remove event listeners if needed
    }
}

// Initialize the photo gallery slider when DOM is ready
document.addEventListener('DOMContentLoaded', function() {
    const galleryContainer = document.querySelector('.photo-gallery-container');
    if (galleryContainer) {
        window.photoGallerySlider = new PhotoGallerySlider(galleryContainer);
    }
});

// Handle page visibility change
document.addEventListener('visibilitychange', function() {
    if (window.photoGallerySlider) {
        if (document.hidden) {
            window.photoGallerySlider.pauseAutoPlay();
        } else {
            window.photoGallerySlider.resumeAutoPlay();
        }
    }
});
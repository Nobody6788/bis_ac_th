// Hero Slider Auto-slide Functionality
class HeroSlider {
    constructor() {
        this.currentSlide = 0;
        this.totalSlides = 4;
        this.autoSlideInterval = null;
        this.autoSlideDelay = 5000; // 5 seconds
        this.isUserInteracting = false;
        this.init();
    }

    init() {
        // Wait for DOM to be fully loaded
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', () => this.setupSlider());
        } else {
            this.setupSlider();
        }
    }

    setupSlider() {
        this.sliderWrapper = document.querySelector('.hero-slider-wrapper');
        this.dots = document.querySelectorAll('.hero-dot');
        this.prevButton = document.querySelector('.hero-prev');
        this.nextButton = document.querySelector('.hero-next');
        this.sliderContainer = document.querySelector('.hero-slider-container');

        if (!this.sliderWrapper || !this.dots.length) {
            console.log('Hero slider elements not found');
            return;
        }

        console.log('Hero slider initialized');
        
        // Set up event listeners
        this.setupEventListeners();
        
        // Initialize first dot as active
        this.updateActiveDot();
        
        // Start auto-slide
        this.startAutoSlide();
    }

    setupEventListeners() {
        // Dot navigation
        this.dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                this.goToSlide(index);
                this.resetAutoSlide();
            });
        });

        // Arrow navigation
        if (this.prevButton) {
            this.prevButton.addEventListener('click', () => {
                this.previousSlide();
                this.resetAutoSlide();
            });
        }

        if (this.nextButton) {
            this.nextButton.addEventListener('click', () => {
                this.nextSlide();
                this.resetAutoSlide();
            });
        }

        // Pause auto-slide on hover
        if (this.sliderContainer) {
            this.sliderContainer.addEventListener('mouseenter', () => {
                this.stopAutoSlide();
                this.isUserInteracting = true;
            });

            this.sliderContainer.addEventListener('mouseleave', () => {
                this.isUserInteracting = false;
                this.startAutoSlide();
            });
        }

        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (this.isSliderVisible()) {
                if (e.key === 'ArrowLeft') {
                    this.previousSlide();
                    this.resetAutoSlide();
                } else if (e.key === 'ArrowRight') {
                    this.nextSlide();
                    this.resetAutoSlide();
                }
            }
        });

        // Pause on tab focus (accessibility)
        document.addEventListener('visibilitychange', () => {
            if (document.hidden) {
                this.stopAutoSlide();
            } else if (!this.isUserInteracting) {
                this.startAutoSlide();
            }
        });
    }

    isSliderVisible() {
        if (!this.sliderContainer) return false;
        const rect = this.sliderContainer.getBoundingClientRect();
        return rect.top < window.innerHeight && rect.bottom > 0;
    }

    goToSlide(index) {
        if (index < 0 || index >= this.totalSlides) return;
        
        this.currentSlide = index;
        this.updateSliderPosition();
        this.updateActiveDot();
        
        console.log(`Switched to slide ${index + 1}`);
    }

    nextSlide() {
        const nextIndex = (this.currentSlide + 1) % this.totalSlides;
        this.goToSlide(nextIndex);
    }

    previousSlide() {
        const prevIndex = (this.currentSlide - 1 + this.totalSlides) % this.totalSlides;
        this.goToSlide(prevIndex);
    }

    updateSliderPosition() {
        if (!this.sliderWrapper) return;
        
        const translateX = -this.currentSlide * 100;
        this.sliderWrapper.style.transform = `translateX(${translateX}%)`;
    }

    updateActiveDot() {
        this.dots.forEach((dot, index) => {
            if (index === this.currentSlide) {
                dot.classList.remove('bg-opacity-50');
                dot.classList.add('bg-opacity-100', 'ring-2', 'ring-white', 'ring-opacity-50');
            } else {
                dot.classList.add('bg-opacity-50');
                dot.classList.remove('bg-opacity-100', 'ring-2', 'ring-white', 'ring-opacity-50');
            }
        });
    }

    startAutoSlide() {
        if (this.autoSlideInterval) return; // Already running
        
        this.autoSlideInterval = setInterval(() => {
            if (!this.isUserInteracting && this.isSliderVisible()) {
                this.nextSlide();
            }
        }, this.autoSlideDelay);
        
        console.log('Auto-slide started');
    }

    stopAutoSlide() {
        if (this.autoSlideInterval) {
            clearInterval(this.autoSlideInterval);
            this.autoSlideInterval = null;
            console.log('Auto-slide stopped');
        }
    }

    resetAutoSlide() {
        this.stopAutoSlide();
        // Restart auto-slide after a brief delay to give user time to interact
        setTimeout(() => {
            if (!this.isUserInteracting) {
                this.startAutoSlide();
            }
        }, 1000);
    }

    // Public method to pause auto-slide (can be called from outside)
    pause() {
        this.stopAutoSlide();
        this.isUserInteracting = true;
    }

    // Public method to resume auto-slide
    resume() {
        this.isUserInteracting = false;
        this.startAutoSlide();
    }
}

// Initialize hero slider when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    window.heroSlider = new HeroSlider();
});

export default HeroSlider;
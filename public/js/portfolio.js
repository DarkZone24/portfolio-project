/**
 * Portfolio JavaScript - Interactive Features and Animations
 * Author: Mark Alexis Macarilay
 */

(function() {
    'use strict';

    // DOM Content Loaded Event
    document.addEventListener('DOMContentLoaded', function() {
        initializePortfolio();
    });

    function initializePortfolio() {
        // Initialize all features
        initSmoothScrolling();
        initNavbarScrollEffect();
        initTypingAnimation();
        initScrollAnimations();
        initContactForm();
        initMobileMenu();
        initParallaxEffect();
        initSkillsAnimation();
        initPreloader();
        initThemeToggle();
    }

    // Smooth Scrolling for Navigation Links
    function initSmoothScrolling() {
        const navLinks = document.querySelectorAll('.navbar ul li a[href^="#"]');
        
        navLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href').substring(1);
                const targetElement = document.getElementById(targetId);
                
                if (targetElement) {
                    targetElement.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                    
                    // Update active nav item
                    updateActiveNavItem(this);
                }
            });
        });
    }

    // Update Active Navigation Item
    function updateActiveNavItem(activeLink) {
        document.querySelectorAll('.navbar ul li a').forEach(link => {
            link.parentElement.classList.remove('active');
        });
        activeLink.parentElement.classList.add('active');
    }

    // Navbar Scroll Effect
    function initNavbarScrollEffect() {
        const navbar = document.querySelector('.navbar');
        let lastScrollY = window.scrollY;

        window.addEventListener('scroll', () => {
            const currentScrollY = window.scrollY;
            
            if (currentScrollY > 100) {
                navbar.classList.add('navbar-scrolled');
            } else {
                navbar.classList.remove('navbar-scrolled');
            }

            // Hide/Show navbar on scroll
            if (currentScrollY > lastScrollY && currentScrollY > 200) {
                navbar.style.transform = 'translateY(-100%)';
            } else {
                navbar.style.transform = 'translateY(0)';
            }
            
            lastScrollY = currentScrollY;
            
            // Update active section in navigation
            updateActiveSection();
        });
    }

    // Update Active Section Based on Scroll Position
    function updateActiveSection() {
        const sections = document.querySelectorAll('section[id], div[id]');
        const navLinks = document.querySelectorAll('.navbar ul li a');
        
        let currentSection = '';
        
        sections.forEach(section => {
            const sectionTop = section.offsetTop - 150;
            const sectionHeight = section.offsetHeight;
            
            if (window.scrollY >= sectionTop && window.scrollY < sectionTop + sectionHeight) {
                currentSection = section.getAttribute('id');
            }
        });
        
        navLinks.forEach(link => {
            link.parentElement.classList.remove('active');
            if (link.getAttribute('href') === `#${currentSection}`) {
                link.parentElement.classList.add('active');
            }
        });
    }

    // Typing Animation for Main Title
    function initTypingAnimation() {
        const titleElement = document.querySelector('.content h1');
        if (!titleElement) return;
        
        const originalText = titleElement.textContent;
        const words = originalText.split(' ');
        let currentWordIndex = 0;
        let currentText = '';
        let isDeleting = false;
        
        function typeWriter() {
            const currentWord = words[currentWordIndex];
            
            if (isDeleting) {
                currentText = currentWord.substring(0, currentText.length - 1);
            } else {
                currentText = currentWord.substring(0, currentText.length + 1);
            }
            
            // Create HTML with line break for "name is"
            let displayText = '';
            if (currentWordIndex >= 4) { // "Hi! My name is"
                displayText = words.slice(0, 4).join(' ') + '<br>' + words.slice(4).join(' ');
            } else {
                displayText = words.slice(0, currentWordIndex).join(' ') + ' ' + currentText;
            }
            
            titleElement.innerHTML = displayText + '<span class="cursor">|</span>';
            
            let typeSpeed = isDeleting ? 50 : 100;
            
            if (!isDeleting && currentText === currentWord) {
                typeSpeed = 2000; // Wait at end
                isDeleting = true;
            } else if (isDeleting && currentText === '') {
                isDeleting = false;
                currentWordIndex = (currentWordIndex + 1) % words.length;
                typeSpeed = 500;
            }
            
            setTimeout(typeWriter, typeSpeed);
        }
        
        // Add cursor CSS
        const style = document.createElement('style');
        style.textContent = `
            .cursor {
                opacity: 1;
                animation: blink 1s infinite;
            }
            @keyframes blink {
                0%, 50% { opacity: 1; }
                51%, 100% { opacity: 0; }
            }
        `;
        document.head.appendChild(style);
        
        // Start typing animation after a delay
        setTimeout(() => {
            titleElement.innerHTML = originalText; // Reset to original for now
            // typeWriter(); // Uncomment to enable typing effect
        }, 1000);
    }

    // Scroll Animations
    function initScrollAnimations() {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-in');
                }
            });
        }, observerOptions);

        // Observe all animation elements
        const animateElements = document.querySelectorAll('.card, .img, .about-text, .service-text h2, .title h2');
        animateElements.forEach(el => {
            el.classList.add('animate-element');
            observer.observe(el);
        });

        // Add CSS for animations
        const animationStyles = `
            .animate-element {
                opacity: 0;
                transform: translateY(30px);
                transition: all 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            }
            .animate-element.animate-in {
                opacity: 1;
                transform: translateY(0);
            }
            .navbar {
                transition: all 0.3s ease;
            }
            .navbar-scrolled {
                background-color: rgba(25, 25, 25, 0.95);
                backdrop-filter: blur(10px);
                box-shadow: 0 2px 20px rgba(0, 171, 240, 0.1);
            }
        `;
        
        const styleSheet = document.createElement('style');
        styleSheet.textContent = animationStyles;
        document.head.appendChild(styleSheet);
    }

    // Contact Form Enhancement
    function initContactForm() {
        const contactForms = document.querySelectorAll('form');
        
        contactForms.forEach(form => {
            form.addEventListener('submit', function(e) {
                if (this.action.includes('contact')) {
                    handleContactFormSubmission(e, this);
                }
            });
        });
    }

    function handleContactFormSubmission(e, form) {
        e.preventDefault();
        
        // Show loading state
        const submitButton = form.querySelector('button[type="submit"], button');
        const originalText = submitButton.textContent;
        
        submitButton.textContent = 'Sending...';
        submitButton.disabled = true;
        
        // Simulate form submission (replace with actual AJAX call)
        setTimeout(() => {
            showNotification('Message sent successfully! I will get back to you soon.', 'success');
            form.reset();
            submitButton.textContent = originalText;
            submitButton.disabled = false;
        }, 2000);
    }

    // Mobile Menu Toggle
    function initMobileMenu() {
        // Create mobile menu toggle button
        const navbar = document.querySelector('.navbar');
        const mobileToggle = document.createElement('div');
        mobileToggle.className = 'mobile-menu-toggle';
        mobileToggle.innerHTML = '<span></span><span></span><span></span>';
        
        navbar.appendChild(mobileToggle);
        
        const navUl = navbar.querySelector('ul');
        
        mobileToggle.addEventListener('click', function() {
            this.classList.toggle('active');
            navUl.classList.toggle('mobile-active');
        });
        
        // Close mobile menu when clicking on links
        const mobileLinks = navUl.querySelectorAll('a');
        mobileLinks.forEach(link => {
            link.addEventListener('click', () => {
                mobileToggle.classList.remove('active');
                navUl.classList.remove('mobile-active');
            });
        });
        
        // Add mobile menu styles
        const mobileStyles = `
            .mobile-menu-toggle {
                display: none;
                flex-direction: column;
                cursor: pointer;
                padding: 5px;
            }
            .mobile-menu-toggle span {
                width: 25px;
                height: 3px;
                background-color: #fff;
                margin: 3px 0;
                transition: 0.3s;
            }
            .mobile-menu-toggle.active span:nth-child(1) {
                transform: rotate(-45deg) translate(-5px, 6px);
            }
            .mobile-menu-toggle.active span:nth-child(2) {
                opacity: 0;
            }
            .mobile-menu-toggle.active span:nth-child(3) {
                transform: rotate(45deg) translate(-5px, -6px);
            }
            
            @media (max-width: 768px) {
                .mobile-menu-toggle {
                    display: flex;
                }
                .navbar ul {
                    position: fixed;
                    top: 80px;
                    left: -100%;
                    width: 100%;
                    height: calc(100vh - 80px);
                    background-color: rgba(25, 25, 25, 0.95);
                    flex-direction: column;
                    justify-content: flex-start;
                    align-items: center;
                    transition: 0.3s;
                    padding-top: 50px;
                }
                .navbar ul.mobile-active {
                    left: 0;
                }
                .navbar ul li {
                    margin: 20px 0;
                }
            }
        `;
        
        const mobileStyleSheet = document.createElement('style');
        mobileStyleSheet.textContent = mobileStyles;
        document.head.appendChild(mobileStyleSheet);
    }

    // Parallax Effect for Banner
    function initParallaxEffect() {
        const banner = document.querySelector('.banner');
        
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const parallax = scrolled * 0.5;
            
            if (banner) {
                banner.style.transform = `translateY(${parallax}px)`;
            }
        });
    }

    // Skills Animation
    function initSkillsAnimation() {
        const skillCards = document.querySelectorAll('.img');
        
        skillCards.forEach((card, index) => {
            card.style.animationDelay = `${index * 0.2}s`;
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-10px) scale(1.02)';
                this.style.transition = 'all 0.3s ease';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });
    }

    // Preloader
    function initPreloader() {
        // Create preloader
        const preloader = document.createElement('div');
        preloader.className = 'preloader';
        preloader.innerHTML = `
            <div class="loader">
                <div class="loader-circle"></div>
                <div class="loader-text">Loading Portfolio...</div>
            </div>
        `;
        
        document.body.appendChild(preloader);
        
        // Preloader styles
        const preloaderStyles = `
            .preloader {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: #101010;
                display: flex;
                justify-content: center;
                align-items: center;
                z-index: 9999;
                transition: opacity 0.5s ease;
            }
            .loader {
                text-align: center;
            }
            .loader-circle {
                width: 50px;
                height: 50px;
                border: 3px solid #333;
                border-top: 3px solid #00abf0;
                border-radius: 50%;
                animation: spin 1s linear infinite;
                margin: 0 auto 20px;
            }
            .loader-text {
                color: #fff;
                font-size: 18px;
            }
            @keyframes spin {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
            }
        `;
        
        const preloaderStyleSheet = document.createElement('style');
        preloaderStyleSheet.textContent = preloaderStyles;
        document.head.appendChild(preloaderStyleSheet);
        
        // Hide preloader after page load
        window.addEventListener('load', () => {
            setTimeout(() => {
                preloader.style.opacity = '0';
                setTimeout(() => {
                    preloader.remove();
                }, 500);
            }, 1000);
        });
    }

    // Theme Toggle (Dark/Light mode)
    function initThemeToggle() {
        const themeToggle = document.createElement('button');
        themeToggle.className = 'theme-toggle';
        themeToggle.innerHTML = '🌙';
        themeToggle.title = 'Toggle Dark/Light Mode';
        
        document.body.appendChild(themeToggle);
        
        // Theme toggle styles
        const themeStyles = `
            .theme-toggle {
                position: fixed;
                top: 20px;
                right: 20px;
                width: 50px;
                height: 50px;
                border-radius: 50%;
                border: 2px solid #00abf0;
                background-color: rgba(25, 25, 25, 0.8);
                color: #00abf0;
                font-size: 20px;
                cursor: pointer;
                z-index: 1000;
                transition: all 0.3s ease;
                backdrop-filter: blur(10px);
            }
            .theme-toggle:hover {
                transform: scale(1.1);
                box-shadow: 0 0 20px rgba(0, 171, 240, 0.5);
            }
        `;
        
        const themeStyleSheet = document.createElement('style');
        themeStyleSheet.textContent = themeStyles;
        document.head.appendChild(themeStyleSheet);
        
        // Toggle functionality (for future implementation)
        themeToggle.addEventListener('click', () => {
            // Future: Implement light/dark theme toggle
            console.log('Theme toggle clicked - feature coming soon!');
        });
    }

    // Notification System
    function showNotification(message, type = 'info') {
        const notification = document.createElement('div');
        notification.className = `notification notification-${type}`;
        notification.textContent = message;
        
        const notificationStyles = `
            .notification {
                position: fixed;
                top: 20px;
                right: 20px;
                padding: 15px 25px;
                border-radius: 5px;
                color: white;
                font-weight: bold;
                z-index: 10000;
                opacity: 0;
                transform: translateX(100%);
                transition: all 0.3s ease;
            }
            .notification-success {
                background-color: #4CAF50;
            }
            .notification-error {
                background-color: #f44336;
            }
            .notification-info {
                background-color: #00abf0;
            }
            .notification.show {
                opacity: 1;
                transform: translateX(0);
            }
        `;
        
        // Add styles if not already added
        if (!document.querySelector('#notification-styles')) {
            const styleSheet = document.createElement('style');
            styleSheet.id = 'notification-styles';
            styleSheet.textContent = notificationStyles;
            document.head.appendChild(styleSheet);
        }
        
        document.body.appendChild(notification);
        
        // Show notification
        setTimeout(() => {
            notification.classList.add('show');
        }, 100);
        
        // Hide notification after 5 seconds
        setTimeout(() => {
            notification.classList.remove('show');
            setTimeout(() => {
                notification.remove();
            }, 300);
        }, 5000);
    }

    // Utility Functions
    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }

    // Performance optimization for scroll events
    const optimizedScrollHandler = debounce(() => {
        // Any additional scroll handling can go here
    }, 10);

    window.addEventListener('scroll', optimizedScrollHandler);

})();
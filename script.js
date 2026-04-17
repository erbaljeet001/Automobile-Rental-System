// script.js - Main JavaScript file for Automobile Rental System

document.addEventListener('DOMContentLoaded', function() {
    // Initialize all components
    initializeFormValidation();
    initializeAnimations();
    initializeDateValidation();
    initializeLoadingStates();
});

// Form Validation System
function initializeFormValidation() {
    const forms = document.querySelectorAll('form');

    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            if (!validateForm(this)) {
                e.preventDefault();
                return false;
            }

            // Show loading state
            showLoadingState(this);
        });

        // Real-time validation
        const inputs = form.querySelectorAll('input, select, textarea');
        inputs.forEach(input => {
            input.addEventListener('blur', function() {
                validateField(this);
            });

            input.addEventListener('input', function() {
                clearFieldError(this);
            });
        });
    });
}

function validateForm(form) {
    let isValid = true;
    const inputs = form.querySelectorAll('input[required], select[required], textarea[required]');

    inputs.forEach(input => {
        if (!validateField(input)) {
            isValid = false;
        }
    });

    // Special validation for booking forms
    if (form.querySelector('input[name="start_date"]')) {
        if (!validateBookingDates(form)) {
            isValid = false;
        }
    }

    return isValid;
}

function validateField(field) {
    const value = field.value.trim();
    let isValid = true;
    let errorMessage = '';

    // Clear previous error
    clearFieldError(field);

    // Required field validation
    if (field.hasAttribute('required') && !value) {
        errorMessage = 'This field is required';
        isValid = false;
    }

    // Email validation
    if (field.type === 'email' && value) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(value)) {
            errorMessage = 'Please enter a valid email address';
            isValid = false;
        }
    }

    // Password validation
    if (field.type === 'password' && value) {
        if (value.length < 6) {
            errorMessage = 'Password must be at least 6 characters long';
            isValid = false;
        }
    }

    // Username validation
    if (field.name === 'username' && value) {
        if (value.length < 3) {
            errorMessage = 'Username must be at least 3 characters long';
            isValid = false;
        }
        if (!/^[a-zA-Z0-9_]+$/.test(value)) {
            errorMessage = 'Username can only contain letters, numbers, and underscores';
            isValid = false;
        }
    }

    if (!isValid) {
        showFieldError(field, errorMessage);
    }

    return isValid;
}

function validateBookingDates(form) {
    const startDate = form.querySelector('input[name="start_date"]');
    const endDate = form.querySelector('input[name="end_date"]');

    if (!startDate || !endDate) return true;

    const start = new Date(startDate.value);
    const end = new Date(endDate.value);
    const today = new Date();
    today.setHours(0, 0, 0, 0);

    let isValid = true;

    // Clear previous date errors
    clearFieldError(startDate);
    clearFieldError(endDate);

    if (start < today) {
        showFieldError(startDate, 'Pickup date cannot be in the past');
        isValid = false;
    }

    if (end < today) {
        showFieldError(endDate, 'Drop-off date cannot be in the past');
        isValid = false;
    }

    if (start >= end) {
        showFieldError(endDate, 'Drop-off date must be after pickup date');
        isValid = false;
    }

    return isValid;
}

function showFieldError(field, message) {
    field.classList.add('error');

    // Create or update error message
    let errorElement = field.parentNode.querySelector('.error-message');
    if (!errorElement) {
        errorElement = document.createElement('div');
        errorElement.className = 'error-message';
        field.parentNode.appendChild(errorElement);
    }
    errorElement.textContent = message;
    errorElement.style.display = 'block';
}

function clearFieldError(field) {
    field.classList.remove('error');
    const errorElement = field.parentNode.querySelector('.error-message');
    if (errorElement) {
        errorElement.style.display = 'none';
    }
}

// Date Validation for Booking Forms
function initializeDateValidation() {
    const startDateInputs = document.querySelectorAll('input[name="start_date"]');
    const endDateInputs = document.querySelectorAll('input[name="end_date"]');

    startDateInputs.forEach(input => {
        input.addEventListener('change', function() {
            const endDateInput = this.closest('form').querySelector('input[name="end_date"]');
            if (endDateInput && endDateInput.value) {
                validateBookingDates(this.closest('form'));
            }
        });
    });

    endDateInputs.forEach(input => {
        input.addEventListener('change', function() {
            validateBookingDates(this.closest('form'));
        });
    });
}

// Animation System
function initializeAnimations() {
    // Add fade-in animation to elements
    const animatedElements = document.querySelectorAll('.car, .Bike, .confirmation-container, .booking-form');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('fade-in');
            }
        });
    }, { threshold: 0.1 });

    animatedElements.forEach(element => {
        observer.observe(element);
    });

    // Smooth scrolling for navigation links
    const navLinks = document.querySelectorAll('nav a[href^="#"]');
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);

            if (targetElement) {
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
}

// Loading States
function initializeLoadingStates() {
    // Add loading class to forms on submit
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function() {
            this.classList.add('loading');
        });
    });
}

function showLoadingState(form) {
    form.classList.add('loading');
    const submitButton = form.querySelector('input[type="submit"], button[type="submit"]');
    if (submitButton) {
        submitButton.disabled = true;
        submitButton.value = submitButton.value + ' ...';
    }
}

// Utility Functions
function showAlert(message, type = 'info') {
    // Remove existing alerts
    const existingAlerts = document.querySelectorAll('.alert');
    existingAlerts.forEach(alert => alert.remove());

    // Create new alert
    const alert = document.createElement('div');
    alert.className = `alert alert-${type}`;
    alert.textContent = message;

    // Insert at top of container
    const container = document.querySelector('.container') || document.body;
    container.insertBefore(alert, container.firstChild);

    // Auto-remove after 5 seconds
    setTimeout(() => {
        if (alert.parentNode) {
            alert.remove();
        }
    }, 5000);
}

// Mobile Menu Toggle (if needed in future)
function toggleMobileMenu() {
    const nav = document.querySelector('nav ul');
    if (nav) {
        nav.classList.toggle('mobile-menu-open');
    }
}

// Add CSS for error states
const style = document.createElement('style');
style.textContent = `
    .error {
        border-color: #dc3545 !important;
        box-shadow: 0 0 0 3px rgba(220, 53, 69, 0.1) !important;
    }

    .error-message {
        color: #dc3545;
        font-size: 0.875rem;
        margin-top: 5px;
        display: none;
    }

    .mobile-menu-open {
        display: flex !important;
        flex-direction: column !important;
        position: absolute !important;
        top: 100% !important;
        left: 0 !important;
        right: 0 !important;
        background: rgba(0, 123, 255, 0.95) !important;
        padding: 20px !important;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2) !important;
    }

    @media (max-width: 768px) {
        nav ul {
            display: none;
        }
    }
`;
document.head.appendChild(style);

// Export functions for potential use in other scripts
window.validateForm = validateForm;
window.showAlert = showAlert;
window.toggleMobileMenu = toggleMobileMenu;
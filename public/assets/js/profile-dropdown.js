// Profile Dropdown JavaScript
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Bootstrap dropdowns
    const dropdownElementList = document.querySelectorAll('.dropdown-toggle');
    if (typeof bootstrap !== 'undefined') {
        const dropdownList = [...dropdownElementList].map(dropdownToggleEl => new bootstrap.Dropdown(dropdownToggleEl));
    }
    
    // Hover and click dropdown
    const profileDropdown = document.querySelector('.profile-dropdown');
    if (profileDropdown) {
        const dropdownToggle = profileDropdown.querySelector('.dropdown-toggle');
        const dropdownMenu = profileDropdown.querySelector('.dropdown-menu');
        
        if (dropdownToggle && dropdownMenu) {
            // Click to toggle
            dropdownToggle.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                profileDropdown.classList.toggle('active');
                dropdownMenu.classList.toggle('show');
            });
            
            // Keep dropdown open on hover
            profileDropdown.addEventListener('mouseenter', function() {
                dropdownMenu.classList.add('show');
                profileDropdown.classList.add('active');
            });
            
            // Close dropdown when mouse leaves
            profileDropdown.addEventListener('mouseleave', function() {
                setTimeout(() => {
                    if (!profileDropdown.matches(':hover')) {
                        dropdownMenu.classList.remove('show');
                        profileDropdown.classList.remove('active');
                    }
                }, 100);
            });
        }
    }
    
    // Close dropdown when clicking outside
    document.addEventListener('click', function(event) {
        const profileDropdown = document.querySelector('.profile-dropdown');
        if (profileDropdown && !profileDropdown.contains(event.target)) {
            const dropdownMenu = profileDropdown.querySelector('.dropdown-menu');
            if (dropdownMenu) {
                dropdownMenu.classList.remove('show');
                profileDropdown.classList.remove('active');
            }
        }
    });
    
    // Handle logout confirmation
    const logoutForms = document.querySelectorAll('.profile-dropdown form');
    logoutForms.forEach(function(form) {
        form.addEventListener('submit', function(e) {
            if (!confirm('Apakah Anda yakin ingin logout?')) {
                e.preventDefault();
            }
        });
    });
    
    // Handle logout button clicks
    const logoutButtons = document.querySelectorAll('.profile-dropdown .dropdown-item[type="submit"]');
    logoutButtons.forEach(function(button) {
        button.addEventListener('click', function(e) {
            if (!confirm('Apakah Anda yakin ingin logout?')) {
                e.preventDefault();
                e.stopPropagation();
            }
        });
    });
});

// Add smooth transitions
document.addEventListener('DOMContentLoaded', function() {
    const style = document.createElement('style');
    style.textContent = `
        .profile-dropdown .dropdown-menu {
            opacity: 0;
            transform: translateY(-10px);
            transition: all 0.3s ease;
            pointer-events: none;
        }
        
        .profile-dropdown .dropdown-menu.show {
            opacity: 1;
            transform: translateY(0);
            pointer-events: auto;
        }
        
        .profile-dropdown .dropdown-toggle.active {
            background: rgba(255, 255, 255, 0.25) !important;
        }
    `;
    document.head.appendChild(style);
});
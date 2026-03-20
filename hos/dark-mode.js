// Add Tailwind Dark mode support
if (typeof tailwind !== 'undefined') {
    tailwind.config = {
        darkMode: 'class',
    }
}

// Initial theme setup (prevent FOUC)
if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    document.documentElement.classList.add('dark');
} else {
    document.documentElement.classList.remove('dark');
}

// Ensure toggle logic binds after DOM is fully loaded
document.addEventListener('DOMContentLoaded', () => {
    // Find all theme toggle buttons (can be multiple if mobile menu has one)
    const themeToggleBtns = document.querySelectorAll('.theme-toggle');

    // Function to update icon
    function updateIcons() {
        themeToggleBtns.forEach(btn => {
            const icon = btn.querySelector('i');
            if(icon) {
                if (document.documentElement.classList.contains('dark')) {
                    icon.classList.remove('fa-moon');
                    icon.classList.add('fa-sun');
                } else {
                    icon.classList.remove('fa-sun');
                    icon.classList.add('fa-moon');
                }
            }
        });
    }

    // Initial icon update
    updateIcons();

    // Toggle logic
    themeToggleBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('color-theme', 'light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('color-theme', 'dark');
            }
            updateIcons();
        });
    });
});

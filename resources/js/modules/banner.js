/**
 * Dynamic Banner / Toast Notification Module
 */

export const showBanner = (message, type = 'success') => {
    // 1. Create or find the banner container
    let container = document.getElementById('banner-container');
    if (!container) {
        container = document.createElement('div');
        container.id = 'banner-container';
        container.className = 'fixed top-4 right-4 z-50 flex flex-col gap-3 items-end pointer-events-none';
        document.body.appendChild(container);
    }

    // 2. Create the banner element
    const banner = document.createElement('div');
    
    // Base classes
    banner.className = 'pointer-events-auto transform transition-all duration-300 translate-x-full opacity-0 flex items-center p-4 mb-2 text-sm rounded-xl shadow-lg shadow-black/5 min-w-[250px] max-w-sm font-outfit';
    
    // Type-specific classes and icons
    let typeClasses = '';
    let iconSvg = '';

    if (type === 'success') {
        typeClasses = 'text-green-800 bg-green-50 border border-green-200';
        iconSvg = `<i class="fa-solid fa-circle-check shrink-0 inline me-3 text-green-600 text-xl"></i>`;
    } else if (type === 'error') {
        typeClasses = 'text-red-800 bg-red-50 border border-red-200';
        iconSvg = `<i class="fa-solid fa-circle-xmark shrink-0 inline me-3 text-red-600 text-xl"></i>`;
    } else {
        // Info or default
        typeClasses = 'text-blue-800 bg-blue-50 border border-blue-200';
        iconSvg = `<i class="fa-solid fa-circle-info shrink-0 inline me-3 text-blue-600 text-xl"></i>`;
    }

    // Combine classes
    banner.className += ` ${typeClasses}`;

    // Structure
    banner.innerHTML = `
        ${iconSvg}
        <div class="font-medium">
            ${message}
        </div>
        <button type="button" class="ml-auto -mx-1.5 -my-1.5 rounded-lg focus:ring-2 focus:ring-slate-400 p-1.5 hover:bg-black/5 inline-flex items-center justify-center h-8 w-8 transition-colors" aria-label="Close">
            <i class="fa-solid fa-xmark text-sm"></i>
        </button>
    `;

    // 3. Append to container
    container.appendChild(banner);

    // 4. Animate In (trigger reflow first)
    requestAnimationFrame(() => {
        banner.classList.remove('translate-x-full', 'opacity-0');
        banner.classList.add('translate-x-0', 'opacity-100');
    });

    // 5. Close button logic
    const closeBtn = banner.querySelector('button');
    const closeBanner = () => {
        // Animate Out
        banner.classList.remove('translate-x-0', 'opacity-100');
        banner.classList.add('translate-x-full', 'opacity-0');
        
        // Remove from DOM after animation
        setTimeout(() => {
            if (banner.parentElement) {
                banner.remove();
            }
        }, 300); // 300ms matches Tailwind duration-300
    };

    closeBtn.addEventListener('click', closeBanner);

    // 6. Auto-remove after 4 seconds
    setTimeout(() => {
        closeBanner();
    }, 4000);
};

// Make it available globally so it can be called from anywhere
window.showBanner = showBanner;

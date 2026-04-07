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
        iconSvg = `<svg class="shrink-0 inline w-5 h-5 me-3 text-green-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
        </svg>`;
    } else if (type === 'error') {
        typeClasses = 'text-red-800 bg-red-50 border border-red-200';
        iconSvg = `<svg class="shrink-0 inline w-5 h-5 me-3 text-red-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
        </svg>`;
    } else {
        // Info or default
        typeClasses = 'text-blue-800 bg-blue-50 border border-blue-200';
        iconSvg = `<svg class="shrink-0 inline w-5 h-5 me-3 text-blue-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>`;
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
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
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

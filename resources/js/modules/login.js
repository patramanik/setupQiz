/**
 * Login Module - Vanilla JS (ES6+)
 */

export const initLogin = () => {
    // 1. Select the form (make sure to use a specific selector so it doesn't run on other pages)
    const loginForm = document.querySelector('form[action="/login"]');

    // 2. If the form doesn't exist, we aren't on the login page, so exit early
    if (!loginForm) return;

    console.log("Login module initialized");

    // 3. Select fields for interaction
    const emailInput = document.getElementById("email");
    const passwordInput = document.getElementById("password");
    const submitBtn = loginForm.querySelector('button[type="submit"]');

    // Example feature: Add event listeners
    loginForm.addEventListener("submit", (e) => {
        // e.preventDefault(); // Uncomment if you want to handle submission via Ajax

        // Show loading state on button
        if (submitBtn) {
            submitBtn.innerHTML = `
                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                  <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                  <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Signing in...
            `;
            submitBtn.classList.add("opacity-75", "cursor-not-allowed");
            submitBtn.disabled = true;

            // Re-allow form submission natively (if we didn't e.preventDefault())
        }
    });

    // You can add more Vanilla JS logic here...
};

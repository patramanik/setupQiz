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
                <i class="fa-solid fa-circle-notch fa-spin -ml-1 mr-3 text-lg text-white"></i>
                Signing in...
            `;
            submitBtn.classList.add("opacity-75", "cursor-not-allowed");
            submitBtn.disabled = true;

            // Re-allow form submission natively (if we didn't e.preventDefault())
        }
    });

    // You can add more Vanilla JS logic here...
};

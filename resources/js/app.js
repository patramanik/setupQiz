import "./bootstrap";
// import './modules/common';

// 1. Import your new Vanilla JS module
import { initLogin } from "./modules/login";
import { showBanner } from "./modules/banner";

document.addEventListener("DOMContentLoaded", () => {
    console.log("App loaded");

    // 2. Initialize the module
    // (the module will internally check if it is on the login page)
    initLogin();
    // showBanner();
});

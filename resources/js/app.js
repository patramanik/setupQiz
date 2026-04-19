import "./bootstrap";
import Swal from "sweetalert2";

// import './modules/common';

// 1. Import your new Vanilla JS module
import { initLogin } from "./modules/login";
import { showBanner } from "./modules/banner";
import { initSidebar } from "./modules/sidebar";
// Optional: Make it global so you can use it in inline scripts
window.Swal = Swal;

document.addEventListener("DOMContentLoaded", () => {
    console.log("App loaded");

    // 2. Initialize the module
    // (the module will internally check if it is on the login page)
    initLogin();
    initSidebar();
    // showBanner();
});

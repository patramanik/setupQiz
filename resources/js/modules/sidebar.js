import Swal from 'sweetalert2';

export const initSidebar = () => {
    const logoutBtn = document.getElementById('logout-btn');
    const logoutForm = document.getElementById('logout-form');

    if (logoutBtn && logoutForm) {
        logoutBtn.addEventListener('click', (event) => {
            event.preventDefault();
            
            Swal.fire({
                title: 'Are you sure?',
                text: "You will be logged out of the system!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#6366f1',
                cancelButtonColor: '#ef4444',
                confirmButtonText: 'Yes, log out!'
            }).then((result) => {
                if (result.isConfirmed) {
                    logoutForm.submit();
                }
            });
        });
    }
};

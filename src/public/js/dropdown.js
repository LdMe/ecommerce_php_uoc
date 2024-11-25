document.addEventListener('DOMContentLoaded', function () {
    // Manejador para los dropdowns
    const dropdowns = document.querySelectorAll('.dropdown-toggle');

    dropdowns.forEach(dropdown => {
        dropdown.addEventListener('click', function (e) {
            e.stopPropagation();
            const menu = this.nextElementSibling;
            // Cerrar otros dropdowns
            document.querySelectorAll('.dropdown-menu').forEach(dm => {
                if (dm !== menu) {
                    dm.classList.remove('show');
                }
            });
            // Toggle del dropdown actual
            menu.classList.toggle('show');
        });
    });

    // Cerrar dropdowns al hacer click fuera
    document.addEventListener('click', function (e) {
        if (!e.target.closest('.dropdown')) {
            document.querySelectorAll('.dropdown-menu').forEach(menu => {
                menu.classList.remove('show');
            });
        }
    });
});
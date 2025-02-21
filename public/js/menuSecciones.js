document.addEventListener("DOMContentLoaded", function () {
    const menuToggle = document.getElementById("menuToggle");
    const menuPrincipal = document.getElementById("menuPrincipal-sec");

    // Abrir o cerrar el menú al hacer clic en el botón
    menuToggle.addEventListener("click", function () {
        if (menuPrincipal.style.display === "block") {
            menuPrincipal.style.display = "none";
        } else {
            menuPrincipal.style.display = "block";
        }
    });

    // Cerrar el menú si se hace clic fuera de él
    document.addEventListener("click", function (event) {
        if (!menuPrincipal.contains(event.target) && event.target !== menuToggle) {
            menuPrincipal.style.display = "none";
        }
    });
});

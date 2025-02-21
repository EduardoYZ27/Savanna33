$(document).ready(function () {
    $(".navbar-toggler").click(function (event) {
        event.stopPropagation(); // Evita que el evento de clic se propague a los elementos superiores
        $("#menuPrincipal").toggleClass("show"); // Alternar la clase 'show' para mostrar u ocultar el menú
        $(".col-md-10").toggleClass("shift-right"); // Agrega o elimina una clase para desplazar las secciones del contenido
    });

    $(document).click(function (event) {
        if (!$(event.target).closest('#menuPrincipal').length && !$(event.target).hasClass('navbar-toggler')) {
            $("#menuPrincipal").removeClass("show"); // Ocultar el menú si se hace clic fuera de él
            $(".col-md-10").removeClass("shift-right"); // Devolver las secciones del contenido a su posición original
        }
    });
});

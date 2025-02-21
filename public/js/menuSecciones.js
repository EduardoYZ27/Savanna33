function closeMenu() {
    document.getElementById("menuPrincipal-sec").style.width = "0";
}

$(document).ready(function () {
    $(".navbar-toggler-sec").click(function () {
        $("#menuPrincipal-sec").css("width", "200px");
    });
});
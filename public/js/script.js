$(document).ready(function () {
    var BASE_URL = "http://localhost/nesti3/";

    //console.log(document.querySelectorAll(".btn"));

    document
        .querySelectorAll(".btn")
        .forEach((input) => input.addEventListener("click", actions));

    function actions() {
        var role = this.getAttribute("data-role");
        if (role != null) {
            if (role == "supprimerModal") {
                var id = this.getAttribute("data-id");
                var btnSupp = document.querySelector("#btnSupp");
                var idSupp = document.querySelector("#idSupp");

                idSupp.textContent = "N° " + id;
                btnSupp.setAttribute("data-role", "recettes/supprimer/" + id);
                $("#modalSupp").modal("show");
            } else {
                document.location.href = BASE_URL + role;
            }
        }
    }
});

$(document).ready(function () {
    var BASE_URL = "http://localhost/nesti3/";

    //console.log(document.querySelectorAll(".btn"));

    document
        .querySelectorAll(".btn")
        .forEach((input) => input.addEventListener("click", actions));

    function actions() {
        var role = this.dataset.role;
        if (role != null) {
            if (role == "supprimerModal") {
                var id = this.dataset.id;
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
    
    var regex = new Array();
    regex.push("[A-Z]"); 
    regex.push("[a-z]"); 
    regex.push("[0-9]"); 
    regex.push("[$@$!%*#?&]"); 

    var passed = 0;
    
    var listGroup = document.querySelectorAll(".list-group-item");
    var progressBar = document.querySelector(".progress-bar");
    
    for(let i = 0; i < listGroup.length; i++){
            listGroup[i].classList.add("list-groupNoValid");
    }
    
    $('#mdpUtilisateur').on('keyup', function(e) {
        var passed = 0;
        if($('#mdpUtilisateur').val().length > 7) {
            listGroup[4].classList.remove("list-groupNoValid");
            listGroup[4].classList.add("list-groupValid");
            passed++;
        }else{
            listGroup[4].classList.remove("list-groupValid");
            listGroup[4].classList.add("list-groupNoValid");
            passed--;
            
        }
        
        for (var i = 0; i < regex.length; i++) {
            if (new RegExp(regex[i]).test($('#mdpUtilisateur').val())) {
                listGroup[i].classList.remove("list-groupNoValid");
                listGroup[i].classList.add("list-groupValid");
                passed++;
            }else{
                listGroup[i].classList.remove("list-groupValid");
                listGroup[i].classList.add("list-groupNoValid");
                passed--;
            }
        }
        switch(passed){
            case -3:
            case -2:
                progressBar.style.width = "5%";  
                progressBar.style.backgroundColor ="red";
                break;
            case -1:
            case 0:
                progressBar.style.width = "30%";  
                progressBar.style.backgroundColor ="red";
                break;
            case 1:
            case 2:
            case 3:
                progressBar.style.width = "60%";  
                progressBar.style.backgroundColor ="orange";
                break;
            case 4:
                progressBar.style.width = "70%";  
                progressBar.style.backgroundColor ="orange";
                break;
            case 5:
                progressBar.style.width = "100%";  
                progressBar.style.backgroundColor ="green";
                break;
        }
        console.log(passed);
       
    });
     

});

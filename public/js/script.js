var BASE_URL = "http://localhost/nesti3/";

document.querySelectorAll(".btn").forEach((input) => input.addEventListener("click", actions));

function actions() {
    var role = this.getAttribute("data-role");
    var id = this.getAttribute("data-id");
    console.log(BASE_URL + role);
    if(role != ""){
      document.location.href = BASE_URL + role;  
    }
    
    
}

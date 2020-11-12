function validation(){
    const email = document.getElementById('email').value;
    const form = document.getElementById('form');
    const error = document.getElementById('error');
    const checkbox = document.getElementById('checkbox');
    const pattern = /^([a-zA-Z0-0\.-]+)@([a-zA-Z0-9-]+).([a-z]{2,10})(.[a-z]{2,10})?$/;
    
    if (email.match(pattern)){
        form.classList.add("valid")
        form.classList.remove("invalid")
        error.innerHTML = "";

    }else{
        form.classList.remove("valid")
        form.classList.add("invalid")
        error.innerHTML = "Please enter your email"
    }

    if (email == ""){
        form.classList.remove("valid")
        form.classList.remove("invalid")
        error.innerHTML = "";
    }

    

}

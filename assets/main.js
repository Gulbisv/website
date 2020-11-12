const form = document.getElementById('form');
const email = document.getElementById('email');
const checkbox = document.getElementById('checkbox');
const errorElement = document.getElementById('error');

form.addEventListener('submit', (e)=>{
    e.preventDefault();
    checkInputs();
})

function checkInputs() {
    const emailValue = email.value.trim();

    if (emailValue === '') {
        setErrorFor(email, 'Email address is required');
    } else if (!isEmail(emailValue)) {
        setErrorFor(email, 'Please provide a valid e-mail address');
    }else if (emailValue.substr(emailValue.length-3,emailValue.length)==='.co') {
        setErrorFor(email, 'We are not accepting subscriptions from Columbia email');
    } else if (checkbox.checked === false) {
        setErrorFor(email, 'You must accept the terms and conditions');
    } else {
       setSuccessFor(email, message = '');
    }
}

function setErrorFor(small, message) {
    errorElement.innerText = message;
}

function setSuccessFor(small, message) {
    errorElement.innerText = message;
}

function isEmail(email) {
    return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}
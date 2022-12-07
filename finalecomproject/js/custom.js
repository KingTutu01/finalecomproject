// select all form inputs

var fullName = document.forms['registerForm']['uname'];
var email = document.forms['registerForm']['uemail'];
var password = document.forms['registerForm']['upass'];
var confirmPassword = document.forms['registerForm']['uconpass'];
var country = document.forms['registerForm']['ucountry'];
var city = document.forms['registerForm']['ucity'];
var phoneNumber = document.forms['registerForm']['ucontact'];

// select all error display elements

var nameError = document.getElementById('fullNameError');
var emailError = document.getElementById('emailError');
var passwordError = document.getElementById('passwordError');
var confirmPasswordError = document.getElementById('confirmPasswordError');
var countryError = document.getElementById('countryError');
var cityError = document.getElementById('cityError');
var contactError = document.getElementById('contactError');

// setting all event listeners

fullName.addEventListener('blur', fullNameVerify, true);
email.addEventListener('blur', emailVerify, true);
password.addEventListener('blur', passwordVerify, true);
country.addEventListener('blur', countryVerify, true);
city.addEventListener('blur', cityVerify, true);
phoneNumber.addEventListener('blur', phoneNumberVerify, true);

function validateForm(){
    //validate full name
    if (fullName.value == ""){
        nameError.textContent = "Full Name is required";
        fullName.focus();
        return false;
    }
    if (fullName.value.length > 100){
        nameError.textContent = "Full Name is too long";
        fullName.focus();
        return false;
    }

    //validate password
    if (password.value == ""){
        passwordError.textContent = "Password is required";
        password.focus();
        return false;
    }
    if (password.value.length < 8){
        passwordError.textContent = "Password must be at least 8 characters long";
        password.focus()
        return false;
    } else if (password.value.search(/[0-9]/) == -1){
        passwordError.textContent="At least 1 numeric value must be entered";
        password.focus();
        return false;
    }else if (password.value.search(/[a-z]/) == -1){
        passwordError.textContent="At least 1 small letter must be entered";
        password.focus();
        return false;
    }else if (password.value.search(/[A-Z]/) == -1){
        passwordError.textContent="At least 1 uppercase letter must be entered";
        password.focus();
        return false;
    }

    //check if passwords match
    if (password.value != confirmPassword.value){
        confirmPasswordError.innerHTML = "The two passwords do not match";
        return false;
    }

    //check if country is entered
    if (country.value == ""){
        countryError.textContent = "Country is required";
        country.focus();
        return false;
    }

    //check country length
    if (country.value.length > 30){
        countryError.textContent = "Country is too long";
        country.focus();
        return false;
    }

    //check if city is entered
    if (city.value == ""){
        cityError.textContent = "City is required";
        city.focus();
        return false;
    }

    //check city length
    if (city.value.length > 30){
        cityError.textContent = "Country is too long";
        city.focus();
        return false;
    }

    //check if phone number is entered
    if (phoneNumber.value == ""){
        contactError.textContent = "Phone Number is required";
        phoneNumber.focus();
        return false;
    }

    //check contact length
    if (phoneNumber.value.length > 15){
        contactError.textContent = "Country is too long";
        phoneNumber.focus();
        return false;
    }
}

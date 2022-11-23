function validateName() {
    let x = document.forms["form"]["name"].value;
    if (x === "") {
        alert("Name must be filled out");
        return false;
    } else {
        return true
    }
}

function validateSurname() {
    let x = document.forms["form"]["surname"].value;
    if (x === "") {
        alert("Surname must be filled out");
        return false;
    } else {
        return true
    }
}

function validateEmail() {
    let x = document.forms["form"]["email"].value;
    if (x === "") {
        alert("Email must be filled out");
        return false;
    } else {
        return true
    }
}

function validatePassword() {
    let x = document.forms["form"]["password"].value;
    if (x === "") {
        alert("Password must be filled out");
        return false;
    } else {
        return true
    }
}

function validateRepeatPassword() {
    let x = document.forms["form"]["repeat-password"].value;
    if (x === "") {
        alert("Repeat password must be filled out");
        return false;
    } else {
        return true
    }
}

function validateAddress() {
    let x = document.forms["form"]["address"].value;
    if (x === "") {
        alert("Address must be filled out");
        return false;
    } else {
        return true
    }
}

function validateCountry() {
    let x = document.forms["form"]["country"].value;
    if (x === "") {
        alert("Country must be filled out");
        return false;
    } else {
        return true
    }
}

function validateCity() {
    let x = document.forms["form"]["city"].value;
    if (x === "") {
        alert("City must be filled out");
        return false;
    } else {
        return true
    }
}

function validatePostCode() {
    let x = document.forms["form"]["post-code"].value;
    if (x === "") {
        alert("Post code must be filled out");
        return false;
    }
    if (x.length < 5 && x.length > 6) {
        alert("Enter a valid post code");
        return false;
    } else {
        return true
    }
}

function validatePhoneNumber() {
    let x = document.forms["form"]["phone-number"].value;
    if (x === "") {
        alert("Phone Number must be filled out");
        return false;
    } else {
        return true
    }
}

function validateSignInForm() {
    return validateEmail() &&
        validatePassword()
}

function validateSignUpForm() {
    return validateEmail() &&
        validateName() &&
        validateSurname() &&
        validatePassword() &&
        validateRepeatPassword() &&
        validateAddress() &&
        validateCountry() &&
        validateCity() &&
        validatePostCode() &&
        validatePhoneNumber();
}
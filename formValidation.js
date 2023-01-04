const EMAIL_INPUT_ID = 1
const PASSWORD_INPUT_ID = 2
const REPEAT_PASSWORD_INPUT_ID = 3
const NAME_INPUT_ID = 4
const SURNAME_INPUT_ID = 5
const ADDRESS_INPUT_ID = 6
const COUNTRY_INPUT_ID = 7
const CITY_INPUT_ID = 8
const POST_CODE_INPUT_ID = 9
const PHONE_NUMBER_INPUT_ID = 10

function validateSignInForm() {
    validateEmail();
    validatePassword();
}

function validateSignUpForm() {
    validateEmail();
    validateName();
    validateSurname();
    validatePassword();
    validateRepeatPassword();
    validateAddress();
    validateCountry();
    validateCity();
    validatePostCode();
    validatePhoneNumber();
}

function validateForgotPasswordForm() {
    validateEmail();
}


function validateEmail() {
    runValidation(EMAIL_INPUT_ID)
}

function validatePassword() {
    runValidation(PASSWORD_INPUT_ID)

}

function validateRepeatPassword() {
    runValidation(REPEAT_PASSWORD_INPUT_ID)

}

function validateName() {
    runValidation(NAME_INPUT_ID)

}

function validateSurname() {
    runValidation(SURNAME_INPUT_ID)

}

function validateAddress() {
    runValidation(ADDRESS_INPUT_ID)

}

function validateCountry() {
    runValidation(COUNTRY_INPUT_ID)
}

function validateCity() {
    runValidation(CITY_INPUT_ID)
}

function validatePostCode() {
    runValidation(POST_CODE_INPUT_ID)
}

function validatePhoneNumber() {
    runValidation(PHONE_NUMBER_INPUT_ID)
}

function runValidation(inputCode) {
    let inputBlockToValidate = getInputBlockFromCode(inputCode);
    if (isInputValid(inputBlockToValidate, inputCode)) {
        setInputAsValid(inputBlockToValidate)
    } else {
        setInputAsInvalid(inputBlockToValidate)
    }
}

function getInputBlockFromCode(inputCode) {
    switch (inputCode) {
        case EMAIL_INPUT_ID:
            return document.getElementById("email-input-block");
        case PASSWORD_INPUT_ID:
            return document.getElementById("password-input-block");
        case REPEAT_PASSWORD_INPUT_ID:
            return document.getElementById("repeat-password-input-block");
        case NAME_INPUT_ID:
            return document.getElementById("name-input-block");
        case SURNAME_INPUT_ID:
            return document.getElementById("surname-input-block");
        case ADDRESS_INPUT_ID:
            return document.getElementById("address-input-block");
        case COUNTRY_INPUT_ID:
            return document.getElementById("country-input-block");
        case CITY_INPUT_ID:
            return document.getElementById("city-input-block");
        case POST_CODE_INPUT_ID:
            return document.getElementById("post-code-input-block");
        case PHONE_NUMBER_INPUT_ID:
            return document.getElementById("phone-number-input-block");
    }
}

function isInputValid(inputBlockToValidate, inputCode) {
    let input = inputBlockToValidate.getElementsByTagName("input").item(0)
    let input_value = input.value
    if (input_value === "") {
        return false
    }
    switch (inputCode) {
        case EMAIL_INPUT_ID:
            return isEmailInputValid(input_value)
        case PASSWORD_INPUT_ID:
            return isPasswordInputValid(input_value);
        case REPEAT_PASSWORD_INPUT_ID:
            return isRepeatPasswordInputValid(input_value);
        case NAME_INPUT_ID:
            return isNameInputValid(input_value);
        case SURNAME_INPUT_ID:
            return isNameInputValid(input_value);
        case ADDRESS_INPUT_ID:
            return isAddressValid(input_value);
        case COUNTRY_INPUT_ID:
            return isNameValid(input_value);
        case CITY_INPUT_ID:
            return isNameValid(input_value);
        case POST_CODE_INPUT_ID:
            return isPostCodeInputValid(input_value);
        case PHONE_NUMBER_INPUT_ID:
            return isPhoneInputValid(input_value);
    }
}

function isNameValid(input_value) {
    let validRegex = /^[a-zA-Z ]+$/;
    return validRegex.test(input_value)
}
function isAddressValid(input_value) {
    let validRegex = /^[#.0-9a-zA-Z\s,-/]+$/;
    return validRegex.test(input_value)
}

function isEmailInputValid(input_value) {
    let validRegex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return validRegex.test(input_value)
}
function isPasswordInputValid(input_value) {
    return input_value.length >= 8
}

function isRepeatPasswordInputValid(input_value) {
    let password = getPasswordInputValue();
    return password === input_value;
}

function isNameInputValid(input_value) {
    let nameRegex = /^[a-zA-Z]+$/;
    return  nameRegex.test(input_value)
}

function isPostCodeInputValid(input_value) {
    let postCodeRegex = /^\d{5}(-\d{4})?$/
    return input_value.test(postCodeRegex);
}

function isPhoneInputValid(input_value) {
    let phoneNumberRegex = /^\+?(\d{15})\)$/
    return input_value.test(phoneNumberRegex)
}

function getPasswordInputValue(){
    return document.getElementById("password-input").value;
}

function setInputAsInvalid(inputBlockToValidate) {
    let validationErrorBlock = inputBlockToValidate.getElementsByClassName("validation-error-block")[0]
    validationErrorBlock.style.display = "block"
}

function setInputAsValid(inputBlockToValidate) {
    let validationErrorBlock = inputBlockToValidate.getElementsByClassName("validation-error-block")[0]
    validationErrorBlock.style.display = "none"
}
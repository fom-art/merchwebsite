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
const PRODUCT_NAME_INPUT_ID = 11
const PRICE_INPUT_ID = 12
const PHOTO_INPUT_ID = 13
const PURCHASE_DESCRIPTION_INPUT_ID = 14

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

function validatePurchaseForm() {
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
    validatePurchaseDescription();
}

function validateForgotPasswordForm() {
    validateEmail();
}

function validateAddProductForm() {
    validateProductName();
    validatePrice();
    validatePhoto();
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

function validateProductName() {
    runValidation(PRODUCT_NAME_INPUT_ID)
}

function validatePrice() {
    runValidation(PRICE_INPUT_ID)
}

function validatePhoto() {
    runValidation(PHOTO_INPUT_ID)
}

function validatePurchaseDescription() {
    runValidation(PURCHASE_DESCRIPTION_INPUT_ID)
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
        case PRODUCT_NAME_INPUT_ID:
            return document.getElementById("product-name-input-block");
        case PRICE_INPUT_ID:
            return document.getElementById("product-price-input-block");
        case PHOTO_INPUT_ID:
            return document.getElementById("photo-input-block");
        case PURCHASE_DESCRIPTION_INPUT_ID:
            return document.getElementById("purchase-description-input-block");

    }
}

function isInputValid(inputBlockToValidate, inputCode) {
    let input = inputBlockToValidate.getElementsByTagName("input").item(0)
    let input_value = input.value
    if (inputCode !== PHONE_NUMBER_INPUT_ID && input_value === "") {
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
        case PRODUCT_NAME_INPUT_ID:
            return isProductNameValid(input_value);
        case PRICE_INPUT_ID:
            return isPriceValid(input_value);
        case PHOTO_INPUT_ID:
            return isPhotoValid(input_value);
        case PURCHASE_DESCRIPTION_INPUT_ID:
            return isPurchaseDescriptionValid(input_value);
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
    let passwordRegex = /^[a-zA-Z0-9\s]+?$/;
    return input_value.length >= 8 && passwordRegex.test(input_value)
}

function isRepeatPasswordInputValid(input_value) {
    let password = getPasswordInputValue();
    return password === input_value;
}

function isNameInputValid(input_value) {
    let nameRegex = /^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/;
    return nameRegex.test(input_value)
}

function isPostCodeInputValid(input_value) {
    let postCodeRegex = /^\d{5}(-\d{4})?$/
    return postCodeRegex.test(input_value);
}

function isPhoneInputValid(input_value) {
    let phoneNumberRegex = /^[+]?[a-zA-Z0-9\s]+?$/;
    return phoneNumberRegex.test(input_value)
}

function isProductNameValid(input_value) {
    let productNameRegex = /^[a-zA-Z0-9\s]+?$/;
    return productNameRegex.test(input_value)
}

function isPriceValid(input_value) {
    let priceRegex = /^\d+\.?\d*$/;
    return priceRegex.test(input_value)
}

function isPhotoValid(input_value) {
    return true
}

function isPurchaseDescriptionValid(input_value) {
    let purchaseDescriptionRegex = /[a-zA-Z0-9,.;:'"#$%()/@\s]+$/;
    return purchaseDescriptionRegex.test(input_value)
}

function getPasswordInputValue() {
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
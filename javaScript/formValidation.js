const INPUT_CODES = {
    EMAIL: 1,
    PASSWORD: 2,
    REPEAT_PASSWORD: 3,
    NAME: 4,
    SURNAME: 5,
    ADDRESS: 6,
    COUNTRY: 7,
    CITY: 8,
    POST_CODE: 9,
    PHONE_NUMBER: 10,
    PRODUCT_NAME: 11,
    PRICE: 12,
    PHOTO: 13,
    PURCHASE_DESCRIPTION: 14,
};

function validateSignInForm() {
    validateInput(INPUT_CODES.EMAIL);
    validateInput(INPUT_CODES.PASSWORD);
}

function validateSignUpForm() {
    validateInput(INPUT_CODES.EMAIL);
    validateInput(INPUT_CODES.NAME);
    validateInput(INPUT_CODES.SURNAME);
    validateInput(INPUT_CODES.PASSWORD);
    validateInput(INPUT_CODES.REPEAT_PASSWORD);
    validateInput(INPUT_CODES.ADDRESS);
    validateInput(INPUT_CODES.COUNTRY);
    validateInput(INPUT_CODES.CITY);
    validateInput(INPUT_CODES.POST_CODE);
    validateInput(INPUT_CODES.PHONE_NUMBER);
}

function validatePurchaseForm() {
    validateInput(INPUT_CODES.EMAIL);
    validateInput(INPUT_CODES.NAME);
    validateInput(INPUT_CODES.SURNAME);
    validateInput(INPUT_CODES.PASSWORD);
    validateInput(INPUT_CODES.REPEAT_PASSWORD);
    validateInput(INPUT_CODES.ADDRESS);
    validateInput(INPUT_CODES.COUNTRY);
    validateInput(INPUT_CODES.CITY);
    validateInput(INPUT_CODES.POST_CODE);
    validateInput(INPUT_CODES.PHONE_NUMBER);
}

function validateInput(inputCode) {
    const inputBlockToValidate = getInputBlockFromCode(inputCode);
    if (isInputValid(inputBlockToValidate, inputCode)) {
        setInputAsValid(inputBlockToValidate);
    } else {
        setInputAsInvalid(inputBlockToValidate);
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

function isInputValid(inputBlockToValidate, inputCode, inputValue) {
    let input = inputBlockToValidate.querySelector("input");
    let input_value = inputValue || input.value;

    if (inputCode !== INPUT_CODES.PHONE_NUMBER && input_value === "") {
        return false;
    }

    switch (inputCode) {
        case INPUT_CODES.EMAIL:
            return isEmailInputValid(input_value);
        case INPUT_CODES.PASSWORD:
            return isPasswordInputValid(input_value);
        case INPUT_CODES.REPEAT_PASSWORD:
            return isRepeatPasswordInputValid(input_value);
        case INPUT_CODES.NAME:
        case INPUT_CODES.SURNAME:
            return isNameInputValid(input_value);
        case INPUT_CODES.ADDRESS:
            return isAddressValid(input_value);
        case INPUT_CODES.COUNTRY:
            return isCountryValid(input_value);
        case INPUT_CODES.CITY:
            return isNameValid(input_value);
        case INPUT_CODES.POST_CODE:
            return isPostCodeInputValid(input_value);
        case INPUT_CODES.PHONE_NUMBER:
            return isPhoneInputValid(input_value);
        case INPUT_CODES.PRODUCT_NAME:
            return isProductNameValid(input_value);
        case INPUT_CODES.PRICE:
            return isPriceValid(input_value);
        case INPUT_CODES.PHOTO:
            return isPhotoValid(input_value);
        case INPUT_CODES.PURCHASE_DESCRIPTION:
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
    return input_value.length >= 8
}

function isRepeatPasswordInputValid(input_value) {
    let password = getPasswordInputValue();
    return password === input_value;
}

function isNameInputValid(input_value) {
    let nameRegex = /^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/;
    return nameRegex.test(input_value)
}

function isCountryValid(input_value) {
    let nameRegex = /^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/;
    return nameRegex.test(input_value)
}

function isPostCodeInputValid(input_value) {
    let postCodeRegex = /^\d{5}(-\d{4})?$/
    return postCodeRegex.test(input_value);
}

function isPhoneInputValid(input_value) {
    let phoneNumberRegex = /^[+]?[(]?[0-9]{3}[)]?[-\s.]?[0-9]{3}[-\s.]?[0-9]{4,6}$/;
    return phoneNumberRegex.test(input_value)
}

function isProductNameValid(input_value) {
    let productNameRegex = /[a-zA-Z0-9\s]+?$/;
    return productNameRegex.test(input_value)
}

function isPriceValid(input_value) {
    let priceRegex = /^-?\d+\.?\d*$/;
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
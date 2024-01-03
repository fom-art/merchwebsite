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
const PRODUCT_DESCRIPTION_INPUT_ID = 15
const PRODUCT_TYPE_INPUT_ID = 16
const SIGN_IN_FORM_ID = 101
const SIGN_UP_FORM_ID = 102
const FORGOT_PASSWORD_FORM_ID = 103
const PURCHASE_FORM_ID = 104
const ADMIN_FORM_ID = 105

if (document.getElementById("confirm-button-sign-up")) {
    document.getElementById("confirm-button-sign-up").addEventListener("click", sendSignUpForm)
}
if (document.getElementById("confirm-button-sign-in")) {
    document.getElementById("confirm-button-sign-in").addEventListener("click", sendSignInForm)
}
if (document.getElementById("confirm-button-forgot-password")) {
    document.getElementById("confirm-button-forgot-password").addEventListener("click", sendForgotPasswordForm)
}
if (document.getElementById("confirm-button-purchase")) {
    document.getElementById("confirm-button-purchase").addEventListener("click", sendPurchaseForm)
}
if (document.getElementById("confirm-button-admin")) {
    document.getElementById("confirm-button-admin").addEventListener("click", sendAdminForm)
}
if (document.getElementById("confirm-registration-success-button")) {
    document.getElementById("confirm-registration-success-button").addEventListener("click", submitRegistrationSuccessForm)
}

function sendSignInForm() {
    sendPostRequest(SIGN_IN_FORM_ID)
}

function sendSignUpForm() {
    sendPostRequest(SIGN_UP_FORM_ID)
}

function sendForgotPasswordForm() {
    sendPostRequest(FORGOT_PASSWORD_FORM_ID)
}

function sendPurchaseForm() {
    sendPostRequest(PURCHASE_FORM_ID)
}

function sendAdminForm() {
    sendPostRequest(ADMIN_FORM_ID)
}

function sendPostRequest(formCode) {
    let validation = new Validation();
    let validationResult = null;
    switch (formCode) {
        case SIGN_IN_FORM_ID :
            validationResult = validation.validateSignInForm();
            break;
        case SIGN_UP_FORM_ID:
            validationResult = validation.validateSignUpForm();
            break;
        case FORGOT_PASSWORD_FORM_ID:
            validationResult = validation.validateForgotPasswordForm();
            break
        case PURCHASE_FORM_ID:
            validationResult = validation.validatePurchaseForm();
            break;
        case ADMIN_FORM_ID:
            validationResult = validation.validateAddProductForm();
            break;
    }
    if (validationResult) {
        submitForm();
    }
}

function submitForm() {
    document.getElementsByTagName("form")[0].submit();
}

function submitRegistrationSuccessForm() {
    document.getElementById("registration-success-form").submit()
}

class Validation {
    validateSignInForm() {
        return this.validateEmail() *
            this.validatePassword();
    }

    validateSignUpForm() {
        return this.validateEmail() *
            this.validateName() *
            this.validateSurname() *
            this.validatePassword() *
            this.validateRepeatPassword() *
            this.validateAddress() *
            this.validateCountry() *
            this.validateCity() *
            this.validatePostCode() *
            this.validatePhoneNumber()
    }

    validatePurchaseForm() {
        return this.validateEmail() *
            this.validateName() *
            this.validateSurname() *
            this.validateAddress() *
            this.validateCountry() *
            this.validateCity() *
            this.validatePostCode() *
            this.validatePhoneNumber() *
            this.validatePurchaseDescription();
    }

    validateForgotPasswordForm() {
        return this.validateEmail();
    }

    validateAddProductForm() {
        return this.validateProductName() *
            this.validatePrice() *
            this.validatePhoto() *
            this.validateProductType *
            this.validateProductDescription;
    }


    validateEmail() {
        return this.runValidation(EMAIL_INPUT_ID)
    }

    validatePassword() {
        return this.runValidation(PASSWORD_INPUT_ID)

    }

    validateRepeatPassword() {
        return this.runValidation(REPEAT_PASSWORD_INPUT_ID)

    }

    validateName() {
        return this.runValidation(NAME_INPUT_ID)

    }

    validateSurname() {
        return this.runValidation(SURNAME_INPUT_ID)

    }

    validateAddress() {
        return this.runValidation(ADDRESS_INPUT_ID)

    }

    validateCountry() {
        return this.runValidation(COUNTRY_INPUT_ID)
    }

    validateCity() {
        return this.runValidation(CITY_INPUT_ID)
    }

    validatePostCode() {
        return this.runValidation(POST_CODE_INPUT_ID)
    }

    validatePhoneNumber() {
        return this.runValidation(PHONE_NUMBER_INPUT_ID)
    }

    validateProductName() {
        return this.runValidation(PRODUCT_NAME_INPUT_ID)
    }

    validatePrice() {
        return this.runValidation(PRICE_INPUT_ID)
    }

    validatePhoto() {
        return this.runValidation(PHOTO_INPUT_ID)
    }

    validatePurchaseDescription() {
        return this.runValidation(PURCHASE_DESCRIPTION_INPUT_ID)
    }

    validateProductType() {
        return this.runValidation(PRODUCT_TYPE_INPUT_ID)
    }

    validateProductDescription() {
        return this.runValidation(PRODUCT_DESCRIPTION_INPUT_ID)
    }


    runValidation(inputCode) {
        let inputBlockToValidate = this.getInputBlockFromCode(inputCode);
        if (this.isInputValid(inputBlockToValidate, inputCode)) {
            this.setInputAsValid(inputBlockToValidate)
            return true
        } else {
            this.setInputAsInvalid(inputBlockToValidate)
            return false
        }
    }

    getInputBlockFromCode(inputCode) {
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
            case PRODUCT_TYPE_INPUT_ID:
                return document.getElementById("product-type-input-block");
            case PHOTO_INPUT_ID:
                return document.getElementById("photo-input-block");
            case PURCHASE_DESCRIPTION_INPUT_ID:
                return document.getElementById("purchase-description-input-block");

        }
    }

    isInputValid(inputBlockToValidate, inputCode) {
        let input = inputBlockToValidate.getElementsByTagName("input").item(0)
        let input_value = input.value
        if (inputCode !== PHONE_NUMBER_INPUT_ID && input_value === "") {
            return false
        }
        switch (inputCode) {
            case EMAIL_INPUT_ID:
                return this.isEmailInputValid(input_value)
            case PASSWORD_INPUT_ID:
                return this.isPasswordInputValid(input_value);
            case REPEAT_PASSWORD_INPUT_ID:
                return this.isRepeatPasswordInputValid(input_value);
            case NAME_INPUT_ID:
                return this.isNameInputValid(input_value);
            case SURNAME_INPUT_ID:
                return this.isNameInputValid(input_value);
            case ADDRESS_INPUT_ID:
                return this.isAddressValid(input_value);
            case COUNTRY_INPUT_ID:
                return this.isNameValid(input_value);
            case CITY_INPUT_ID:
                return this.isNameValid(input_value);
            case POST_CODE_INPUT_ID:
                return this.isPostCodeInputValid(input_value);
            case PHONE_NUMBER_INPUT_ID:
                return this.isPhoneInputValid(input_value);
            case PRODUCT_NAME_INPUT_ID:
                return this.isProductNameValid(input_value);
            case PRICE_INPUT_ID:
                return this.isPriceValid(input_value);
            case PHOTO_INPUT_ID:
                return this.isPhotoValid(input_value);
            case PURCHASE_DESCRIPTION_INPUT_ID:
                return this.isPurchaseDescriptionValid(input_value);
            case PRODUCT_TYPE_INPUT_ID:
                return this.isProductTypeValid(input_value);
            case PRODUCT_DESCRIPTION_INPUT_ID:
                return this.isProductDescriptionValid(input_value);
        }
    }

    isNameValid(input_value) {
        let validRegex = /^[a-zA-Z ]+$/;
        return validRegex.test(input_value)
    }

    isAddressValid(input_value) {
        let validRegex = /^[#0-9a-zA-Z\s,-/]+$/;
        return validRegex.test(input_value)
    }

    isEmailInputValid(input_value) {
        let validRegex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return validRegex.test(input_value)
    }

    isPasswordInputValid(input_value) {
        let passwordRegex = /^[a-zA-Z0-9\s]+?$/;
        return input_value.length >= 8 && passwordRegex.test(input_value)
    }

    isRepeatPasswordInputValid(input_value) {
        let password = this.getPasswordInputValue();
        return password === input_value;
    }

    isNameInputValid(input_value) {
        let nameRegex = /^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/;
        return nameRegex.test(input_value)
    }

    isPostCodeInputValid(input_value) {
        let postCodeRegex = /^\d{5}(-\d{4})?$/
        return postCodeRegex.test(input_value);
    }

    isPhoneInputValid(input_value) {
        let phoneNumberRegex = /^[+]?[a-zA-Z0-9\s]+?$/;
        return phoneNumberRegex.test(input_value)
    }

    isProductNameValid(input_value) {
        let productNameRegex = /^[a-zA-Z0-9\s]+?$/;
        return productNameRegex.test(input_value)
    }

    isPriceValid(input_value) {
        let priceRegex = /^\d+\.?\d*$/;
        return priceRegex.test(input_value)
    }

    isPhotoValid(input_value) {
        let extensions = /(\.jpg|\.jpeg|\.png)$/i
        return extensions.exec(input_value)
    }

    isProductTypeValid(input_value) {
        let productTypeRegex = /^[a-zA-Z0-9\s]+?$/;
        return productTypeRegex.test(input_value)
    }

    isProductDescriptionValid(input_value) {
        let productDescriptionRegex = /^[a-zA-Z0-9\s]+?$/;
        return productDescriptionRegex.test(input_value)
    }

    isPurchaseDescriptionValid(input_value) {
        let purchaseDescriptionRegex = /[a-zA-Z0-9,.;:'"#$%()/@\s]+$/;
        return purchaseDescriptionRegex.test(input_value)
    }

    getPasswordInputValue() {
        return document.getElementById("password-input").value;
    }

    setInputAsInvalid(inputBlockToValidate) {
        let validationErrorBlock = inputBlockToValidate.getElementsByClassName("js-validation-message")[0]
        validationErrorBlock.style.display = "block"
    }

    setInputAsValid(inputBlockToValidate) {
        let validationErrorBlock = inputBlockToValidate.getElementsByClassName("js-validation-message")[0]
        validationErrorBlock.style.display = "none"
    }
}


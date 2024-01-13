class Validation {
    static INPUT_CODES = {
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

    static validateSignInForm() {
        return this.validateInputs([this.INPUT_CODES.EMAIL, this.INPUT_CODES.PASSWORD]);
    }

    static validateSignUpForm() {
        return this.validateInputs([
            this.INPUT_CODES.EMAIL, this.INPUT_CODES.NAME, this.INPUT_CODES.SURNAME,
            this.INPUT_CODES.PASSWORD, this.INPUT_CODES.REPEAT_PASSWORD, this.INPUT_CODES.ADDRESS,
            this.INPUT_CODES.COUNTRY, this.INPUT_CODES.CITY, this.INPUT_CODES.POST_CODE,
            this.INPUT_CODES.PHONE_NUMBER
        ]);
    }

    static validatePurchaseForm() {
        return this.validateInputs([
            this.INPUT_CODES.EMAIL, this.INPUT_CODES.NAME, this.INPUT_CODES.SURNAME,
            this.INPUT_CODES.ADDRESS, this.INPUT_CODES.COUNTRY, this.INPUT_CODES.CITY,
            this.INPUT_CODES.POST_CODE, this.INPUT_CODES.PHONE_NUMBER,
            this.INPUT_CODES.PURCHASE_DESCRIPTION
        ]);
    }

    static validateAdminForm() {
        return this.validateInputs([
            this.INPUT_CODES.PRODUCT_NAME, this.INPUT_CODES.PRICE, this.INPUT_CODES.PHOTO
        ]);
    }

    static validateForgotPasswordForm() {
        return this.validateInputs([this.INPUT_CODES.EMAIL]);
    }

    static validateUserDetailsForm() {
        return this.validateInputs([
            this.INPUT_CODES.EMAIL, this.INPUT_CODES.NAME, this.INPUT_CODES.SURNAME,
            this.INPUT_CODES.PASSWORD, this.INPUT_CODES.ADDRESS,
            this.INPUT_CODES.COUNTRY, this.INPUT_CODES.CITY, this.INPUT_CODES.POST_CODE,
            this.INPUT_CODES.PHONE_NUMBER
        ])
    }

    static validateInputs(inputCodes) {
        let allValid = true;
        inputCodes.forEach(code => {
            const inputBlock = this.getInputBlockFromCode(code);
            if (!this.validateInput(inputBlock, code)) {
                allValid = false;
            }
        });
        return allValid;
    }

    static validateInput(inputBlock, inputCode) {
        if (this.isInputValid(inputBlock, inputCode)) {
            this.setInputAsValid(inputBlock);
            return true;
        } else {
            this.setInputAsInvalid(inputBlock);
            return false;
        }
    }

    static getInputBlockFromCode(inputCode) {
        const inputIdMap = {
            [this.INPUT_CODES.EMAIL]: "email-input-block",
            [this.INPUT_CODES.PASSWORD]: "password-input-block",
            [this.INPUT_CODES.REPEAT_PASSWORD]: "repeat-password-input-block",
            [this.INPUT_CODES.NAME]: "name-input-block",
            [this.INPUT_CODES.SURNAME]: "surname-input-block",
            [this.INPUT_CODES.ADDRESS]: "address-input-block",
            [this.INPUT_CODES.COUNTRY]: "country-input-block",
            [this.INPUT_CODES.CITY]: "city-input-block",
            [this.INPUT_CODES.POST_CODE]: "post-code-input-block",
            [this.INPUT_CODES.PHONE_NUMBER]: "phone-number-input-block",
            [this.INPUT_CODES.PRODUCT_NAME]: "product-name-input-block",
            [this.INPUT_CODES.PRICE]: "product-price-input-block",
            [this.INPUT_CODES.PHOTO]: "photo-input-block",
            [this.INPUT_CODES.PURCHASE_DESCRIPTION]: "purchase-description-input-block"
        };
        return document.getElementById(inputIdMap[inputCode]);
    }

    static isInputValid(inputBlock, inputCode) {
        const input = inputBlock.querySelector("input");
        const validationFunctions = {
            [this.INPUT_CODES.EMAIL]: this.isEmailValid,
            [this.INPUT_CODES.PASSWORD]: this.isPasswordValid,
            [this.INPUT_CODES.REPEAT_PASSWORD]: this.isRepeatPasswordValid,
            [this.INPUT_CODES.NAME]: this.isNameValid,
            [this.INPUT_CODES.SURNAME]: this.isNameValid,
            [this.INPUT_CODES.ADDRESS]: this.isAddressValid,
            [this.INPUT_CODES.COUNTRY]: this.isCountryValid,
            [this.INPUT_CODES.CITY]: this.isNameValid,
            [this.INPUT_CODES.POST_CODE]: this.isPostCodeValid,
            [this.INPUT_CODES.PHONE_NUMBER]: this.isPhoneValid,
            [this.INPUT_CODES.PRODUCT_NAME]: this.isProductNameValid,
            [this.INPUT_CODES.PRICE]: this.isPriceValid,
            [this.INPUT_CODES.PHOTO]: this.isPhotoValid,
            [this.INPUT_CODES.PURCHASE_DESCRIPTION]: this.isPurchaseDescriptionValid
        };
        return validationFunctions[inputCode].call(this, input.value);
    }

    static setInputAsValid(inputBlock) {
        let validationErrorBlock = inputBlock.getElementsByClassName("js-validation-message")[0]
        validationErrorBlock.style.display = "none"
    }

    static setInputAsInvalid(inputBlock) {
        let validationErrorBlock = inputBlock.getElementsByClassName("js-validation-message")[0]
        validationErrorBlock.style.display = "block"
    }

    static isNameValid(input_value) {
        let validRegex = /^[a-zA-Z ]+$/;
        return validRegex.test(input_value)
    }

    static isAddressValid(input_value) {
        let validRegex = /^[#.0-9a-zA-Z\s,-/]+$/;
        return validRegex.test(input_value)
    }

    static isEmailValid(input_value) {
        let validRegex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return validRegex.test(input_value)
    }

    static isPasswordValid(input_value) {
        return input_value.length >= 8
    }

    static isRepeatPasswordValid(input_value) {
        let password = this.getInputBlockFromCode(this.INPUT_CODES.PASSWORD).querySelector("input").value;
        return password === input_value;
    }

    static isCountryValid(input_value) {
        let nameRegex = /^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/;
        return nameRegex.test(input_value)
    }

    static isPostCodeValid(input_value) {
        let postCodeRegex = /^\d{5}(-\d{4})?$/
        return postCodeRegex.test(input_value);
    }

    static isPhoneValid(input_value) {
        let phoneNumberRegex = /^[+]?[(]?[0-9]{3}[)]?[-\s.]?[0-9]{3}[-\s.]?[0-9]{4,6}$/;
        return phoneNumberRegex.test(input_value)
    }

    static isProductNameValid(input_value) {
        let productNameRegex = /[a-zA-Z0-9\s]+?$/;
        return productNameRegex.test(input_value)
    }

    static isPriceValid(input_value) {
        let priceRegex = /^-?\d+\.?\d*$/;
        return priceRegex.test(input_value)
    }

    static isPhotoValid(inputElement) {
        if (!inputElement.files || inputElement.files.length === 0) {
            return false; // No file is selected
        }

        const file = inputElement.files[0];
        const validImageTypes = ['image/jpeg', 'image/png', 'image/gif'];

        return validImageTypes.includes(file.type);
    }

    static isPurchaseDescriptionValid(input_value) {
        let purchaseDescriptionRegex = /[a-zA-Z0-9,.;:'"#$%()/@\s]+$/;
        return purchaseDescriptionRegex.test(input_value)
    }
}
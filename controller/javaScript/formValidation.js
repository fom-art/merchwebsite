class Validation {
    INPUT_CODES = {
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

    validateSignInForm() {
        this.validateInputs([this.INPUT_CODES.EMAIL, this.INPUT_CODES.PASSWORD]);
    }

    validateSignUpForm() {
        this.validateInputs([
            this.INPUT_CODES.EMAIL, this.INPUT_CODES.NAME, this.INPUT_CODES.SURNAME,
            this.INPUT_CODES.PASSWORD, this.INPUT_CODES.REPEAT_PASSWORD, this.INPUT_CODES.ADDRESS,
            this.INPUT_CODES.COUNTRY, this.INPUT_CODES.CITY, this.INPUT_CODES.POST_CODE,
            this.INPUT_CODES.PHONE_NUMBER
        ]);
    }

    validatePurchaseForm() {
        this.validateInputs([
            this.INPUT_CODES.EMAIL, this.INPUT_CODES.NAME, this.INPUT_CODES.SURNAME,
            this.INPUT_CODES.ADDRESS, this.INPUT_CODES.COUNTRY, this.INPUT_CODES.CITY,
            this.INPUT_CODES.POST_CODE, this.INPUT_CODES.PHONE_NUMBER,
            this.INPUT_CODES.PURCHASE_DESCRIPTION
        ]);
    }

    validateAdminForm() {
        this.validateInputs([
            this.INPUT_CODES.PRODUCT_NAME, this.INPUT_CODES.PRICE, this.INPUT_CODES.PHOTO
        ]);
    }

    validateForgotPasswordForm() {
        this.validateInputs([this.INPUT_CODES.EMAIL]);
    }

    validateUserDetailsForm() {
        this.validateInputs([
            this.INPUT_CODES.EMAIL, this.INPUT_CODES.NAME, this.INPUT_CODES.SURNAME,
            this.INPUT_CODES.PASSWORD, this.INPUT_CODES.ADDRESS,
            this.INPUT_CODES.COUNTRY, this.INPUT_CODES.CITY, this.INPUT_CODES.POST_CODE,
            this.INPUT_CODES.PHONE_NUMBER
        ])
    }

    validateInputs(inputCodes) {
        inputCodes.forEach(code => {
            const inputBlock = this.getInputBlockFromCode(code);
            this.validateInput(inputBlock, code);
        });
    }

    validateInput(inputBlock, inputCode) {
        if (this.isInputValid(inputBlock, inputCode)) {
            this.setInputAsValid(inputBlock);
        } else {
            this.setInputAsInvalid(inputBlock);
        }
    }

    getInputBlockFromCode(inputCode) {
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

    isInputValid(inputBlock, inputCode) {
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

    setInputAsValid(inputBlock) {
        inputBlock.classList.remove('invalid');
        inputBlock.classList.add('valid');
    }

    setInputAsInvalid(inputBlock) {
        inputBlock.classList.remove('valid');
        inputBlock.classList.add('invalid');
    }

    isNameValid(input_value) {
        let validRegex = /^[a-zA-Z ]+$/;
        return validRegex.test(input_value)
    }

    isAddressValid(input_value) {
        let validRegex = /^[#.0-9a-zA-Z\s,-/]+$/;
        return validRegex.test(input_value)
    }

    isEmailValid(input_value) {
        let validRegex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return validRegex.test(input_value)
    }

    isPasswordValid(input_value) {
        return input_value.length >= 8
    }

    isRepeatPasswordValid(input_value) {
        let password = this.getPasswordInputValue();
        return password === input_value;
    }

    isCountryValid(input_value) {
        let nameRegex = /^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/;
        return nameRegex.test(input_value)
    }

    isPostCodeValid(input_value) {
        let postCodeRegex = /^\d{5}(-\d{4})?$/
        return postCodeRegex.test(input_value);
    }

    isPhoneValid(input_value) {
        let phoneNumberRegex = /^[+]?[(]?[0-9]{3}[)]?[-\s.]?[0-9]{3}[-\s.]?[0-9]{4,6}$/;
        return phoneNumberRegex.test(input_value)
    }

    isProductNameValid(input_value) {
        let productNameRegex = /[a-zA-Z0-9\s]+?$/;
        return productNameRegex.test(input_value)
    }

    isPriceValid(input_value) {
        let priceRegex = /^-?\d+\.?\d*$/;
        return priceRegex.test(input_value)
    }

    isPhotoValid(inputElement) {
        if (!inputElement.files || inputElement.files.length === 0) {
            return false; // No file is selected
        }

        const file = inputElement.files[0];
        const validImageTypes = ['image/jpeg', 'image/png', 'image/gif'];

        return validImageTypes.includes(file.type);
    }

    isPurchaseDescriptionValid(input_value) {
        let purchaseDescriptionRegex = /[a-zA-Z0-9,.;:'"#$%()/@\s]+$/;
        return purchaseDescriptionRegex.test(input_value)
    }

    getPasswordInputValue() {
        return document.getElementById("password-input").value;
    }
}
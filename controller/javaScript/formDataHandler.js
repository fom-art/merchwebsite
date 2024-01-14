class Input {
    constructor(id, value) {
        this.id = id;
        this.value = value;
    }

    get value() {
        return this._value;
    }

    // Setter method
    set value(newValue) {
        if (newValue != null){
            this._value = newValue;
            const inputElement = document.querySelector("#" + this.id);
            if (inputElement) {
                inputElement.value = newValue;
            } else {
                console.error("Input element not found for ID: " + this.id);
            }
        }
    }
}

class Form {
    constructor($inputsList) {
        this.inputs = $inputsList;
    }

    setStorageDataForAllInputs() {
        this.inputs.forEach(input => {
            // Retrieve the input value from localStorage based on its ID
            const savedValue = localStorage.getItem(input.id);
            const newValue = savedValue !== null && input.value === "" ? savedValue : input.value;

            // Update the input value in both the Form object and localStorage
            input.value = newValue;
            localStorage.setItem(input.id, newValue);
        });
    }

    setInputListeners() {
        this.inputs.forEach(input => {
            // Attach an input event listener to each input element
            const inputElement = document.getElementById(input.id);
            if (inputElement) {
                inputElement.addEventListener('input', () => {
                    input.value = inputElement.value;
                    localStorage.setItem(input.id, inputElement.value);
                });
            }
        });
    }
}

const signUpForm = new Form([
    new Input('email', null),
    new Input('password', null),
    new Input('repeat-password', null),
    new Input('name', null),
    new Input('surname', null),
    new Input('address', null),
    new Input('country', null),
    new Input('city', null),
    new Input('post-code', null),
    new Input('phone-number', null),
]);

const signInForm = new Form([
    new Input('email', null),
    new Input('password', null),
]);

const forgotPasswordForm = new Form([
    new Input('email', null),
]);

const userDetailsForm = new Form([
    new Input('email', null),
    new Input('name', null),
    new Input('surname', null),
    new Input('address', null),
    new Input('country', null),
    new Input('city', null),
    new Input('post-code', null),
    new Input('phone-number', null),
    new Input('purchase-description', null)
]);

const addProductForm = new Form([
    new Input('product-name', null),
    new Input('product-price', null),
    new Input('product-type', null),
    new Input('product-description', null),
    new Input('photo', null),
    new Input('product-description', null),
]);

const formsMap = new Map([
    [FORM_IDS.SIGN_UP, signUpForm],
    [FORM_IDS.SIGN_IN, signInForm],
    [FORM_IDS.FORGOT_PASSWORD, forgotPasswordForm],
    [FORM_IDS.USER_DETAILS, userDetailsForm],
    [FORM_IDS.ADD_PRODUCT, addProductForm],
]);


const formElement = document.querySelectorAll('form')[0];
const formObject = formsMap.get(formElement.id);
if (formObject) {
    formObject.setStorageDataForAllInputs();
    formObject.setInputListeners();
} else {
    console.error('Form not found in formsMap.');
}

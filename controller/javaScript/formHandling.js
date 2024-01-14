// RegexConstants for Form IDs
const FORM_IDS = {
    SIGN_UP: "sign-up",
    SIGN_IN: "sign-in",
    FORGOT_PASSWORD: "forgot-password",
    USER_DETAILS: "user-details",
    ADD_PRODUCT: "add-product",
};

// Adding Event Listeners
addClickListener("confirm-button-sign-up", () => sendPostRequest(FORM_IDS.SIGN_UP));
addClickListener("confirm-button-sign-in", () => sendPostRequest(FORM_IDS.SIGN_IN));
addClickListener("confirm-button-forgot-password", () => sendPostRequest(FORM_IDS.FORGOT_PASSWORD));
addClickListener("confirm-button-purchase", () => sendPostRequest(FORM_IDS.PURCHASE));
addClickListener("confirm-button-user-details", () => sendPostRequest(FORM_IDS.USER_DETAILS));
addClickListener("confirm-button-log-out", () => logOut());
addClickListener("confirm-button-admin", () => sendPostRequest(FORM_IDS.ADMIN));
addClickListener("confirm-registration-success-button", submitRegistrationSuccessForm);

function addClickListener(elementId, callback) {
    const element = document.getElementById(elementId);
    console.log("please")
    if (element) {
        element.addEventListener("click", callback);
    }
}

function sendPostRequest(formId) {
    let validationResult = false;
    console.log("Hi")
    switch (formId) {
        case FORM_IDS.SIGN_IN:
            validationResult = Validation.validateSignInForm();
            break;
        case FORM_IDS.SIGN_UP:
            validationResult = Validation.validateSignUpForm();
            break;
        case FORM_IDS.FORGOT_PASSWORD:
            validationResult = Validation.validateForgotPasswordForm();
            break;
        case FORM_IDS.PURCHASE:
            validationResult = Validation.validatePurchaseForm();
            break;
        case FORM_IDS.ADMIN:
            validationResult = Validation.validateAdminForm();
            break;
        case FORM_IDS.USER_DETAILS:
            validationResult = Validation.validateUserDetailsForm();
    }

    if (validationResult) {
        submitForm();
    } else {
        let validationErrorBlock = document.querySelector("#validation-result-closure").getElementsByClassName("js-validation-message")[0]
        validationErrorBlock.style.display = "block"
    }
}

function submitForm() {
    document.querySelector("form").submit();
    localStorage.clear();
}

function submitRegistrationSuccessForm() {
    document.getElementById("registration-success-form").submit();
}

function logOut() {
    console.log('Click')
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "http://zwa.toad.cz/~fomenart/index.php/user", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("action=unset");
    xhr.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            window.location.href = "http://zwa.toad.cz/~fomenart/index.php/sign-in";
        }
    };
}

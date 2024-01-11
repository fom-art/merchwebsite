// RegexConstants for Form IDs
const FORM_IDS = {
    SIGN_IN: 101,
    SIGN_UP: 102,
    FORGOT_PASSWORD: 103,
    PURCHASE: 104,
    ADMIN: 105,
    USER_DETAILS: 106
};

// Adding Event Listeners
addClickListener("confirm-button-sign-up", () => sendPostRequest(FORM_IDS.SIGN_UP));
addClickListener("confirm-button-sign-in", () => sendPostRequest(FORM_IDS.SIGN_IN));
addClickListener("confirm-button-forgot-password", () => sendPostRequest(FORM_IDS.FORGOT_PASSWORD));
addClickListener("confirm-button-purchase", () => sendPostRequest(FORM_IDS.PURCHASE));
addClickListener("confirm-button-admin", () => sendPostRequest(FORM_IDS.ADMIN));
addClickListener("confirm-registration-success-button", submitRegistrationSuccessForm);

function addClickListener(elementId, callback) {
    const element = document.getElementById(elementId);
    if (element) {
        element.addEventListener("click", callback);
    }
}

function sendPostRequest(formId) {
    let validationResult = false;

    console.log("Click")

    switch (formId) {
        case FORM_IDS.SIGN_IN:
            validationResult = new Validation().validateSignInForm;
            break;
        case FORM_IDS.SIGN_UP:
            validationResult = new Validation().validateSignUpForm;
            break;
        case FORM_IDS.FORGOT_PASSWORD:
            validationResult = new Validation().validateForgotPasswordForm;
            break;
        case FORM_IDS.PURCHASE:
            validationResult = new Validation().validatePurchaseForm;
            break;
        case FORM_IDS.ADMIN:
            validationResult = new Validation().validateAdminForm;
            break;
        case FORM_IDS.USER_DETAILS:
            validationResult = new Validation().validateUserDetailsForm;
    }

    if (validationResult) {
        submitForm();
    }
}

function submitForm() {
    document.querySelector("form").submit();
}

function submitRegistrationSuccessForm() {
    document.getElementById("registration-success-form").submit();
}

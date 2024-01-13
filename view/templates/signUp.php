<?php use view\utils\sections\SignUpSections; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign up</title>
    <link rel="stylesheet" href="<?php echo HrefsConstants::FORM_STYLES ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500;700&family=Roboto:wght@500&display=swap"
          rel="stylesheet">
</head>
<body>
<?php
Icons::printBackArrowIcon(HrefsConstants::SIGN_IN, "back-button");
if (($this->isRegistrationSuccess ?? false)
    && (!$this->isRegisteredAlready ?? true)) {
    SignUpSections::renderSuccessMessage();
} else {
    SignUpSections::renderForm(
        isFormValid: $this->isFormValid,
        isAlreadyRegistered: $this->isRegisteredAlready,
        email: $this->email,
        password: $this->password,
        passwordRepeat: $this->passwordRepeat,
        name: $this->name,
        surname: $this->surname,
        address: $this->address,
        country: $this->country,
        city: $this->city,
        postCode: $this->postCode,
        phoneNumber: $this->phoneNumber,
    );
}
SignUpSections::renderScripts();
?>
</body>
</html>


<?php use view\utils\sections\SignUpSections; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Account</title>
    <link rel="stylesheet" href="<?php echo HrefsConstants::FORM_STYLES ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500;700&family=Roboto:wght@500&display=swap"
          rel="stylesheet">
</head>
<body>
<?php
Icons::printBackArrowIcon(HrefsConstants::INDEX, "back-button");
if ($this->isRegistered ?? false) {
    SignUpSections::renderSuccessMessage();
} else {
    SignUpSections::renderForm(isPostSet: false, isFormValid: false, isAlreadyRegistered: false,
        email: "",
        password: "",
        passwordRepeat: "",
        name: "",
        surname: "",
        address: "",
        country: "",
        city: "",
        postCode: "",
        phoneNumber: "");
}
SignUpSections::renderScripts();
?>
</body>
</html>


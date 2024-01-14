<?php use view\utils\sections\ForgotPasswordSections; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="<?php echo HrefsConstants::FORM_STYLES ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500;700&family=Roboto:wght@500&display=swap"
          rel="stylesheet">
</head>
<body>
<?php
Icons::printBackArrowIcon(HrefsConstants::SIGN_IN, "back-button");
if ($this->isUserWithEmailFound ?? false) {
    ForgotPasswordSections::renderConfirmationMessage();
} else {
    ForgotPasswordSections::renderForm(
        isUserWithEmailFound: $this->isUserWithEmailFound,
        email: $this->email,
        csrfToken: $this->csrfToken,
        isCsrfSuccess: $this->isCsrfSuccess

    );
}
ForgotPasswordSections::renderScripts();
?>
</body>
</html>


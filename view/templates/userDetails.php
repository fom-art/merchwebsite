<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Change User Details</title>
    <link rel="stylesheet" href="<?php use view\utils\sections\UserDetailsSections;

    echo HrefsConstants::FORM_STYLES?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500;700&family=Roboto:wght@500&display=swap"
          rel="stylesheet">
</head>
<body>
<?php
Icons::printBackArrowIcon(HrefsConstants::INDEX, "back-button");
if ($this->isRegistered ?? false) {
    UserDetailsSections::renderSuccessMessage();
} else {
    UserDetailsSections::renderForm(
        isFormValid: $this->isFormValid,
        email: $this->email,
        password: $this->password,
        name: $this->name,
        surname: $this->surname,
        address: $this->address,
        country: $this->country,
        city: $this->city,
        postCode: $this->postCode,
        phoneNumber: $this->phoneNumber,
    );
}
?>
</body>
</html>


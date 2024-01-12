<?php use view\utils\sections\PurchaseSections; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Purchase Product</title>
    <link rel="stylesheet" href="<?php echo HrefsConstants::FORM_STYLES ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500;700&family=Roboto:wght@500&display=swap"
          rel="stylesheet">
</head>
<body>
<?php
Icons::printBackArrowIcon(HrefsConstants::INDEX, "back-button");
if ($this->isRegistered ?? false) {
    PurchaseSections::renderSuccessMessage();
} else {
    PurchaseSections::renderForm(
        isFormValid: $this->isFormValid,
        email: $this->email,
        name: $this->name,
        surname: $this->surname,
        address: $this->address,
        country: $this->country,
        city: $this->city,
        postCode: $this->postCode,
        phoneNumber: $this->phoneNumber,
        purchaseDescription: $this->purchaseDescription
    );
}
PurchaseSections::renderScripts();
?>
</body>
</html>


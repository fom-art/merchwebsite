<?php

use model\database\DatabaseHandler;
use view\utils\sections\AdminSections;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add product</title>
    <link rel="stylesheet" href="<?php echo HrefsConstants::FORM_STYLES?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500;700&family=Roboto:wght@500&display=swap"
          rel="stylesheet">
</head>
<body>
<?php
Icons::printBackArrowIcon(HrefsConstants::INDEX, "back-button");
if ($this->addProductResult ?? false) {
    AdminSections::renderSuccessMessage();
} else {
    AdminSections::renderForm(
        productName: $this->productName,
        productPrice: $this->productPrice,
        productType: $this->productType,
        productDescription: $this->productDescription,
        productPhoto: $this->productPhoto,
        addProductResult: $this->addProductResult,
        csrfToken: $this->csrfToken,
        isCsrfSuccess: $this->isCsrfSuccess
    );
}
AdminSections::renderScripts();
?>
</body>
</html>


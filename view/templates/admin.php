<?php

use model\database\DatabaseHandler;
use view\utils\sections\AdminSections;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ANFO</title>
    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?php echo HrefsConstants::HOMEPAGE_STYLES ?>">
    <link rel="stylesheet" href="<?php echo HrefsConstants::HOMEPAGE_STYLES_PRINT ?>" media="print">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500;700&family=Roboto:wght@500&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Roboto:ital,wght@1,300&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500;800&family=Roboto:wght@500&family=Source+Sans+Pro&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500;800&family=Roboto+Mono:wght@300&family=Roboto:wght@500&family=Source+Sans+Pro:wght@300;400&display=swap"
          rel="stylesheet">
</head>
<body>
<?php
Icons::printBackArrowIcon(HrefsConstants::INDEX, "back-button");
if ($this->isRegistered ?? false) {
    (new DatabaseHandler)->createProduct("", "", "", "", "",);
    AdminSections::renderSuccessMessage();
} else {
    AdminSections::renderForm(false, "", "", "", "", "",);
}
AdminSections::renderScripts();
?>
</body>
</html>


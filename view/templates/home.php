<?php use view\utils\sections\HomeSections;


$targetDir = "/home/fomenart/www/view/images";

if (!is_dir($targetDir)) {
    echo "Error: Target directory does not exist ";
}

if (!is_writable($targetDir)) {
    echo "Error: Target directory is not writable.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ANFO</title>
    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?php echo HrefsConstants::HOMEPAGE_STYLES?>">
    <link rel="stylesheet" href="<?php echo HrefsConstants::HOMEPAGE_STYLES_PRINT?>" media="print">
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
HomeSections::renderHeader($this->isRegistered ?? false, $this->isAdmin ?? false);
HomeSections::renderNavigation();
HomeSections::renderMainContent();
HomeSections::renderFooter();
HomeSections::renderScripts();
?>
</body>
</html>


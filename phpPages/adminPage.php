<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include_once("../phpClassesConstants/Constants.php");
session_start();
if (!in_array($_SESSION['user']['id'], Constants::ADMIN_ID_COLLECTION)) {
    header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create a product</title>
    <link rel="stylesheet" href="../styles/formStyles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500;700&family=Roboto:wght@500&display=swap"
          rel="stylesheet">
</head>
<body>
<?php
require_once("../phpClassesUtils/Validation.php");
require_once("../phpClassesUtils/Utils.php");
require_once("../database/DatabaseHandler.php");
$validation = new Validation();
$utils = new Utils();
$database = new DatabaseHandler();
$productName = $productPrice = $photo = null;
$isFormValid = false;
if ($utils->isPostSet($_POST)) {
    $productName = $_POST["product-name"];
    $productPrice = $_POST["product-price"];
    $photo = $_FILES["photo-file"];
    $file_extension = pathinfo($photo["name"], PATHINFO_EXTENSION);
    $productType = $_POST["product-type"];
    $productDescription = $_POST["product-description"];
    $isFormValid = $validation->validateProductForm($productName, $productPrice, $productType, $productDescription, $file_extension);
}
?>
<div>
    <a href="../index.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
            <path d="M0 0h48v48h-48z" fill="none"/>
            <path d="M40 22h-24.34l11.17-11.17-2.83-2.83-16 16 16 16 2.83-2.83-11.17-11.17h24.34v-4z"/>
        </svg>
    </a>
</div>
<div class="<?php if ($isFormValid) {
    echo "block-hidden";
} else {
    echo "content-block";
} ?>">
    <div class="header-block">
        <div class="title-block">
            <h1 class="title">Add a product</h1>
        </div>
    </div>
    <div class="form-block">
        <form action="adminPage.php" method="post" enctype="multipart/form-data">
            <div class="two-inputs-in-one-row-block">
                <?php
                // Product Name input
                echo Utils::printInputBlock("product-name-input-block", "Product Name", "product-name", $productName, "Invalid Name!", $validation->isProductNameValid($productName), $utils->isPostSet($_POST));

                // Price input
                echo Utils::printInputBlock("product-price-input-block", "Price", "product-price", $productPrice, "Invalid Price", $validation->isPriceValid($productPrice), $utils->isPostSet($_POST));
                ?>
            </div>

            <div class="two-inputs-in-one-row-block">
                <?php
                // Product Type input
                echo Utils::printInputBlock("product-type-input-block", "Product Type", "product-type", $productType, "Invalid Product Type!", $validation->isProductTypeValid($productType), $utils->isPostSet($_POST));

                // Product Description input
                echo Utils::printInputBlock("product-description-input-block", "Product Description", "product-description", $productDescription, "Invalid Description!", $validation->isProductDescriptionValid($productDescription), $utils->isPostSet($_POST));
                ?>
            </div>

            <?php
            // Photo input
            echo Utils::printInputBlock("photo-input-block", "Photo", "photo-file", $file_extension, "Invalid Photo!", $validation->isProductPhotoExtensionValid($file_extension), $utils->isPostSet($_POST));
            ?>

            <button class="confirm-button" id="confirm-button-admin" type="submit" name="confirm" value="confirm">
                Confirm
            </button>

            <?php
            if ($utils->isPostSet($_POST) && $isFormValid) {
                echo "<div class='validation-error-block'><p>Invalid inputs. Check the inputs marked by *</p></div>";
            }
            ?>
        </form>
    </div>
</div>
<div class="<?php if ($isFormValid) {
    echo "content-block";
} else {
    echo "block-hidden";
} ?>">
    <?php
    if ($isFormValid) {
        $database->createProduct($productName, $productPrice, $productType, $productDescription, $photo);
    } ?>
    <h1>The product was added! :)</h1>
    <div class="form-block">
        <form id="registration-success-form" name="form" action="../index.php" method="post">
            <button class="confirm-button" id="confirm-registration-success-button" name="confirm" value="confirm"
                    type="button">
                Confirm
            </button>
        </form>
    </div>
</div>
<script src="../javaScript/formHandling.js"></script>
</body>
</html>
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);

include_once("../phpClassesConstants/Constants.php");
session_start();

// Check if the user is an admin, if not, redirect
if (!in_array($_SESSION['user']['id'], Constants::ADMIN_ID_COLLECTION)) {
    header("Location: ../index.php");
    exit();
}

require_once("../phpClassesUtils/Validation.php");
require_once("../phpClassesUtils/Utils.php");
require_once("../database/DatabaseHandler.php");

$validation = new Validation();
$utils = new Utils();
$database = new DatabaseHandler();

$productName = $productPrice = $productType = $productDescription = '';
$fileExtension = '';

$isFormValid = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productName = $_POST["product-name"];
    $productPrice = $_POST["product-price"];
    $productType = $_POST["product-type"];
    $productDescription = $_POST["product-description"];
    $fileExtension = pathinfo($_FILES["photo-file"]["name"], PATHINFO_EXTENSION);

    // Validate form inputs
    $isFormValid = $validation->validateProductForm($productName, $productPrice, $productType, $productDescription, $fileExtension);

    if ($isFormValid) {
        // Handle file upload securely
        $targetDirectory = "../images/";
        $uploadedFileName = $utils->generateRandomFileName($fileExtension);
        $targetFilePath = $targetDirectory . $uploadedFileName;

        if (move_uploaded_file($_FILES["photo-file"]["tmp_name"], $targetFilePath)) {
            // File uploaded successfully
            $database->createProduct($productName, $productPrice, $productType, $productDescription, $uploadedFileName);
            $isFormValid = true;
        } else {
            // File upload failed
            $isFormValid = false;
        }
    }
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
<div>
    <a href="../index.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
            <path d="M0 0h48v48h-48z" fill="none"/>
            <path d="M40 22h-24.34l11.17-11.17-2.83-2.83-16 16 16 16 2.83-2.83-11.17-11.17h24.34v-4z"/>
        </svg>
    </a>
</div>

<div class="<?php echo $isFormValid ? "block-hidden" : "content-block"; ?>">
    <div class="header-block">
        <div class="title-block">
            <h1 class="title">Add a product</h1>
        </div>
    </div>
    <div class="form-block">
        <form id="form-admin" action="adminPage.php" method="post" enctype="multipart/form-data">
            <!-- Form inputs and validation blocks here -->
        </form>
    </div>
</div>

<div class="<?php echo $isFormValid ? "content-block" : "block-hidden"; ?>">
    <?php if ($isFormValid): ?>
        <?php $database->createProduct($productName, $productPrice, $productType, $productDescription, $uploadedFileName); ?>
        <h1>The product was added! :)</h1>
        <div class="form-block">
            <form id="registration-success-form" name="form" action="../index.php" method="post">
                <button class="confirm-button" id="confirm-registration-success-button" name="confirm" value="confirm"
                        type="submit">Confirm
                </button>
            </form>
        </div>
    <?php endif; ?>
</div>

<script src="../javaScript/formHandling.js"></script>
</body>
</html>

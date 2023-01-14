<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create an account</title>
    <link rel="stylesheet" href="../styles/adminPageStyles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500;700&family=Roboto:wght@500&display=swap"
          rel="stylesheet">
</head>
<body>
<?php
require_once("../phpClassesUtils/Validation.php");
require_once("../phpClassesUtils/Utils.php");
$validation = new Validation();
$utils = new Utils();
$isFormValid = $productName = $productPrice = $photo = null;
if ($utils->isPostSet($_POST)) {
    $isFormValid = true;
    $productName = $_POST["product-name"];
    $productPrice = $_POST["product-price"];
    $photo = $_POST["photo"];
    $productType = $_POST["product-type"];
    $productDescription = $_POST["product-description"];
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
<div class="header-block">
    <div class="title-block">
        <h1 class="title">Add a product</h1>
    </div>
</div>
<div class="form-block">
    <form action="adminPage.php" method="post">
        <div class="two-inputs-in-one-row-block">
            <div class="input-block" id="product-name-input-block">
                <div class="label-block">
                    <label for="product-name-input">Product Name:</label>
                </div>
                <input type="text" id="product-name-input" name="product-name" value="<?php if ($utils->isPostSet($_POST)) {echo $productName;}?>" required>
                <div class="validation-error-block">
                    <p class="js-validation-message">Invalid Name!</p>
                    <?php
                    if ($utils->isPostSet($_POST) && !$validation->isProductPriceValid($productPrice)) {
                            echo "<p>*</p>";
                            $isFormValid = false;
                    }
                    ?>
                </div>
            </div>
            <div class="input-block" id="product-price-input-block">
                <div class="label-block">
                    <label for="price-input">Price:</label>
                </div>
                <input type="text" id="price-input" name="product-price" value="<?php if ($utils->isPostSet($_POST)) {echo $productPrice;}?>" required>
                <div class="validation-error-block">
                    <p class="js-validation-message">Invalid Price</p>
                    <?php
                    if ($utils->isPostSet($_POST) && !$validation->isProductPriceValid($productPrice)) {
                            echo "<p>*</p>";
                            $isFormValid = false;
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="two-inputs-in-one-row-block">
            <div class="input-block" id="product-type-input-block">
                <div class="label-block">
                    <label for="product-type-input">Product Type:</label>
                </div>
                <input type="text" id="product-type-input" name="product-type" value="<?php if ($utils->isPostSet($_POST)) {echo $productType;}?>" required>
                <div class="validation-error-block">
                    <p class="js-validation-message">Invalid Product Type!</p>
                    <?php
                    if ($utils->isPostSet($_POST) && !$validation->isProductTypeValid($productType)) {
                        echo "<p>*</p>";
                        $isFormValid = false;
                    }
                    ?>
                </div>
            </div>
            <div class="input-block" id="product-description-input-block">
                <div class="label-block">
                    <label for="product-description-input">Product Description:</label>
                </div>
                <input type="text" id="product-description-input" name="product-description" value="<?php if ($utils->isPostSet($_POST)) {echo $productDescription;}?>" required>
                <div class="validation-error-block">
                    <p class="js-validation-message">Invalid Description!</p>
                    <?php
                    if ($utils->isPostSet($_POST) && !$validation->isProductDescriptionValid($productDescription)) {
                        echo "<p>*</p>";
                        $isFormValid = false;
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="photo-input-block" id="photo-input-block">
            <div class="label-block">
                <label for="photo-input">Photo:</label>
            </div>
            <input type="file" id="photo-input" name="photo" value="<?php if ($utils->isPostSet($_POST)) {echo $photo;}?>" required>
            <div class="validation-error-block">
                <p class="js-validation-message">Invalid Photo!</p>
                <?php
                if ($utils->isPostSet($_POST) && !$validation->isProductPhotoValid($photo)) {
                        echo "<p>*</p>";
                        $isFormValid = false;
                }
                ?>
            </div>
        </div>
        <button class="confirm-button" id="confirm-button-admin" type="button" name="confirm" value="confirm">Confirm</button>
    </form>
</div>
<script src="../javaScript/formHandling.js"></script>
</body>
</html>
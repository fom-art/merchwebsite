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
    <form>
        <div class="two-inputs-in-one-row-block">
            <div class="input-block" id="product-name-input-block">
                <div class="label-block">
                    <label for="product-name-input">Product Name:</label>
                </div>
                <input type="text" id="product-name-input" name="product-name" minlength="8" required>
                <div class="validation-error-block">
                    <p>Invalid Name!</p>
                </div>
            </div>
            <div class="input-block" id="product-price-input-block">
                <div class="label-block">
                    <label for="price-input">Price:</label>
                </div>
                <input type="number" id="price-input" name="price" minlength="8" required>
                <div class="validation-error-block">
                    <p>Invalid Price</p>
                </div>
            </div>
        </div>
        <div class="photo-input-block" id="photo-input-block">
            <div class="label-block">
                <label for="photo-input">Photo:</label>
            </div>
            <input type="file" id="photo-input" name="photo" minlength="8" required>
            <div class="validation-error-block">
                <p>Invalid Photo!</p>
            </div>
        </div>
        <button class="submit-button" type="button" onclick="validateAddProductForm()">Submit</button>
    </form>
</div>
<script src="../javaScript/formValidation.js"></script>
</body>
</html>
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
session_start();
require_once("../phpClassesUtils/Validation.php");
require_once("../phpClassesUtils/Utils.php");
require_once("../database/DatabaseHandler.php");

$validation = new Validation();
$utils = new Utils();
$database = new DatabaseHandler();

// Initialize variables
$email = $name = $surname = $address = $country = $city = $postCode = $phoneNumber = $password = $passwordRepeat = $purchaseDescription = null;
$isFormValid = false;
$isPostSet = $utils->isPostSet($_POST);

// Process form submission
if ($isPostSet) {
    $email = $_POST["email"];
    $name = $_POST["name"];
    // ... continue fetching other POST data ...
    $purchaseDescription = $_POST["purchase-description"];

    // Validate the form data
    $isFormValid = $validation->validatePurchaseForm($email, $name, $surname, $address, $country, $city, $postCode, $phoneNumber, $purchaseDescription);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Purchase products</title>
    <link rel="stylesheet" href="../styles/formStyles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500;700&family=Roboto:wght@500&display=swap"
          rel="stylesheet">
</head>
<body>

<!-- Navigation Link -->
<div>
    <a href="../index.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
            <path d="M0 0h48v48h-48z" fill="none"/>
            <path d="M40 22h-24.34l11.17-11.17-2.83-2.83-16 16 16 16 2.83-2.83-11.17-11.17h24.34v-4z"/>
        </svg>
    </a>
</div>

<!-- Purchase Form Block -->
<div class="<?php echo $isFormValid ? 'block-hidden' : 'content-block'; ?>">
    <h1>Make a purchase</h1>
    <div class="form-block">
        <form name="form" action="purchasePage.php" method="post">
            <?php
            //Email input
            echo Utils::printInputBlock("email-input-block", "Email", "email", $email, "Invalid Email", $validation->isEmailValid($email), $isPostSet);
            ?>

            <div class="two-inputs-in-one-row-block">
                <?php
                //Name input
                echo Utils::printInputBlock("name-input-block", "Name", "name", $name, "Invalid Name", $validation->isNameValid($name), $isPostSet);
                //Surname input
                echo Utils::printInputBlock("surname-input-block", "Surname", "surname", $surname, "Invalid Surname", $validation->isNameValid($surname), $isPostSet);
                ?>
            </div>

            <?php
            //Password input
            echo Utils::printInputBlock("password-input-block", "Password", "password", $password, "Invalid Password", $validation->isPasswordValid($password), $isPostSet);
            //Repeat password input
            echo Utils::printInputBlock("repeat-password-input-block", "Repeat the password", "password-repeat", $passwordRepeat, "Passwords don't match", $validation->isPasswordRepeatValid($password, $passwordRepeat), $isPostSet);
            //Address input
            echo Utils::printInputBlock("address-input-block", "Address", "address", $address, "Invalid Address", $validation->isAddressValid($address), $isPostSet);
            //Country input
            echo Utils::printInputBlock("country-input-block", "Country", "country", $country, "Invalid Country", $validation->isCountryOrCityValid($country), $isPostSet);
            //City input
            echo Utils::printInputBlock("city-input-block", "City", "city", $city, "Invalid City", $validation->isCountryOrCityValid($city), $isPostSet);
            ?>

            <div class="two-inputs-in-one-row-block">
                <?php
                //Post code input
                echo Utils::printInputBlock("post-code-input-block", "Post Code", "post-code", $postCode, "Invalid Post Code", $validation->isPostCodeValid($postCode), $isPostSet);
                //Phone number input
                echo Utils::printInputBlock("phone-number-input-block", "Phone Number", "phone-number", $phoneNumber, "Invalid Phone Number", $validation->isPhoneNumberValid($phoneNumber), $isPostSet);
                ?>
            </div>

            <?php
            // Purchase Description
            echo Utils::printInputBlock("purchase-description-input-block", "Describe your purchase", "purchase-description", $purchaseDescription, "Invalid Purchase Description", $validation->isPurchaseDescriptionValid($city), $isPostSet);
            ?>

            <!-- Validation Error Message -->
            <div class="validation-error-block">
                <?php
                if ($utils->isPostSet($_POST) && $isFormValid) {
                    echo "<p>Invalid inputs. Check the inputs marked by *</p>";
                }
                ?>
            </div>

            <button class="confirm-button" id="confirm-button-purchase" name="confirm" value="confirm" type="button">
                Confirm
            </button>
        </form>
    </div>
</div>

<!-- Success Message Block -->
<div class="<?php echo $isFormValid ? 'content-block' : 'block-hidden'; ?>">
    <h1>Purchase was made successfully!</h1>
    <h2>Wait for the response on your email</h2>
    <!-- Confirmation Form -->
    <div class="form-block">
        <form id="registration-success-form" name="form" action="../index.php" method="post">
            <button class="confirm-button" id="confirm-registration-success-button" name="confirm" value="confirm"
                    type="button">
                Confirm
            </button>
        </form>
    </div>
</div>

<!-- Empty Block for Spacing -->
<div class="empty-block">
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
</div>

<script src="../javaScript/formHandling.js"></script>
</body>
</html>
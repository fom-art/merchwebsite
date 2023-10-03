<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: ../index.php");
    exit;
}

require_once("../phpClassesUtils/Validation.php");
require_once("../phpClassesUtils/Utils.php");
require_once("../database/DatabaseHandler.php");

$validation = new Validation();
$utils = new Utils();
$database = new DatabaseHandler();

$email = $name = $surname = $address = $country = $city = $postCode = $phoneNumber = $purchaseDescription = null;
$isFormValid = false;

if ($utils->isPostSet($_POST)) {
    $email = $_POST["email"];
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $address = $_POST["address"];
    $country = $_POST["country"];
    $city = $_POST["city"];
    $postCode = $_POST["post-code"];
    $phoneNumber = $_POST["phone-number"];
    $purchaseDescription = $_POST["purchase-description"];

    $isFormValid = $validation->validatePurchaseForm(
        $email, $name, $surname, $address, $country, $city, $postCode, $phoneNumber, $purchaseDescription
    );
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Information</title>
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
<div class="<?= $isFormValid ? 'block-hidden' : 'content-block'; ?>">
    <h1>Change User Data</h1>
    <div class="form-block">
        <form name="form" action="userPage.php" method="post">
            <?php
            $fields = array(
                "Email" => "email",
                "Name" => "name",
                "Surname" => "surname",
                "Address" => "address",
                "Country" => "country",
                "City" => "city",
                "Post Code" => "post-code",
                "Phone Number" => "phone-number",
                "Purchase Description" => "purchase-description"
            );

            foreach ($fields as $label => $fieldName) {
                echo '<div class="input-block" id="' . $fieldName . '-input-block">';
                echo '<div class="label-block">';
                echo '<label for="' . $fieldName . '-input">' . $label . ':</label>';
                echo '</div>';
                echo '<input type="text" id="' . $fieldName . '-input" name="' . $fieldName . '" value="';
                if (isset($_SESSION["user"])) {
                    echo htmlspecialchars($_SESSION["user"][$fieldName]);
                } elseif ($utils->isPostSet($_POST)) {
                    echo htmlspecialchars($$fieldName);
                }
                echo '" required>';
                echo '<div class="validation-error-block">';
                echo '<p class="js-validation-message">Invalid ' . $label . '</p>';
                if ($utils->isPostSet($_POST) && !$validation->isFieldValid($$fieldName, $fieldName)) {
                    echo '<p>*</p>';
                    $isFormValid = false;
                }
                echo '</div>';
                echo '</div>';
            }
            ?>

            <div class="validation-error-block">
                <?php
                if ($utils->isPostSet($_POST) && !$isFormValid) {
                    echo '<p>Invalid inputs. Check the inputs marked by *</p>';
                }
                ?>
            </div>
            <button class="confirm-button" id="confirm-button-purchase" name="confirm" value="confirm" type="button">
                Confirm
            </button>
            <form method="post" action="logout.php">
                <input type="submit" value="Log Out" name="log-out" class="confirm-button" id="log-out-button"/>
            </form>
        </form>
    </div>
</div>
<div class="<?= $isFormValid ? 'content-block' : 'block-hidden'; ?>">
    <h1>User data was changed successfully!</h1><br>
    <div class="form-block">
        <form id="registration-success-form" name="form" action="../index.php" method="post">
            <button class="confirm-button" id="confirm-registration-success-button" name="confirm" value="confirm"
                    type="button">
                Confirm
            </button>
        </form>
    </div>
</div>
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

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
$email = $name = $surname = $address = $country = $city = $postCode = $phoneNumber = $purchaseDescription = null;
$isFormValid = false;

if ($utils->isPostSet($_POST)) {
    // Retrieve form data
    $email = $_POST["email"];
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $address = $_POST["address"];
    $country = $_POST["country"];
    $city = $_POST["city"];
    $postCode = $_POST["post-code"];
    $phoneNumber = $_POST["phone-number"];
    $purchaseDescription = $_POST["purchase-description"];

    // Validate form data
    $isFormValid = $validation->validatePurchaseForm(
        $email, $name, $surname, $address, $country, $city, $postCode, $phoneNumber, $purchaseDescription
    );

    // If the user is logged in, pre-fill some fields
    if (isset($_SESSION["user"])) {
        $user = $_SESSION["user"];
        $email = $user["email"];
        $name = $user["name"];
        $surname = $user["surname"];
        $address = $user["address"];
        $country = $user["country"];
        $city = $user["city"];
        $postCode = $user["post-code"];
        $phoneNumber = $user["phone-number"];
    }
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
<div>
    <a href="../index.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
            <path d="M0 0h48v48h-48z" fill="none"/>
            <path d="M40 22h-24.34l11.17-11.17-2.83-2.83-16 16 16 16 2.83-2.83-11.17-11.17h24.34v-4z"/>
        </svg>
    </a>
</div>

<div class="<?php echo $isFormValid ? "block-hidden" : "content-block"; ?>">
    <h1>Make a purchase</h1>
    <div class="form-block">
        <form id="form-purchase" name="form" action="purchasePage.php" method="post">
            <?php include("input-field.php"); ?>
            <div class="validation-error-block">
                <?php
                if ($utils->isPostSet($_POST) && !$isFormValid) {
                    echo "<p>Invalid inputs. Check the inputs again</p>";
                }
                ?>
            </div>
            <button class="confirm-button" id="confirm-button-purchase" name="confirm" value="confirm" type="button">
                Confirm
            </button>
        </form>
    </div>
</div>

<div class="<?php echo $isFormValid ? "content-block" : "block-hidden"; ?>">
    <h1>Purchase was made successfully!</h1><br>
    <h1>Wait for the response on your email</h1>
    <div class="form-block">
        <form id="registration-success-form" name="form" action="../index.php" method="post">
            <button class="confirm-button" id="confirm-registration-success-button" name="confirm" value="confirm"
                    type="submit">
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

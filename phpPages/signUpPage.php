<?php
session_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE);

if (isset($_SESSION["user"])) {
    header("Location: ../index.php");
    exit;
}

require_once("../phpClassesUtils/Validation.php");
require_once("../phpClassesUtils/Utils.php");
require_once("../database/DatabaseHandler.php");

$validation = new Validation();
$utils = new Utils();
$database = new DatabaseHandler();

$email = $name = $surname = $password = $passwordRepeat = $address = $country = $city = $postCode = $phoneNumber = null;
$isFormValid = false;
$isUserWithSuchEmailAlreadyRegistered = false;

if ($utils->isPostSet($_POST)) {
    $email = $_POST["email"];
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $password = $_POST["password"];
    $passwordRepeat = $_POST["password-repeat"];
    $address = $_POST["address"];
    $country = $_POST["country"];
    $city = $_POST["city"];
    $postCode = $_POST["post-code"];
    $phoneNumber = $_POST["phone-number"];

    $isFormValid = $validation->validateSignUpForm(
        $email, $name, $surname, $password, $passwordRepeat, $address, $country, $city, $postCode, $phoneNumber
    );

    $isUserWithSuchEmailAlreadyRegistered = $database->checkIfUserWithEmailExists($email);
}

$showSignUpForm = (!$isFormValid || $isUserWithSuchEmailAlreadyRegistered);
$showSuccessMessage = (!$showSignUpForm && $utils->isPostSet($_POST));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create an account</title>
    <link rel="stylesheet" href="../styles/formStyles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500;700&family=Roboto:wght@500&display=swap"
          rel="stylesheet">
</head>
<body>
<div>
    <a href="signInPage.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
            <path d="M0 0h48v48h-48z" fill="none"/>
            <path d="M40 22h-24.34l11.17-11.17-2.83-2.83-16 16 16 16 2.83-2.83-11.17-11.17h24.34v-4z"/>
        </svg>
    </a>
</div>
<div class="<?= $showSignUpForm ? 'content-block' : 'block-hidden'; ?>">
    <h1>Sign up</h1>
    <div class="form-block">
        <form id="form-sign-up" name="form" action="signUpPage.php" method="post">
            <!-- Rest of your form HTML remains unchanged -->
        </form>
    </div>
</div>
<div class="<?= $showSuccessMessage ? 'content-block' : 'block-hidden'; ?>">
    <h1>Registration Successful!</h1>
    <div class="form-block">
        <form id="registration-success-form" name="form" action="signInPage.php" method="post">
            <button class="confirm-button" id="confirm-registration-success-button" name="confirm" value="confirm"
                    type="button">
                Confirm
            </button>
        </form>
    </div>
</div>
</body>
</html>

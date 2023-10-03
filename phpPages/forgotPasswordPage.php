<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot password</title>
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
$email = null;
$isFormValid = false;
if ($utils->isPostSet($_POST)) {
    $email = $_POST["email"];
    $isFormValid = $validation->isEmailValid($email) && $database->checkIfUserWithEmailExists($email);
}
?>
<div>
    <a href="signInPage.php">
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
    <h1>Forgot password</h1>
    <div class="form-block">
        <form id="form" action="forgotPasswordPage.php" method="post">
            <div class="input-block" id="email-input-block">
                <div class="label-block">
                    <label for="email-input">Email:</label>
                </div>
                <input type="email" id="email-input" name="email" value="<?php if ($utils->isPostSet($_POST)) {
                    echo htmlspecialchars($email);
                } ?>" required>
                <div class="validation-error-block">
                    <p class="js-validation-message">Invalid Email :(</p>
                    <?php
                    if ($utils->isPostSet($_POST) && !$validation->isEmailValid($email) && $database->checkIfUserWithEmailExists($email)) {
                        echo "<p>*</p>";
                        $isFormValid = false;
                    }
                    ?>
                </div>
            </div>
            <button class="confirm-button" id="confirm-button-forgot-password" type="button" name="confirm"
                    value="confirm">Confirm
            </button>
            <div class="validation-error-block">
                <p class="js-validation-message">Invalid Email :(</p>
                <?php
                if ($utils->isPostSet($_POST) || $isFormValid) {
                    echo "<p>User with the entered email wasn't found :(</p>";
                }
                ?>
            </div>
        </form>
    </div>
</div>
<div class="<?php if ($isFormValid) {
    echo "content-block";
} else {
    echo "block-hidden";
} ?>">
    <h1>Check your email to continue!</h1>
    <div class="form-block">
        <form id="registration-success-form" name="form" action="signInPage.php" method="post">
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
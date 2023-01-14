<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Account</title>
    <link rel="stylesheet" href="../styles/signInStyles.css">
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
$isFormValid = $email = $password = null;
if ($utils->isPostSet($_POST)) {
    $isFormValid = true;
    $email = $_POST["email"];
    $password = $_POST["password"];
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
<div class="log-in-block">
    <h1>Log in</h1>
    <div class="form-block">
        <form action="signInPage.php" method="post">
            <div class="input-block" id="email-input-block">
                <div class="label-block">
                    <label for="email-input">Email:</label>
                    <p class="email-label">Don't have an account yet?
                        <span><a href="signUpPage.php">Create</a></span>
                    </p>
                </div>
                <input type="email" id="email-input" name="email" value="<?php if ($utils->isPostSet($_POST)) {
                    echo $email;
                } ?>" required>
                <div class="validation-error-block">
                    <p class="js-validation-message">Invalid Email</p>
                    <?php
                    if ($utils->isPostSet($_POST) && !$validation->isEmailValid($email)) {
                        echo "<p>*</p>";
                        $isFormValid = false;
                    }
                    ?>
                </div>
            </div>
            <div class="input-block" id="password-input-block">
                <div class="label-block">
                    <label for="password-input">Password:</label>
                </div>
                <input type="password" id="password-input" name="password" minlength="8"
                       value="<?php if ($utils->isPostSet($_POST)) {
                           echo $password;
                       } ?>" required>
                <div class="validation-error-block">
                    <p class="js-validation-message">Invalid Password</p>
                    <?php
                    if ($utils->isPostSet($_POST) && !$validation->isPasswordValid($password)) {
                        echo "<p>*</p>";
                        $isFormValid = false;
                    }
                    ?>
                </div>
            </div>
            <div class="forgot-password-block">
                <a href="forgotPasswordPage.php">
                    Forgot password?</a>
            </div>
            <div class="validation-error-block">
                <?php
                if ($utils->isPostSet($_POST) && !$isFormValid && !$database->checkUserForLogIn($email, $password)) {
                    echo "<p>Invalid Email or Password!</p>";
                }
                ?>
            </div>
            <button class="confirm-button" id="confirm-button-sign-in" name="confirm" value="confirm" type="button">
                Confirm
            </button>
        </form>
    </div>

</div>
<script src="../javaScript/formHandling.js"></script>
</body>
</html>
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
if (isset($_SESSION["user"])) {
    header("Location: ../index.php");
}
require_once("../phpClassesUtils/Validation.php");
require_once("../phpClassesUtils/Utils.php");
require_once("../database/DatabaseHandler.php");
$validation = new Validation();
$utils = new Utils();
$database = new DatabaseHandler();
$email = $password = null;
$isFormValid = false;
if ($utils->isPostSet($_POST)) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $isFormValid = $utils->isSignInSuccessful($_POST);
}
if ($isFormValid) {
    session_start();
    unset($_SESSION['user']);
    $user = $database->getUserByEmail($email);
    $_SESSION['user'] = array('id' => $user->getId(), 'email' => $user->getEmail(), 'name' => $user->getName(), 'surname' => $user->getSurname(),
        'address' => $user->getAddress(), 'country' => $user->getCountry(), 'city' => $user->getCity(),
        'post-code' => $user->getPostCode(), 'phone-number' => $user->getPhoneNumber());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Account</title>
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
<div class="<?php if ($isFormValid) {
    echo "block-hidden";
} else {
    echo "content-block";
} ?>">
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
                    echo htmlspecialchars($email);
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
                           echo htmlspecialchars($password);
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
                if ($utils->isPostSet($_POST)) {
                    if (!$isFormValid || !$database->checkUserForLogIn($email, $password)) {
                        echo "<p>Invalid Email or Password!</p>";
                    }
                }
                ?>
            </div>
            <button class="confirm-button" id="confirm-button-sign-in" name="confirm" value="confirm" type="button">
                Confirm
            </button>
        </form>
    </div>

</div>
<div class="<?php if ($isFormValid) {
    echo "content-block";
} else {
    echo "block-hidden";
}
?>">
    <?php if ($isFormValid) {

    } ?>
    <h1>Registration Successful!</h1>
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
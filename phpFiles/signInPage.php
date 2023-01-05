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
        <form name="form" action="signInPage.php" method="post">
            <div class="input-block" id="email-input-block">
                <div class="label-block">
                    <label for="email-input">Email:</label>
                    <p class="email-label">Don't have an account yet? <span><a
                                    href="signUpPage.php">Create</a></span>
                    </p>
                </div>
                <input type="email" id="email-input" name="email" required>
                <div class="validation-error-block">
                    <p>Invalid Email</p>
                </div>
            </div>
            <div class="input-block" id="password-input-block">
                <div class="label-block">
                    <label for="password-input">Password:</label>
                </div>
                <input type="password" id="password-input" name="password" minlength="8" required>
                <div class="validation-error-block">
                    <p>Invalid Password</p>
                </div>
            </div>
            <div class="forgot-password-block">
                <a href="forgotPasswordPage.php">
                    Forgot password?</a>
            </div>
            <button class="submit-button" type="button" onclick="validateSignInForm()">Submit</button>

        </form>
    </div>
</div>
<script src="../javaScript/formValidation.js"></script>
</body>
</html>
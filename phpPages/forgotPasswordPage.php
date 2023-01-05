<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot password</title>
    <link rel="stylesheet" href="../styles/signInStyles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500;700&family=Roboto:wght@500&display=swap"
          rel="stylesheet">
    <script src="../javaScript/formValidation.js"></script>
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
<div class="log-in-block">
    <h1>Forgot password</h1>
    <div class="form-block">
        <form>
            <div class="input-block" id="email-input-block">
                <div class="label-block">
                    <label for="email-input">Email:</label>
                </div>
                <input type="email" id="email-input" name="email" required>
                <div class="validation-error-block">
                    <p>Invalid Email :(</p>
                </div>
            </div>
            <button class="submit-button" type="button" onclick="validateForgotPasswordForm()">Submit</button>
        </form>
    </div>
</div>
</body>
</html>
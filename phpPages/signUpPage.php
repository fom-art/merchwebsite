<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create an account</title>
    <link rel="stylesheet" href="../styles/signInStyles.css">
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
<div class="log-in-block">
    <h1>Sign up</h1>
    <div class="form-block">
        <form name="form" action="" method="post">
            <div class="input-block" id="email-input-block">
                <div class="label-block">
                    <label for="email-input">Email:</label>
                </div>
                <input type="email" id="email-input" name="email" required>
                <div class="validation-error-block">
                    <p>Invalid Email</p>
                    <?php
                    $email = $_POST["email"];
                    $emailRegex = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";
                    if ()
                    if (@email )
                    if
                    ?>
                </div>
            </div>
            <div class="two-inputs-in-one-row-block">
                <div class="input-block" id="name-input-block">
                    <div class="label-block">
                        <label for="name-input">Name:</label>
                    </div>
                    <input type="text" id="name-input" name="name" required>
                    <div class="validation-error-block">
                        <p>Invalid Name</p>
                    </div>
                </div>
                <div class="input-block" id="surname-input-block">
                    <div class="label-block">
                        <label for="surname-input">Surname:</label>
                    </div>
                    <input type="text" id="surname-input" name="surname" required>
                    <div class="validation-error-block">
                        <p>Invalid Surname</p>
                    </div>
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
            <div class="input-block" id="repeat-password-input-block">
                <div class="label-block">
                    <label for="repeat-password-input">Repeat the password:</label>
                </div>
                <input type="password" id="repeat-password-input" name="password-repeat`" minlength="8" required>
                <div class="validation-error-block">
                    <p>Passwords don't match</p>
                </div>
            </div>
            <div class="input-block" id="address-input-block">
                <div class="label-block">
                    <label for="address-input">Address:</label>
                </div>
                <input type="text" id="address-input" name="address" required>
                <div class="validation-error-block">
                    <p>Invalid Address</p>
                </div>
            </div>
            <div class="input-block" id="country-input-block">
                <div class="label-block">
                    <label for="country-input">Country:</label>
                </div>
                <input type="password" id="country-input" name="country" required>
                <div class="validation-error-block">
                    <p>Invalid Country</p>
                </div>
            </div>
            <div class="input-block" id="city-input-block">
                <div class="label-block">
                    <label for="city-input">City:</label>
                </div>
                <input type="password" id="city-input" name="city" required>
                <div class="validation-error-block">
                    <p>Invalid City</p>
                </div>
            </div>
            <div class="two-inputs-in-one-row-block">
                <div class="input-block" id="post-code-input-block">
                    <div class="label-block">
                        <label for="post-code-input">Post Code:</label>
                    </div>
                    <input type="text" id="post-code-input" name="post-code" required>
                    <div class="validation-error-block">
                        <p>Invalid Post Code</p>
                    </div>
                </div>
                <div class="input-block" id="phone-number-input-block">
                    <div class="label-block">
                        <label for="phone-number-input">Phone Number:</label>
                    </div>
                    <input type="text" id="phone-number-input" name="phone-number" required/>
                    <div class="validation-error-block">
                        <p>Invalid Phone Number</p>
                    </div>
                </div>
            </div>
            <button class="submit-button" type="button" onclick="validateSignUpForm()">Submit</button>
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
<script src="../javaScript/formValidation.js"></script>
</body>
</html>
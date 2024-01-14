<?php

namespace view\utils\sections;

use controller\utlis\Utils;
use controller\utlis\FormValidation;
use HrefsConstants;
use Inputs;
use model;

require_once __DIR__ . '/../Icons.php';
require_once __DIR__ . '/../Inputs.php';
require_once __DIR__ . '/../HrefsConstants.php';


class SignInSections
{
    public static function renderForm($email, $password, $csrfToken, $isLogInSuccess)
    {
        ?>
        <div class="content-block">
            <h1>Log in</h1>
            <div class="form-block">
                <form id="sign-in"  action="<?php echo HrefsConstants::SIGN_IN?>" method="post">
                    <!-- Email Input -->
                    <div class="input-block" id="email-input-block">
                        <div class="label-block">
                            <label for="email">Email:</label>
                            <p class="email-label">Don't have an account yet?
                                <span><a href="<?php echo HrefsConstants::SIGN_UP ?>">Create</a></span>
                            </p>
                        </div>
                        <?php ?>
                        <input type="email" id="email" name="email"
                               value="<?php echo htmlspecialchars($email); ?>" required>
                        <div class="validation-error-block">
                            <p class="js-validation-message">Invalid Email</p>
                            <?php
                            if (isset($_POST['confirm']) && !FormValidation::isEmailValid($email)) {
                                echo "<p>*</p>";
                                $isFormValid = false;
                            }
                            ?>
                        </div>
                    </div>

                    <?php
                    // Password input
                    echo Inputs::printInputBlock("password-input-block", "Password", "password", $password, "Invalid Password", FormValidation::isPasswordValid($password));
                    ?>

                    <?php
                    echo Inputs::printCsrfTokenInput($csrfToken);
                    ?>

                    <!-- Forgot Password Link -->
                    <div class="forgot-password-block">
                        <a href="<?php echo HrefsConstants::FORGOT_PASSWORD ?>">Forgot password?</a>
                    </div>


                    <div class="validation-error-block" id="validation-result-closure">
                        <?php
                        if (isset($_POST['email']) && !$isLogInSuccess) {
                            echo "<p>Invalid Email or Password!</p>";
                        }
                        ?>
                    </div>

                    <!-- Confirm Button -->
                    <button class="confirm-button" id="confirm-button-sign-in" name="confirm" value="confirm"
                            type="button">
                        Confirm
                    </button>
                </form>
            </div>
        </div>
        <?php
    }

    static function renderSuccessMessage(): void
    {
        ?>
        <!-- Success Message Block -->
        <div class="content-block">
            <h1>Registration Successful!</h1>
            <div class="form-block">
                <form id="registration-success-form" action="<?php echo HrefsConstants::INDEX?>" method="post">
                    <button class="confirm-button" id="confirm-registration-success-button" type="button">Confirm
                    </button>
                </form>
            </div>
        </div>
        <?php
    }

    static function renderScripts(): void
    {
        ?>
        <script src="<?php echo HrefsConstants::FORM_VALIDATION_SCRIPT ?>"></script>
        <script src="<?php echo HrefsConstants::FORM_HANDLING_SCRIPT ?>"></script>
        <script src="<?php echo HrefsConstants::FORM_DATA_HANDLER_SCRIPT ?>"></script>
        <?php
    }
}
<?php

namespace view\utils\sections;

use controller\utlis\FormValidation;
use HrefsConstants;
use Inputs;

require_once __DIR__ . '/../Icons.php';
require_once __DIR__ . '/../Inputs.php';
require_once __DIR__ . '/../HrefsConstants.php';

/**
 * Class ForgotPasswordSections
 *
 * This class provides methods for rendering different sections of the "Forgot Password" page.
 *
 * @package view\utils\sections
 */
class ForgotPasswordSections
{
    /**
     * Render the "Forgot Password" form.
     *
     * @param bool $isUserWithEmailFound Indicates if a user with the provided email was found.
     * @param string $email The email address entered by the user.
     * @param string $csrfToken The CSRF token.
     * @param bool $isCsrfSuccess Indicates if CSRF validation was successful.
     */
    public static function renderForm($isUserWithEmailFound, $email, $csrfToken, $isCsrfSuccess)
    {
        ?>
        <!-- HTML code for rendering the "Forgot Password" form -->
        <div class="content-block">
            <h1>Forgot password</h1>
            <div class="form-block">
                <form id="forgot-password" action="<?php echo HrefsConstants::FORGOT_PASSWORD ?>" method="post">
                    <?php
                    // Email input
                    echo Inputs::printInputBlock("email-input-block", "Email", "email", $email, "Invalid email!", FormValidation::isEmailValid($email));
                    // CSRF token input
                    echo Inputs::printCsrfTokenInput($csrfToken)
                    ?>

                    <!-- Validation Error Message -->
                    <div class="validation-error-block">
                        <?php
                        if ($isCsrfSuccess && !$isUserWithEmailFound) {
                            echo $_POST['email'];
                            echo "<p>User with entered email doesn't exist :(</p>";
                        }
                        ?>
                    </div>

                    <button class="confirm-button" id="confirm-button-forgot-password" type="button" name="confirm"
                            value="confirm">Confirm
                    </button>
                </form>
            </div>
        </div>
        <?php
    }

    /**
     * Render a confirmation message after requesting password reset.
     */
    static function renderConfirmationMessage()
    {
        ?>
        <!-- HTML code for rendering a confirmation message after requesting password reset -->
        <div class="content-block">
            <h1>Check your email to continue!</h1>
            <div class="form-block">
                <form id="registration-success-form" name="form" action="<?php echo HrefsConstants::SIGN_IN ?>"
                      method="post">
                    <button class="confirm-button" id="confirm-registration-success-button" name="confirm"
                            value="confirm"
                            type="button">Confirm
                    </button>
                </form>
            </div>
        </div>
        <?php
    }

    /**
     * Render scripts required for form validation and handling.
     */
    static function renderScripts(): void
    {
        ?>
        <!-- Include JavaScript scripts for form validation and handling -->
        <script src="<?php echo HrefsConstants::FORM_VALIDATION_SCRIPT ?>"></script>
        <script src="<?php echo HrefsConstants::FORM_HANDLING_SCRIPT ?>"></script>
        <script src="<?php echo HrefsConstants::FORM_DATA_HANDLER_SCRIPT ?>"></script>
        <?php
    }
}

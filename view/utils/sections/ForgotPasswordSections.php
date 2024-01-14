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


class ForgotPasswordSections
{
    public static function renderForm($isUserWithEmailFound, $email, $csrfToken, $isCsrfSuccess)
    {
        ?>
        <div class="content-block">
            <h1>Forgot password</h1>
            <div class="form-block">
                <form id="forgot-password" action="<?php echo HrefsConstants::FORGOT_PASSWORD ?>" method="post">
                    <?php
                    //Email input
                    echo Inputs::printInputBlock("email-input-block", "Email", "email", $email, "Invalid email!", FormValidation::isEmailValid($email));
                    //Csrf token input
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

    static function renderConfirmationMessage()
    {
        ?>
        <!-- Confirmation Message -->
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

    static function renderScripts(): void
    {
        ?>
        <script src="<?php echo HrefsConstants::FORM_VALIDATION_SCRIPT ?>"></script>
        <script src="<?php echo HrefsConstants::FORM_HANDLING_SCRIPT ?>"></script>
        <script src="<?php echo HrefsConstants::FORM_DATA_HANDLER_SCRIPT ?>"></script>
        <?php
    }
}
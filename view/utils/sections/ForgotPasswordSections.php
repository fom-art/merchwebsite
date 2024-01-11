<?php

namespace view\utils\sections;

use controller\utlis\Utils;
use controller\utlis\Validation;
use HrefsConstants;
use Inputs;
use model;

require_once __DIR__ . '/../Icons.php';
require_once __DIR__ . '/../Inputs.php';
require_once __DIR__ . '/../HrefsConstants.php';


class ForgotPasswordSections
{
    public static function renderForm($isFormValid, $email)
    {
        ?>
        <div class="content-block">
            <h1>Forgot password</h1>
            <div class="form-block">
                <form id="form" action="<?php echo HrefsConstants::FORGOT_PASSWORD?>" method="post">
                    <!-- Email Input -->
                    <div class="input-block" id="email-input-block">
                        <div class="label-block">
                            <label for="email-input">Email:</label>
                        </div>
                        <input type="email" id="email-input" name="email"
                               value="<?php echo Utils::isPostSet($_POST) ? htmlspecialchars($email) : ''; ?>" required>
                        <div class="validation-error-block">
                            <!-- Validation Messages -->
                            <p class="js-validation-message">Invalid Email :(</p>
                            <?php
                            if (Utils::isPostSet($_POST) && !$isFormValid) {
                                echo "<p>User with the entered email wasn't found :(</p>";
                            }
                            ?>
                        </div>
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
        <<!-- Confirmation Message -->
        <div class="content-block">
            <h1>Check your email to continue!</h1>
            <div class="form-block">
                <form id="registration-success-form" name="form" action="<?php echo HrefsConstants::SIGN_IN?>" method="post">
                    <button class="confirm-button" id="confirm-registration-success-button" name="confirm" value="confirm"
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
        <script src="<?php echo HrefsConstants::FORM_HANDLING_SCRIPT?>"></script>
        <?php
    }
}
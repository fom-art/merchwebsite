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

/**
 * Class SignUpSections
 *
 * This class provides methods for rendering different sections of the sign-up page.
 *
 * @package view\utils\sections
 */
class SignUpSections
{
    /**
     * Render the sign-up form section.
     *
     * @param bool $isAlreadyRegistered Indicates if the user is already registered.
     * @param string $email The email input value.
     * @param string $password The password input value.
     * @param string $passwordRepeat The repeated password input value.
     * @param string $name The name input value.
     * @param string $surname The surname input value.
     * @param string $address The address input value.
     * @param string $country The country input value.
     * @param string $city The city input value.
     * @param string $postCode The post code input value.
     * @param string $phoneNumber The phone number input value.
     * @param string $csrfToken The CSRF token value.
     */
    public static function renderForm($isAlreadyRegistered, $email, $password, $passwordRepeat, $name, $surname, $address, $country, $city, $postCode, $phoneNumber, $csrfToken): void
    {
        ?>
        <div class="content-block">
            <h1>Sign up</h1>
            <div class="form-block">
                <form id="sign-up" name="form" action="<?php echo HrefsConstants::SIGN_UP ?>" method="post">
                    <?php
                    //Email input
                    echo Inputs::printInputBlock("email-input-block", "Email", "email", $email, "Invalid Email Address! Please enter a valid email address. It should follow the standard format (e.g., user@example.com) and not contain special characters like <, >, (), [], \, ',', or spaces.", FormValidation::isEmailValid($email));
                    ?>

                    <div class="two-inputs-in-one-row-block">
                        <?php
                        //Name input
                        echo Inputs::printInputBlock("name-input-block", "Name", "name", $name, "Invalid Name", FormValidation::isNameValid($name));
                        //Surname input
                        echo Inputs::printInputBlock("surname-input-block", "Surname", "surname", $surname, "Invalid Surname", FormValidation::isNameValid($surname));
                        ?>
                    </div>

                    <?php
                    //Password input
                    echo Inputs::printInputBlock("password-input-block", "Password", "password", $password, "Invalid Password! Password must contain at least 8 characters, including at least one uppercase letter (A-Z), at least one number (0-9), and can only contain letters (a-z, A-Z) and numbers.", FormValidation::isPasswordValid($password));
                    //Repeat password input
                    echo Inputs::printInputBlock("repeat-password-input-block", "Repeat the password", "repeat-password", $passwordRepeat, "Invalid Password! Please ensure your password is at least 8 characters long, includes at least one uppercase letter (A-Z), at least one number (0-9), and matches the original password.", FormValidation::isPasswordRepeatValid($password, $passwordRepeat));
                    //Address input
                    echo Inputs::printInputBlock("address-input-block", "Address", "address", $address, "Invalid Address", FormValidation::isAddressValid($address));
                    //Country input
                    echo Inputs::printInputBlock("country-input-block", "Country", "country", $country, "Invalid Country", FormValidation::isCountryOrCityValid($country));
                    //City input
                    echo Inputs::printInputBlock("city-input-block", "City", "city", $city, "Invalid City", FormValidation::isCountryOrCityValid($city));
                    ?>

                    <div class="two-inputs-in-one-row-block">
                        <?php
                        //Post code input
                        echo Inputs::printInputBlock("post-code-input-block", "Post Code", "post-code", $postCode, "Invalid Post Code", FormValidation::isPostCodeValid($postCode));
                        //Phone number input
                        echo Inputs::printInputBlock("phone-number-input-block", "Phone Number", "phone-number", $phoneNumber, "Invalid Phone Number", FormValidation::isPhoneNumberValid($phoneNumber));
                        ?>
                    </div>

                    <?php
                    echo Inputs::printCsrfTokenInput($csrfToken);
                    ?>

                    <div class="validation-error-block" id="validation-result-closure">
                        <p class="js-validation-message">Invalid inputs. Check the inputs marked by *</p>
                        <?php
                        if ($isAlreadyRegistered) {
                            echo "<p>User with such email address is already registered!</p>";
                        }
                        ?>
                    </div>

                    <button class="confirm-button" id="confirm-button-sign-up" name="confirm" value="confirm"
                            type="button">
                        Confirm
                    </button>
                </form>
            </div>
        </div>        <?php
    }

    /**
     * Render the success message section after a successful sign-up.
     */
    static function renderSuccessMessage()
    {
        ?>
        <!-- Success Message Block -->
        <div class="content-block">
            <h1>Registered Successfully!</h1>
            <div class="form-block">
                <form id="registration-success-form" action="<?php echo HrefsConstants::SIGN_IN ?>" method="post">
                    <button class="confirm-button" id="confirm-registration-success-button" type="button">Confirm
                    </button>
                </form>
            </div>
        </div>
        <?php
    }

    /**
     * Render JavaScript scripts required for form validation and handling.
     */
    static function renderScripts(): void
    {
        ?>
        <script src="<?php echo HrefsConstants::FORM_VALIDATION_SCRIPT ?>"></script>
        <script src="<?php echo HrefsConstants::FORM_HANDLING_SCRIPT ?>"></script>
        <script src="<?php echo HrefsConstants::FORM_DATA_HANDLER_SCRIPT ?>"></script>
        <?php
    }
}
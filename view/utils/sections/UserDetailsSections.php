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
 * Class UserDetailsSections
 *
 * This class provides methods for rendering different sections of the user details page.
 *
 * @package view\utils\sections
 */
class UserDetailsSections
{
    /**
     * Render the user details edit form section.
     *
     * @param string $email The email input value.
     * @param string $password The password input value.
     * @param string $name The name input value.
     * @param string $surname The surname input value.
     * @param string $address The address input value.
     * @param string $country The country input value.
     * @param string $city The city input value.
     * @param string $postCode The post code input value.
     * @param string $phoneNumber The phone number input value.
     * @param string $userDetailsEditResult The result message of user details edit.
     * @param string $csrfToken The CSRF token value.
     * @param bool $isCsrfSuccess Indicates if CSRF validation is successful.
     */
    public static function renderForm($email, $password, $name, $surname, $address, $country, $city, $postCode, $phoneNumber, $userDetailsEditResult, $csrfToken, $isCsrfSuccess)
    {
        ?>
        <div class="content-block">
            <h1>Change User Data</h1>
            <div class="form-block">
                <form id="user-details" name="form" action="<?php echo HrefsConstants::USER ?>" method="post">
                    <?php
                    //Email input
                    echo Inputs::printInputBlock("email-input-block", "Email", "email", $email, "Invalid Email", FormValidation::isEmailValid($email));
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
                    echo Inputs::printInputBlock("password-input-block", "Password", "password", $password, "Invalid Password", FormValidation::isPasswordValid($password));
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

                    <?php echo Inputs::printCsrfTokenInput($csrfToken)?>

                    <!-- Validation Error Display -->
                    <div class="validation-error-block" id="validation-result-closure">
                        <?php if (isset($_POST['email']) && $isCsrfSuccess) {
                            echo "<p>Invalid inputs. Check the inputs marked by *</p>";
                        } ?>
                    </div>

                    <div class="two-inputs-in-one-row-block">

                        <!-- Confirm Button -->
                        <button class="confirm-button" id="confirm-button-user-details" name="confirm" value="confirm"
                                type="button">
                            Confirm
                        </button>

                        <!-- Log Out Button -->
                        <button class="confirm-button" id="confirm-button-log-out" name="confirm"
                                type="button">
                            Log out
                        </button>
                    </div>
                </form>
            </div>
        </div>  <?php }

    /**
     * Render the success message section after successfully changing user data.
     */
    static function renderSuccessMessage()
    {
        ?>
        <!-- Success Message Block -->
        <div class="content-block">
            <h1>User data was changed successfully!</h1>
            <div class="form-block">
                <form id="registration-success-form" action="<?php echo HrefsConstants::INDEX ?>" method="post">
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
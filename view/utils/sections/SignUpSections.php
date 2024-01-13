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


class SignUpSections
{
    public static function renderForm($isFormValid, $isAlreadyRegistered, $email, $password, $passwordRepeat, $name, $surname, $address, $country, $city, $postCode, $phoneNumber)
    {
        ?>
        <div class="content-block">
            <h1>Sign up</h1>
            <div class="form-block">
                <form id="sign-up" name="form" action="<?php echo HrefsConstants::SIGN_UP?>" method="post">
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
                    //Repeat password input
                    echo Inputs::printInputBlock("repeat-password-input-block", "Repeat the password", "repeat-password", $passwordRepeat, "Passwords don't match", FormValidation::isPasswordRepeatValid($password, $passwordRepeat));
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

                    <div class="validation-error-block">
                        <?php
                        if (isset($_POST['confirm'])) {
                            if (!$isFormValid) {
                                echo "<p>Invalid inputs. Check the inputs marked by *</p>";
                            }
                            if ($isAlreadyRegistered) {
                                echo "<p>User with such email address is already registered!</p>";
                            }
                        }
                        ?>
                    </div>

                    <button class="confirm-button" id="confirm-button-sign-up" name="confirm" value="confirm" type="button">
                        Confirm
                    </button>
                </form>
            </div>
        </div>        <?php
    }

    static function renderSuccessMessage()
    {
        ?>
        <!-- Success Message Block -->
        <div class="content-block">
            <h1>User data was changed successfully!</h1>
            <div class="form-block">
                <form id="registration-success-form" action="homePage.php" method="post">
                    <button class="confirm-button" id="confirm-registration-success-button" type="button">Confirm</button>
                </form>
            </div>
        </div>
        <?php
    }

    static function renderScripts(): void
    {
        ?>
        <script src="<?php echo HrefsConstants::FORM_VALIDATION_SCRIPT?>"></script>
        <script src="<?php echo HrefsConstants::FORM_HANDLING_SCRIPT?>"></script>
        <script src="<?php echo HrefsConstants::FORM_DATA_HANDLER_SCRIPT?>"></script>
        <?php
    }
}
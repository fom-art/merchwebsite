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


class SignUpSections
{
    public static function renderForm($isPostSet, $isFormValid, $isAlreadyRegistered, $email, $password, $passwordRepeat, $name, $surname, $address, $country, $city, $postCode, $phoneNumber)
    {
        ?>
        <div class="content-block">
            <h1>Sign up</h1>
            <div class="form-block">
                <form name="form" action="<?php echo HrefsConstants::SIGN_UP?>" method="post">
                    <?php
                    //Email input
                    echo Inputs::printInputBlock("email-input-block", "Email", "email", $email, "Invalid Email", Validation::isEmailValid($email), $isPostSet);
                    ?>

                    <div class="two-inputs-in-one-row-block">
                        <?php
                        //Name input
                        echo Inputs::printInputBlock("name-input-block", "Name", "name", $name, "Invalid Name", Validation::isNameValid($name), $isPostSet);
                        //Surname input
                        echo Inputs::printInputBlock("surname-input-block", "Surname", "surname", $surname, "Invalid Surname", Validation::isNameValid($surname), $isPostSet);
                        ?>
                    </div>

                    <?php
                    //Password input
                    echo Inputs::printInputBlock("password-input-block", "Password", "password", $password, "Invalid Password", Validation::isPasswordValid($password), $isPostSet);
                    //Repeat password input
                    echo Inputs::printInputBlock("repeat-password-input-block", "Repeat the password", "password-repeat", $passwordRepeat, "Passwords don't match", Validation::isPasswordRepeatValid($password, $passwordRepeat), $isPostSet);
                    //Address input
                    echo Inputs::printInputBlock("address-input-block", "Address", "address", $address, "Invalid Address", Validation::isAddressValid($address), $isPostSet);
                    //Country input
                    echo Inputs::printInputBlock("country-input-block", "Country", "country", $country, "Invalid Country", Validation::isCountryOrCityValid($country), $isPostSet);
                    //City input
                    echo Inputs::printInputBlock("city-input-block", "City", "city", $city, "Invalid City", Validation::isCountryOrCityValid($city), $isPostSet);
                    ?>

                    <div class="two-inputs-in-one-row-block">
                        <?php
                        //Post code input
                        echo Inputs::printInputBlock("post-code-input-block", "Post Code", "post-code", $postCode, "Invalid Post Code", Validation::isPostCodeValid($postCode), $isPostSet);
                        //Phone number input
                        echo Inputs::printInputBlock("phone-number-input-block", "Phone Number", "phone-number", $phoneNumber, "Invalid Phone Number", Validation::isPhoneNumberValid($phoneNumber), $isPostSet);
                        ?>
                    </div>

                    <div class="validation-error-block">
                        <?php
                        if (Utils::isPostSet($_POST)) {

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
        <script src="http://zwa.toad.cz/~fomenart/controller/javaScript/formHandling.js"></script>
        <?php
    }
}
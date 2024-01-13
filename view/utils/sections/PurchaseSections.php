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


class PurchaseSections
{
    public static function renderForm($isFormValid, $email, $name, $surname, $address, $country, $city, $postCode, $phoneNumber, $purchaseDescription)
    {
        ?>
        <div class="content-block">
            <h1>Change User Data</h1>
            <div class="form-block">
                <form id="purchase" name="form" action="<?php echo HrefsConstants::SIGN_UP ?>" method="post">
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
                    // Purchase Description
                    echo Inputs::printInputBlock("purchase-description-input-block", "Describe your purchase", "purchase-description", $purchaseDescription, "Invalid Purchase Description", FormValidation::isPurchaseDescriptionValid($city));
                    ?>

                    <div class="validation-error-block">
                        <?php
                        if (isset($_POST['confirm'])) {
                            if (!$isFormValid) {
                                echo "<p>Invalid inputs. Check the inputs marked by *</p>";
                            }
                        }
                        ?>
                    </div>

                    <button class="confirm-button" id="confirm-button-sign-up" name="confirm" value="confirm"
                            type="button">
                        Confirm
                    </button>
                </form>
            </div>
        </div>
        <?php
    }

    static function renderSuccessMessage()
    {
        ?>
        <!-- Success Message Block -->
        <div class="content-block">
            <h1>Purchase was made successfully!</h1>
            <h2>Wait for the response on your email</h2>
            <!-- Confirmation Form -->
            <div class="form-block">
                <form id="registration-success-form" name="form" action="<?php echo HrefsConstants::INDEX?>" method="post">
                    <button class="confirm-button" id="confirm-registration-success-button" name="confirm" value="confirm"
                            type="button">
                        Confirm
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
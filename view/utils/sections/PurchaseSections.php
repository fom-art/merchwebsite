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
 * Class PurchaseSections
 *
 * This class provides methods for rendering different sections of the purchase page.
 *
 * @package view\utils\sections
 */
class PurchaseSections
{
    /**
     * Render the purchase form section.
     *
     * @param bool $isFormValid Indicates if the form data is valid.
     * @param string $email The email input value.
     * @param string $name The name input value.
     * @param string $surname The surname input value.
     * @param string $address The address input value.
     * @param string $country The country input value.
     * @param string $city The city input value.
     * @param string $postCode The post code input value.
     * @param string $phoneNumber The phone number input value.
     * @param string $purchaseDescription The purchase description input value.
     * @param string $csrfToken The CSRF token value.
     */
    public static function renderForm($isFormValid, $email, $name, $surname, $address, $country, $city, $postCode, $phoneNumber, $purchaseDescription, $csrfToken)
    {
        ?>
        <div class="content-block">
            <h1>Make a purchase</h1>
            <div class="form-block">
                <form id="purchase" name="form" action="<?php echo HrefsConstants::PURCHASE?>" method="post">
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
                    //Csrf Input
                    echo Inputs::printCsrfTokenInput($csrfToken)
                    ?>

                    <div class="validation-error-block" id="validation-result-closure">
                        <?php
                        if (isset($_POST['email']) && $isFormValid) {
                            echo "<p>Invalid inputs. Check the inputs marked by *</p>";
                        }
                        ?>
                    </div>


                    <button class="confirm-button" id="confirm-button-purchase" name="confirm" value="confirm"
                            type="button">
                        Confirm
                    </button>
                </form>
            </div>
        </div>
        <?php
    }

    /**
     * Render the success message section after a successful purchase.
     */
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
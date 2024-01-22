<?php

namespace view\utils\sections;

use controller\utlis\Utils;
use controller\utlis\FormValidation;
use HrefsConstants;
use Inputs;

require_once __DIR__ . '/../Inputs.php';
require_once __DIR__ . '/../HrefsConstants.php';

/**
 * Class AdminSections
 *
 * This class provides methods for rendering different sections of the admin page.
 *
 * @package view\utils\sections
 */
class AdminSections
{
    /**
     * Render the product addition form.
     *
     * @param string $productName The name of the product.
     * @param string $productPrice The price of the product.
     * @param string $productType The type of the product.
     * @param string $productDescription The description of the product.
     * @param array $productPhoto The photo of the product.
     * @param bool $addProductResult The result of adding a product.
     * @param string $csrfToken The CSRF token.
     * @param bool $isCsrfSuccess Indicates if CSRF validation was successful.
     */
    static function renderForm(string $productName,
                               string $productPrice,
                               string $productType,
                               string $productDescription,
                               array $productPhoto,
                               bool   $addProductResult,
                               string $csrfToken,
                               bool   $isCsrfSuccess): void
    { ?>
        <!-- HTML code for rendering the product addition form -->
        <div class="content-block">
            <div class="header-block">
                <div class="title-block">
                    <h1 class="title">Add a product</h1>
                </div>
            </div>
            <div class="form-block">
                <form id="add-product" action="<?php echo HrefsConstants::ADMIN ?>" method="post" enctype="multipart/form-data">
                    <div class="two-inputs-in-one-row-block">
                        <?php
                        // Product Name input
                        echo Inputs::printInputBlock("product-name-input-block", "Product Name", "product-name", $productName, "Invalid Name!", FormValidation::isProductNameValid($productName));

                        // Price input
                        echo Inputs::printInputBlock("product-price-input-block", "Price", "product-price", $productPrice, "Invalid Price", FormValidation::isProductPriceValid($productPrice));
                        ?>
                    </div>

                    <div class="two-inputs-in-one-row-block">
                        <?php
                        // Product Type input
                        echo Inputs::printInputBlock("product-type-input-block", "Product Type", "product-type", $productType, "Invalid Product Type!", FormValidation::isProductTypeValid($productType));

                        // Product Description input
                        echo Inputs::printInputBlock("product-description-input-block", "Product Description", "product-description", $productDescription, "Invalid Description!", FormValidation::isProductDescriptionValid($productDescription));
                        ?>
                    </div>

                    <?php
                    // Photo input
                    echo Inputs::printFileInputBlock("photo-input-block", "Photo", "photo", "The only valid photo types are PNG and JPEG, also, the photo has to be valid!", FormValidation::isProductPhotoValid($productPhoto));
                    // Csrf input
                    echo Inputs::printCsrfTokenInput($csrfToken)
                    ?>

                    <button class="confirm-button" id="confirm-button-admin" type="submit" name="confirm"
                            value="confirm">
                        Confirm
                    </button>

                    <?php
                    if (isset($_POST['product-name']) && $isCsrfSuccess && $addProductResult) {
                        echo "<div class='validation-error-block'><p>Invalid inputs.</p></div>";
                    }
                    ?>
                </form>
            </div>
        </div>
        <?php
    }

    /**
     * Render a success message for product addition.
     */
    static function renderSuccessMessage(): void
    {
        ?>
        <!-- HTML code for rendering a success message after adding a product -->
        <div class="content-block">
            <h1>The product was added! :)</h1>
            <div class="form-block">
                <form id="registration-success-form" name="form" action="<?php echo HrefsConstants::INDEX?>" method="post">
                    <button class="confirm-button" id="confirm-registration-success-button" name="confirm"
                            value="confirm"
                            type="button">
                        Confirm
                    </button>
                </form>
            </div>
        </div>
        <?php
    }

    /**
     * Render scripts required for form validation and handling.
     */
    static function renderScripts()
    {
        ?>
        <!-- Include JavaScript scripts for form validation and handling -->
        <script src="<?php echo HrefsConstants::FORM_VALIDATION_SCRIPT ?>"></script>
        <script src="<?php echo HrefsConstants::FORM_HANDLING_SCRIPT ?>"></script>
        <script src="<?php echo HrefsConstants::FORM_DATA_HANDLER_SCRIPT ?>"></script>
        <?php
    }
}

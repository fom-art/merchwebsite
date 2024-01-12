<?php

namespace view\utils\sections;

use controller\utlis\Utils;
use controller\utlis\FormValidation;
use HrefsConstants;
use Inputs;

require_once __DIR__ . '/../Inputs.php';
require_once __DIR__ . '/../HrefsConstants.php';

class AdminSections
{
    static function renderForm($isFormValid, $productName, $productPrice, $productType, $productDescription, $photo): void
    { ?>
        <div class="content-block">
            <div class="header-block">
                <div class="title-block">
                    <h1 class="title">Add a product</h1>
                </div>
            </div>
            <div class="form-block">
                <form action="<?php echo HrefsConstants::ADMIN ?>" method="post" enctype="multipart/form-data">
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
                    echo Inputs::printInputBlock("photo-input-block", "Photo", "photo-file", $photo, "Invalid Photo!", FormValidation::isProductPhotoExtensionValid($photo));
                    ?>

                    <button class="confirm-button" id="confirm-button-admin" type="submit" name="confirm"
                            value="confirm">
                        Confirm
                    </button>

                    <?php
                    if (isset($_POST['confirm']) && $isFormValid) {
                        echo "<div class='validation-error-block'><p>Invalid inputs. Check the inputs marked by *</p></div>";
                    }
                    ?>
                </form>
            </div>
        </div>
        <?php
    }

    static function renderSuccessMessage(): void
    {
        ?>
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

    static function renderScripts()
    {
        ?>
        <script src="<?php echo HrefsConstants::FORM_VALIDATION_SCRIPT ?>"></script>
        <script src="<?php echo HrefsConstants::FORM_HANDLING_SCRIPT ?>"></script>
        <?php
    }
}
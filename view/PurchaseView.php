<?php

namespace view;

use controller\utlis\FormValidation;

require_once "utils/sections/PurchaseSections.php";
require_once 'utils/HrefsConstants.php';

/**
 * Class PurchaseView
 *
 * This class represents the view for the purchase page of the web application.
 * It is used to render the user interface for making a purchase and handles form validation.
 */
class PurchaseView
{
    /**
     * @var string Indicates whether the form has been submitted (e.g., "yes" or "no").
     */
    public string $isPostSet;

    /**
     * @var string Indicates whether the form data is valid (e.g., "valid" or "invalid").
     */
    public string $isFormValid;

    /**
     * @var string The user's email address for the purchase.
     */
    public string $email;

    /**
     * @var string The user's first name for the purchase.
     */
    public string $name;

    /**
     * @var string The user's last name for the purchase.
     */
    public string $surname;

    /**
     * @var string The user's address for the purchase.
     */
    public string $address;

    /**
     * @var string The user's country for the purchase.
     */
    public string $country;

    /**
     * @var string The user's city for the purchase.
     */
    public string $city;

    /**
     * @var string The user's postal code for the purchase.
     */
    public string $postCode;

    /**
     * @var string The user's phone number for the purchase.
     */
    public string $phoneNumber;

    /**
     * @var string The description of the purchase.
     */
    public string $purchaseDescription;

    /**
     * @var string The CSRF token for form submission security.
     */
    public string $csrfToken;

    /**
     * @var bool Indicates whether the purchase operation was successful (true/false).
     */
    public bool $purchaseResult;

    /**
     * @var bool Indicates whether CSRF token validation was successful (true/false).
     */
    public bool $isCsrfSuccess;

    /**
     * PurchaseView constructor.
     *
     * @param bool $purchaseResult Indicates whether the purchase operation was successful (true/false).
     * @param string $isPostSet Indicates whether the form has been submitted (e.g., "yes" or "no").
     * @param string $email The user's email address for the purchase.
     * @param string $name The user's first name for the purchase.
     * @param string $surname The user's last name for the purchase.
     * @param string $address The user's address for the purchase.
     * @param string $country The user's country for the purchase.
     * @param string $city The user's city for the purchase.
     * @param string $postCode The user's postal code for the purchase.
     * @param string $phoneNumber The user's phone number for the purchase.
     * @param string $purchaseDescription The description of the purchase.
     * @param string $csrfToken The CSRF token for form submission security.
     * @param bool $isCsrfSuccess Indicates whether CSRF token validation was successful (true/false).
     */
    public function __construct($purchaseResult, $isPostSet, $email, $name, $surname, $address, $country, $city, $postCode, $phoneNumber, $purchaseDescription, $csrfToken, $isCsrfSuccess)
    {
        $this->isFormValid = FormValidation::validatePurchaseForm($email, $name, $surname, $address, $country, $city, $postCode, $phoneNumber, $purchaseDescription);
        $this->purchaseResult = $purchaseResult;
        $this->isPostSet = $isPostSet;
        $this->email = $email;
        $this->name = $name;
        $this->surname = $surname;
        $this->address = $address;
        $this->country = $country;
        $this->city = $city;
        $this->postCode = $postCode;
        $this->phoneNumber = $phoneNumber;
        $this->purchaseDescription = $purchaseDescription;
        $this->csrfToken = $csrfToken;
        $this->isCsrfSuccess = $isCsrfSuccess;
    }

    /**
     * Render the purchase page template.
     */
    public function render()
    {
        // Include the template for rendering the purchase page (e.g., purchase.php).
        include __DIR__ . '/templates/purchase.php';
    }
}

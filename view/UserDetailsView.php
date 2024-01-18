<?php

namespace view;
use controller\utlis\FormValidation;

require_once "utils/sections/UserDetailsSections.php";
require_once 'utils/Icons.php';
require_once 'utils/HrefsConstants.php';

/**
 * Class UserDetailsView
 *
 * This class represents the view for the user details page of the web application.
 * It is used to render the user interface for editing user details.
 */
class UserDetailsView
{
    /**
     * @var string Indicates whether the form data is valid ("valid" or "invalid").
     */
    public string $isFormValid;

    /**
     * @var string The user's email address.
     */
    public string $email;

    /**
     * @var string The user's chosen password.
     */
    public string $password;

    /**
     * @var string The user's first name.
     */
    public string $name;

    /**
     * @var string The user's surname.
     */
    public string $surname;

    /**
     * @var string The user's address.
     */
    public string $address;

    /**
     * @var string The user's country.
     */
    public string $country;

    /**
     * @var string The user's city.
     */
    public string $city;

    /**
     * @var string The user's postal code.
     */
    public string $postCode;

    /**
     * @var string The user's phone number.
     */
    public string $phoneNumber;

    /**
     * @var string The CSRF token for form submission security.
     */
    public string $csrfToken;

    /**
     * @var bool Indicates whether the user details edit was successful (true/false).
     */
    public bool $userDetailsEditResult;

    /**
     * @var bool Indicates whether the CSRF token validation was successful (true/false).
     */
    public bool $isCsrfSuccess;

    /**
     * UserDetailsView constructor.
     *
     * @param string $email The user's email address.
     * @param string $name The user's first name.
     * @param string $surname The user's surname.
     * @param string $password The user's chosen password.
     * @param string $address The user's address.
     * @param string $country The user's country.
     * @param string $city The user's city.
     * @param string $postCode The user's postal code.
     * @param string $phoneNumber The user's phone number.
     * @param bool $userDetailsEditResult Indicates whether the user details edit was successful (true/false).
     * @param string $csrfToken The CSRF token for form submission security.
     * @param bool $isCsrfSuccess Indicates whether the CSRF token validation was successful (true/false).
     */
    public function __construct($email, $name, $surname, $password, $address, $country, $city, $postCode, $phoneNumber, $userDetailsEditResult, $csrfToken, $isCsrfSuccess)
    {
        $this->isFormValid = FormValidation::validateUserDetailsForm($email, $name, $surname, $password, $address, $country, $city, $postCode, $phoneNumber);
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->surname = $surname;
        $this->address = $address;
        $this->country = $country;
        $this->city = $city;
        $this->postCode = $postCode;
        $this->phoneNumber = $phoneNumber;
        $this->userDetailsEditResult = $userDetailsEditResult;
        $this->csrfToken = $csrfToken;
        $this->isCsrfSuccess = $isCsrfSuccess;
    }

    /**
     * Render the user details page template.
     */
    public function render()
    {
        // Include the template for rendering the user details page (e.g., userDetails.php).
        include __DIR__ . '/templates/userDetails.php';
    }
}

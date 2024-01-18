<?php

namespace view;

use controller\utlis\FormValidation;

require_once "utils/sections/SignUpSections.php";
require_once 'utils/Icons.php';
require_once 'utils/HrefsConstants.php';

/**
 * Class SignUpView
 *
 * This class represents the view for the sign-up page of the web application.
 * It is used to render the user interface for user registration and sign-up.
 */
class SignUpView
{
    /**
     * @var string Indicates whether the form data is valid ("valid" or "invalid").
     */
    public string $isFormValid;

    /**
     * @var string Indicates whether the user registration was successful ("success" or "failure").
     */
    public string $isRegistrationSuccess;

    /**
     * @var string Indicates whether the user is already registered ("true" or "false").
     */
    public string $isRegistered;

    /**
     * @var string The user's email address entered during registration.
     */
    public string $email;

    /**
     * @var string The user's chosen password during registration.
     */
    public string $password;

    /**
     * @var string The repeated password entered during registration.
     */
    public string $passwordRepeat;

    /**
     * @var string The user's first name entered during registration.
     */
    public string $name;

    /**
     * @var string The user's surname entered during registration.
     */
    public string $surname;

    /**
     * @var string The user's address entered during registration.
     */
    public string $address;

    /**
     * @var string The user's country entered during registration.
     */
    public string $country;

    /**
     * @var string The user's city entered during registration.
     */
    public string $city;

    /**
     * @var string The user's postal code entered during registration.
     */
    public string $postCode;

    /**
     * @var string The user's phone number entered during registration.
     */
    public string $phoneNumber;

    /**
     * @var bool Indicates whether the user with the given email is already registered (true/false).
     */
    public $isRegisteredAlready;

    /**
     * @var string The CSRF token for form submission security.
     */
    public string $csrfToken;

    /**
     * SignUpView constructor.
     *
     * @param string $isFormValid Indicates whether the form data is valid ("valid" or "invalid").
     * @param bool $isRegisteredAlready Indicates whether the user with the given email is already registered (true/false).
     * @param string $isRegistrationSuccess Indicates whether the user registration was successful ("success" or "failure").
     * @param string $email The user's email address entered during registration.
     * @param string $password The user's chosen password during registration.
     * @param string $passwordRepeat The repeated password entered during registration.
     * @param string $name The user's first name entered during registration.
     * @param string $surname The user's surname entered during registration.
     * @param string $address The user's address entered during registration.
     * @param string $country The user's country entered during registration.
     * @param string $city The user's city entered during registration.
     * @param string $postCode The user's postal code entered during registration.
     * @param string $phoneNumber The user's phone number entered during registration.
     * @param string $csrfToken The CSRF token for form submission security.
     */
    public function __construct($isFormValid, $isRegisteredAlready, $isRegistrationSuccess, $email, $password, $passwordRepeat, $name, $surname, $address, $country, $city, $postCode, $phoneNumber, $csrfToken)
    {
        $this->isFormValid = $isFormValid;
        $this->isRegisteredAlready = $isRegisteredAlready;
        $this->isRegistrationSuccess = $isRegistrationSuccess;
        $this->isRegistered = $isRegistrationSuccess;
        $this->email = $email;
        $this->password = $password;
        $this->passwordRepeat = $passwordRepeat;
        $this->name = $name;
        $this->surname = $surname;
        $this->address = $address;
        $this->country = $country;
        $this->city = $city;
        $this->postCode = $postCode;
        $this->phoneNumber = $phoneNumber;
        $this->csrfToken = $csrfToken;
    }

    /**
     * Render the sign-up page template.
     */
    public function render(): void
    {
        // Include the template for rendering the sign-up page (e.g., signUp.php).
        include __DIR__ . '/templates/signUp.php';
    }
}

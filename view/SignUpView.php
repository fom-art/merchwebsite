<?php

namespace view;

use controller\utlis\FormValidation;

require_once "utils/sections/SignUpSections.php";
require_once 'utils/Icons.php';
require_once 'utils/HrefsConstants.php';

class SignUpView
{
    public string $isFormValid;
    public string $isRegistrationSuccess;
    public string $isRegistered;
    public string $email;
    public string $password;
    public string $passwordRepeat;
    public string $name;
    public string $surname;
    public string $address;
    public string $country;
    public string $city;
    public string $postCode;
    public string $phoneNumber;
    public $isRegisteredAlready;

    public function __construct($isFormValid, $isRegisteredAlready, $isRegistrationSuccess, $email, $password, $passwordRepeat, $name, $surname, $address, $country, $city, $postCode, $phoneNumber)
    {
        $this->isFormValid = $isFormValid;
        $this->isRegisteredAlready = $isRegisteredAlready;
        $this->isRegistrationSuccess = FormValidation::validateSignUpForm($email, $name, $surname, $password, $passwordRepeat, $address, $country, $city, $postCode, $phoneNumber);
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
    }

    public function render(): void
    {
        include __DIR__ . '/templates/signUp.php';
    }
}
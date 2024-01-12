<?php

namespace view;

use controller\utlis\FormValidation;

require_once "utils/sections/SignUpSections.php";
require_once 'utils/Icons.php';
require_once 'utils/HrefsConstants.php';

class SignUpView
{
    public string $isPostSet;
    public string $isFormValid;
    public string $isAlreadyRegistered;
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

    public function __construct($isPostSet, $isAlreadyRegistered, $email, $password, $passwordRepeat, $name, $surname, $address, $country, $city, $postCode, $phoneNumber)
    {
        $this->isPostSet = $isPostSet;
        $this->isFormValid = FormValidation::validateSignUpForm($email, $name, $surname, $password, $passwordRepeat, $address, $country, $city, $postCode, $phoneNumber);
        $this->isAlreadyRegistered = $isAlreadyRegistered;
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
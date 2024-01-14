<?php

namespace view;
use controller\utlis\FormValidation;

require_once "utils/sections/UserDetailsSections.php";
require_once 'utils/Icons.php';
require_once 'utils/HrefsConstants.php';

class UserDetailsView
{
    public string $isPostSet;
    public string $isFormValid;
    public string $email;
    public string $password;
    public string $name;
    public string $surname;
    public string $address;
    public string $country;
    public string $city;
    public string $postCode;
    public string $phoneNumber;
    public string $csrfToken;
    public bool $userDetailsEditResult;
    public bool $isCsrfSuccess;
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

    public function render()
    {
        include __DIR__ . '/templates/userDetails.php';
    }
}

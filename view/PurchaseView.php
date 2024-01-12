<?php

namespace view;

use controller\utlis\FormValidation;

require_once "utils/sections/PurchaseSections.php";
require_once 'utils/HrefsConstants.php';

class PurchaseView
{
    public String $isPostSet;
    public String $isFormValid;
    public String $email;
    public String $name;
    public String $surname;
    public String $address;
    public String $country;
    public String $city;
    public String $postCode;
    public String $phoneNumber;
    public String $purchaseDescription;

    public function __construct($isPostSet, $email, $name, $surname, $address, $country, $city, $postCode, $phoneNumber, $purchaseDescription)
    {
        $this->isFormValid = FormValidation::validatePurchaseForm($email, $name, $surname, $address, $country, $city, $postCode, $phoneNumber, $purchaseDescription);
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
    }    public function render() {
        include __DIR__ . '/templates/purchase.php';
    }
}
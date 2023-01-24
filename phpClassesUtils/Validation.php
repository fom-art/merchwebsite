<?php

class Validation
{
    function __construct()
    {
        require_once("../phpClassesConstants/Constants.php");
    }

    function isEmailValid($input): bool
    {
        return preg_match(Constants::EMAIL_REGEX, $input);
    }

    function isPasswordValid($input): bool
    {
        return preg_match(Constants::PASSWORD_REGEX, $input) && strlen($input) >= 8;
    }

    function isPasswordRepeatValid($passwordInput, $passwordRepeatInput): bool
    {
        return $passwordInput == $passwordRepeatInput;
    }

    function isNameValid($input): bool
    {
        return preg_match(Constants::NAME_REGEX, $input);
    }

    function isAddressValid($input): bool
    {
        return preg_match(Constants::ADDRESS_REGEX, $input);
    }

    function isCountryOrCityValid($input): bool
    {
        return preg_match(Constants::COUNTRY_AND_CITY_REGEX, $input);
    }

    function isPostCodeValid($input): bool
    {
        return preg_match(Constants::POST_CODE_REGEX, $input);
    }

    function isPhoneNumberValid($input): bool
    {
        return preg_match(Constants::PHONE_REGEX, $input);
    }

    function isProductNameValid($input): bool
    {
        return preg_match(Constants::PRODUCT_NAME_REGEX, $input);
    }

    function isProductPriceValid($input): bool
    {
        return preg_match(Constants::PRODUCT_PRICE_REGEX, $input);
    }

    function isProductPhotoExtensionValid($input): bool
    {
        return in_array($input, Constants::ALLOWED_PHOTO_EXTENSIONS);
    }

    function isPurchaseDescriptionValid($input): bool
    {
        return preg_match(Constants::PURCHASE_DESCRIPTION_REGEX, $input);
    }

    function isProductTypeValid($input): bool
    {
        return preg_match(Constants::PRODUCT_TYPE_REGEX, $input);
    }

    function isProductDescriptionValid($input): bool
    {
        return preg_match(Constants::PRODUCT_DESCRIPTION_REGEX, $input);
    }

    function validateSignUpForm($email, $name, $surname, $password, $passwordRepeat, $address, $country, $city, $postCode, $phoneNumber): bool {
        return $this->isEmailValid($email) *
            $this->isNameValid($name) *
            $this->isNameValid($surname) *
            $this->isPasswordValid($password) *
            $this->isPasswordRepeatValid($password, $passwordRepeat) *
            $this->isAddressValid($address) *
            $this->isCountryOrCityValid($country) *
            $this->isCountryOrCityValid($city) *
            $this->isPostCodeValid($postCode) *
            $this->isPhoneNumberValid($phoneNumber);
    }

    function validateSignInForm($email, $password): bool {
        return $this->isEmailValid($email) *
            $this->isPasswordValid($password);
    }

    function validatePurchaseForm($email, $name, $surname, $address, $country, $city, $postCode, $phoneNumber, $purchaseDescription): bool {
        return $this->isEmailValid($email) *
            $this->isNameValid($name) *
            $this->isNameValid($surname) *
            $this->isAddressValid($address) *
            $this->isCountryOrCityValid($country) *
            $this->isCountryOrCityValid($city) *
            $this->isPostCodeValid($postCode) *
            $this->isPhoneNumberValid($phoneNumber)*
            $this->isPurchaseDescriptionValid($purchaseDescription);
    }
    function validateProductForm($productName, $productPrice, $productType, $productDescription, $productPhotoExtension): bool {
        return $this->isProductNameValid($productName) *
            $this->isProductPriceValid($productPrice) *
            $this->isProductTypeValid($productType) *
            $this->isProductDescriptionValid($productDescription) *
            $this->isProductPhotoExtensionValid($productPhotoExtension) ;
    }
}

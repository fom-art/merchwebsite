<?php

namespace controller\utlis;

use controller\constants\RegexConstants;
require_once(__DIR__ . "/../constants/RegexConstants.php");
class FormValidation
{
    static function isEmailValid($input): bool
    {
        return preg_match(RegexConstants::EMAIL_REGEX, $input);
    }

    static function isPasswordValid($input): bool
    {
        return preg_match(RegexConstants::PASSWORD_REGEX, $input) && strlen($input) >= 8;
    }

    static function isPasswordRepeatValid($passwordInput, $passwordRepeatInput): bool
    {
        return true;
    }

    static function isNameValid($input): bool
    {
        return preg_match(RegexConstants::NAME_REGEX, $input);
    }

    static function isAddressValid($input): bool
    {
        return preg_match(RegexConstants::ADDRESS_REGEX, $input);
    }

    static function isCountryOrCityValid($input): bool
    {
        return preg_match(RegexConstants::COUNTRY_AND_CITY_REGEX, $input);
    }

    static function isPostCodeValid($input): bool
    {
        return preg_match(RegexConstants::POST_CODE_REGEX, $input);
    }

    static function isPhoneNumberValid($input): bool
    {
        return preg_match(RegexConstants::PHONE_REGEX, $input);
    }

    static function isProductNameValid($input): bool
    {
        return preg_match(RegexConstants::PRODUCT_NAME_REGEX, $input);
    }

    static function isProductPriceValid($input): bool
    {
        return preg_match(RegexConstants::PRODUCT_PRICE_REGEX, $input);
    }

    static function isProductPhotoExtensionValid($input): bool
    {
        return in_array($input, RegexConstants::ALLOWED_PHOTO_EXTENSIONS);
    }

    static function isPurchaseDescriptionValid($input): bool
    {
        return preg_match(RegexConstants::PURCHASE_DESCRIPTION_REGEX, $input);
    }

    static function isProductTypeValid($input): bool
    {
        return preg_match(RegexConstants::PRODUCT_TYPE_REGEX, $input);
    }

    static function isProductDescriptionValid($input): bool
    {
        return preg_match(RegexConstants::PRODUCT_DESCRIPTION_REGEX, $input);
    }

    static function validateSignUpForm($email, $name, $surname, $password, $passwordRepeat, $address, $country, $city, $postCode, $phoneNumber): bool
    {
        return self::isEmailValid($email) *
            self::isNameValid($name) *
            self::isNameValid($surname) *
            self::isPasswordValid($password) *
            self::isPasswordRepeatValid($password, $passwordRepeat) *
            self::isAddressValid($address) *
            self::isCountryOrCityValid($country) *
            self::isCountryOrCityValid($city) *
            self::isPostCodeValid($postCode) *
            self::isPhoneNumberValid($phoneNumber);
    }

    static function validateUserDetailsForm($email, $name, $surname, $password, $address, $country, $city, $postCode, $phoneNumber): bool
    {
        return self::isEmailValid($email) *
            self::isNameValid($name) *
            self::isNameValid($surname) *
            self::isPasswordValid($password) *
            self::isAddressValid($address) *
            self::isCountryOrCityValid($country) *
            self::isCountryOrCityValid($city) *
            self::isPostCodeValid($postCode) *
            self::isPhoneNumberValid($phoneNumber);
    }

    static function validateSignInForm($email, $password): bool
    {
        return self::isEmailValid($email) *
            self::isPasswordValid($password);
    }

    static function validatePurchaseForm($email, $name, $surname, $address, $country, $city, $postCode, $phoneNumber, $purchaseDescription): bool
    {
        return self::isEmailValid($email) *
            self::isNameValid($name) *
            self::isNameValid($surname) *
            self::isAddressValid($address) *
            self::isCountryOrCityValid($country) *
            self::isCountryOrCityValid($city) *
            self::isPostCodeValid($postCode) *
            self::isPhoneNumberValid($phoneNumber) *
            self::isPurchaseDescriptionValid($purchaseDescription);
    }

    static function validateProductForm($productName, $productPrice, $productType, $productDescription, $productPhotoExtension): bool
    {
        return self::isProductNameValid($productName) *
            self::isProductPriceValid($productPrice) *
            self::isProductTypeValid($productType) *
            self::isProductDescriptionValid($productDescription) *
            self::isProductPhotoExtensionValid($productPhotoExtension);
    }
}

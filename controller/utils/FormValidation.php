<?php

namespace controller\utlis;

use controller\constants\RegexConstants;

require_once(__DIR__ . "/../constants/RegexConstants.php");


/**
* Class FormValidation
* This class provides methods for validating various form inputs and data.
*/
class FormValidation
{
    /**
     * Validate if the given input is a valid email address.
     *
     * @param string $input The email address to validate.
     * @return bool True if the email is valid, otherwise false.
     */
    static function isEmailValid($input): bool
    {
        return preg_match(RegexConstants::EMAIL_REGEX, $input);
    }

    /**
     * Validate if the given password meets the criteria.
     *
     * @param string $input The password to validate.
     * @return bool True if the password is valid, otherwise false.
     */
    static function isPasswordValid($input): bool
    {
        return preg_match(RegexConstants::PASSWORD_REGEX, $input) && strlen($input) >= 8;
    }

    /**
     * Validate if the repeated password matches the original password.
     *
     * @param string $passwordInput The original password.
     * @param string $passwordRepeatInput The repeated password to compare.
     * @return bool True if the passwords match, otherwise false.
     */
    static function isPasswordRepeatValid($passwordInput, $passwordRepeatInput): bool
    {
        return $passwordInput === $passwordRepeatInput;
    }

    /**
     * Validate if the given name is valid.
     *
     * @param string $input The name to validate.
     * @return bool True if the name is valid, otherwise false.
     */
    static function isNameValid($input): bool
    {
        return preg_match(RegexConstants::NAME_REGEX, $input);
    }

    /**
     * Validate if the given address is valid.
     *
     * @param string $input The address to validate.
     * @return bool True if the address is valid, otherwise false.
     */
    static function isAddressValid($input): bool
    {
        return preg_match(RegexConstants::ADDRESS_REGEX, $input);
    }

    /**
     * Validate if the given country or city is valid.
     *
     * @param string $input The country or city to validate.
     * @return bool True if the country or city is valid, otherwise false.
     */
    static function isCountryOrCityValid($input): bool
    {
        return preg_match(RegexConstants::COUNTRY_AND_CITY_REGEX, $input);
    }

    /**
     * Validate if the given post code is valid.
     *
     * @param string $input The post code to validate.
     * @return bool True if the post code is valid, otherwise false.
     */
    static function isPostCodeValid($input): bool
    {
        return preg_match(RegexConstants::POST_CODE_REGEX, $input);
    }

    /**
     * Validate if the given phone number is valid.
     *
     * @param string $input The phone number to validate.
     * @return bool True if the phone number is valid, otherwise false.
     */
    static function isPhoneNumberValid($input): bool
    {
        return preg_match(RegexConstants::PHONE_REGEX, $input);
    }

    /**
     * Validate if the given product name is valid.
     *
     * @param string $input The product name to validate.
     * @return bool True if the product name is valid, otherwise false.
     */
    static function isProductNameValid($input): bool
    {
        return preg_match(RegexConstants::PRODUCT_NAME_REGEX, $input);
    }

    /**
     * Validate if the given product price is valid.
     *
     * @param string $input The product price to validate.
     * @return bool True if the product price is valid, otherwise false.
     */
    static function isProductPriceValid($input): bool
    {
        return preg_match(RegexConstants::PRODUCT_PRICE_REGEX, $input);
    }

    /**
     * Validate if the given product photo is valid.
     *
     * @param array $image The product photo data to validate.
     * @return bool True if the product photo is valid, otherwise false.
     */
    static function isProductPhotoValid($image): bool
    {
        if (is_array($image) && isset($image['tmp_name']) && $image['error'] === UPLOAD_ERR_OK) {
            $allowedExtensions = ['jpg', 'jpeg', 'png'];

            // Check for upload errors
            if ($image['error'] !== UPLOAD_ERR_OK) {
                return false;
            }

            $fileExtension = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));

            if (!in_array($fileExtension, $allowedExtensions)) {
                return false;
            }

            // Use getimagesize() to validate if the file is an image
            if (!getimagesize($image['tmp_name'])) {
                return false;
            }
            return true;
        }
        return false;
    }

    /**
     * Validate if the given purchase description is valid.
     *
     * @param string $input The purchase description to validate.
     * @return bool True if the purchase description is valid, otherwise false.
     */
    static function isPurchaseDescriptionValid($input): bool
    {
        return preg_match(RegexConstants::PURCHASE_DESCRIPTION_REGEX, $input);
    }

    /**
     * Validate if the given product type is valid.
     *
     * @param string $input The product type to validate.
     * @return bool True if the product type is valid, otherwise false.
     */
    static function isProductTypeValid($input): bool
    {
        return preg_match(RegexConstants::PRODUCT_TYPE_REGEX, $input);
    }

    /**
     * Validate if the given product description is valid.
     *
     * @param string $input The product description to validate.
     * @return bool True if the product description is valid, otherwise false.
     */
    static function isProductDescriptionValid($input): bool
    {
        return preg_match(RegexConstants::PRODUCT_DESCRIPTION_REGEX, $input);
    }

    /**
     * Validate a sign-up form with multiple input fields.
     *
     * @param string $email The email address to validate.
     * @param string $name The name to validate.
     * @param string $surname The surname to validate.
     * @param string $password The password to validate.
     * @param string $passwordRepeat The repeated password to validate.
     * @param string $address The address to validate.
     * @param string $country The country to validate.
     * @param string $city The city to validate.
     * @param string $postCode The post code to validate.
     * @param string $phoneNumber The phone number to validate.
     * @return bool True if all fields are valid, otherwise false.
     */
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

    /**
     * Validate a user details form with multiple input fields.
     *
     * @param string $email The email address to validate.
     * @param string $name The name to validate.
     * @param string $surname The surname to validate.
     * @param string $password The password to validate.
     * @param string $address The address to validate.
     * @param string $country The country to validate.
     * @param string $city The city to validate.
     * @param string $postCode The post code to validate.
     * @param string $phoneNumber The phone number to validate.
     * @return bool True if all fields are valid, otherwise false.
     */
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

    /**
     * Validate a sign-in form with email and password.
     *
     * @param string $email The email address to validate.
     * @param string $password The password to validate.
     * @return bool True if the email and password are valid, otherwise false.
     */
    static function validateSignInForm($email, $password): bool
    {
        return self::isEmailValid($email) *
            self::isPasswordValid($password);
    }

    /**
     * Validate a purchase form with multiple input fields.
     *
     * @param string $email The email address to validate.
     * @param string $name The name to validate.
     * @param string $surname The surname to validate.
     * @param string $address The address to validate.
     * @param string $country The country to validate.
     * @param string $city The city to validate.
     * @param string $postCode The post code to validate.
     * @param string $phoneNumber The phone number to validate.
     * @param string $purchaseDescription The purchase description to validate.
     * @return bool True if all fields are valid, otherwise false.
     */
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

    /**
     * Validate a product form with multiple input fields.
     *
     * @param string $productName The product name to validate.
     * @param string $productPrice The product price to validate.
     * @param string $productType The product type to validate.
     * @param string $productDescription The product description to validate.
     * @param array $productPhoto The product photo data to validate.
     * @return bool True if all fields are valid, otherwise false.
     */
    static function validateProductForm($productName, $productPrice, $productType, $productDescription, $productPhoto): bool
    {
        return self::isProductNameValid($productName) *
            self::isProductPriceValid($productPrice) *
            self::isProductTypeValid($productType) *
            self::isProductDescriptionValid($productDescription) *
            self::isProductPhotoValid($productPhoto);
    }
}

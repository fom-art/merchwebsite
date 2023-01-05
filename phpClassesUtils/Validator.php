<?php

class Validation
{
    private $constants;

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
        return preg_match(Constants::PASSWORD_REGEX, $input);
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


}

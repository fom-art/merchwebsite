<?php

namespace controller\constants;
/**
 * Class RegexConstants
 *
 * Contains regular expression patterns for various validation purposes.
 *
 * @package controller\constants
 */
class RegexConstants
{
    /**
     * Regular expression pattern for validating email addresses.
     *
     * @var string
     */
    public const EMAIL_REGEX = "/[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";

    /**
     * Regular expression pattern for validating passwords.
     *
     * @var string
     */
    public const PASSWORD_REGEX = "/[_a-z0-9-]+$/";

    /**
     * Regular expression pattern for validating names.
     *
     * @var string
     */
    public const NAME_REGEX = "/[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+[\sa-zA-Z0-9]+$/";

    /**
     * Regular expression pattern for validating addresses.
     *
     * @var string
     */
    public const ADDRESS_REGEX = "/[\sa-zA-Z0-9]+$/";

    /**
     * Regular expression pattern for validating countries and cities.
     *
     * @var string
     */
    public const COUNTRY_AND_CITY_REGEX = "/[A-Za-z\s]+$/";

    /**
     * Regular expression pattern for validating postal codes.
     *
     * @var string
     */
    public const POST_CODE_REGEX = "/\d{5}(-\d{4})?$/";

    /**
     * Regular expression pattern for validating phone numbers.
     *
     * @var string
     */
    public const PHONE_REGEX = "/[+]?[0-9]+$/";

    /**
     * Regular expression pattern for validating product names.
     *
     * @var string
     */
    public const PRODUCT_NAME_REGEX = "/[\sa-zA-Z0-9]+$/";

    /**
     * Regular expression pattern for validating product prices.
     *
     * @var string
     */
    public const PRODUCT_PRICE_REGEX = "/\d+\.?\d*$/";

    /**
     * Regular expression pattern for validating purchase descriptions.
     *
     * @var string
     */
    public const PURCHASE_DESCRIPTION_REGEX = "/[\sa-zA-Z0-9]+$/";

    /**
     * Regular expression pattern for validating product types.
     *
     * @var string
     */
    public const PRODUCT_TYPE_REGEX = "/[\sa-zA-Z0-9]+$/";

    /**
     * Regular expression pattern for validating product descriptions.
     *
     * @var string
     */
    public const PRODUCT_DESCRIPTION_REGEX = "/[\sa-zA-Z0-9]+$/";

    public const ALLOWED_PHOTO_EXTENSIONS = array('png', 'jpg', 'jpeg', 'image/jpeg', 'image/png');
}
<?php

namespace controller\constants;
class RegexConstants
{
    public const EMAIL_REGEX = "/[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
    public const PASSWORD_REGEX = "/[_a-z0-9-]+$/";
    public const NAME_REGEX = "/[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+[\sa-zA-Z0-9]+$/";
    public const ADDRESS_REGEX = "/[\sa-zA-Z0-9]+$/";
    public const COUNTRY_AND_CITY_REGEX = "/[A-Za-z\s]+$/";
    public const POST_CODE_REGEX = "/\d{5}(-\d{4})?$/";
    public const PHONE_REGEX = "/[+]?[0-9]+$/";
    public const PRODUCT_NAME_REGEX = "/[\sa-zA-Z0-9]+$/";
    public const PRODUCT_PRICE_REGEX = "/\d+\.?\d*$/";
    public const PURCHASE_DESCRIPTION_REGEX = "/[\sa-zA-Z0-9]+$/";
    public const PRODUCT_TYPE_REGEX = "/[\sa-zA-Z0-9]+$/";
    public const PRODUCT_DESCRIPTION_REGEX = "/[\sa-zA-Z0-9]+$/";
    public const ALLOWED_PHOTO_EXTENSIONS = array('png', 'jpg', 'jpeg', 'image/jpeg', 'image/png');
}
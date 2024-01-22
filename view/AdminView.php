<?php

namespace view;

require_once "utils/sections/AdminSections.php";
require_once 'utils/HrefsConstants.php';

/**
 * Class AdminView
 *
 * This class represents the view for the admin section of the application.
 * It provides methods to render the admin page with product information and handling CSRF tokens.
 */
class AdminView
{
    /**
     * @var string The product name.
     */
    public string $productName;

    /**
     * @var string The product price.
     */
    public string $productPrice;

    /**
     * @var string The product type.
     */
    public string $productType;

    /**
     * @var string The product description.
     */
    public string $productDescription;

    /**
     * @var array The product photo.
     */
    public array $productPhoto;

    /**
     * @var string The CSRF token value.
     */
    public string $csrfToken;

    /**
     * @var bool The result of adding a product.
     */
    public bool $addProductResult;

    /**
     * @var bool Indicates if CSRF token validation was successful.
     */
    public bool $isCsrfSuccess;

    /**
     * AdminView constructor.
     *
     * @param string $productName        The product name.
     * @param string $productPrice       The product price.
     * @param string $productType        The product type.
     * @param string $productDescription The product description.
     * @param array $productPhoto       The product photo name.
     * @param bool $addProductResult   The result of adding a product.
     * @param string $csrfToken          The CSRF token value.
     * @param bool $isCsrfSuccess      Indicates if CSRF token validation was successful.
     */
    public function __construct(
        string $productName,
        string $productPrice,
        string $productType,
        string $productDescription,
        array $productPhoto,
        bool   $addProductResult,
        string $csrfToken,
        bool   $isCsrfSuccess)
    {
        $this->productName = $productName;
        $this->productPrice = $productPrice;
        $this->productType = $productType;
        $this->productDescription = $productDescription;
        $this->productPhoto = $productPhoto;
        $this->addProductResult = $addProductResult;
        $this->csrfToken = $csrfToken;
        $this->isCsrfSuccess = $isCsrfSuccess;
    }

    /**
     * Render the admin page with product information.
     */
    public function render()
    {
        include __DIR__ . '/templates/admin.php';
    }
}
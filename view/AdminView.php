<?php

namespace view;

require_once "utils/sections/AdminSections.php";
require_once 'utils/HrefsConstants.php';

class AdminView
{
    public string $productName;
    public string $productPrice;
    public string $productType;
    public string $productDescription;
    public string $productPhoto;
    public string $csrfToken;
    public bool $addProductResult;
    public bool $isCsrfSuccess;

    public function __construct(
        $productName,
        $productPrice,
        $productType,
        $productDescription,
        $productPhoto,
        $addProductResult,
        $csrfToken,
        $isCsrfSuccess)
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

    public function render()
    {
        include __DIR__ . '/templates/admin.php';
    }
}
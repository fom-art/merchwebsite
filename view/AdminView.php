<?php

namespace view;

require_once "utils/sections/AdminSections.php";
require_once 'utils/HrefsConstants.php';

class AdminView
{
    public String $productName;
    public String $productPrice;
    public String $productType;
    public String $productDescription;
    public String $productPhoto;

    public function __construct(
        $productName,
        $productPrice,
        $productType,
        $productDescription,
        $productPhoto)
    {
        $this->$productName = $productName;
        $this->$productPrice = $productPrice;
        $this->$productType = $productType;
        $this->$productDescription = $productDescription;
        $this->$productPhoto = $productPhoto;
    }
    public function render() {
        include __DIR__ . '/templates/admin.php';
    }
}
<?php

class Product
{
    private $id = null;
    private $productName;
    private $productPrice;
    private $productPhotoPath;
    private $productType;
    private $productDescription;

    public function getId()
    {
        return $this->id;
    }

    public function getProductName()
    {
        return $this->productName;
    }

    public function getProductPrice()
    {
        return $this->productPrice;
    }

    public function getProductPhotoPath()
    {
        return $this->productPhotoPath;
    }

    public function getProductType()
    {
        return $this->productType;
    }

    public function getProductPhotoDescription()
    {
        return $this->productDescription;
    }

    public function setId($newValue): bool
    {
        if (is_string($newValue)) {
            $this->id = $newValue;
            return true;
        } else {
            return false;
        }
    }

    public function setProductName($newValue): bool
    {
        if (is_string($newValue)) {
            $this->productName = $newValue;
            return true;
        } else {
            return false;
        }
    }

    public function setProductPrice($newValue): bool
    {
        if (is_string($newValue)) {
            $this->productPrice = $newValue;
            return true;
        } else {
            return false;
        }
    }

    public function setPhotoPath($newValue): bool
    {
        if (is_string($newValue)) {
            $this->productPhotoPath = $newValue;
            return true;
        } else {
            return false;
        }
    }

    public function setProductType($newValue): bool
    {
        if (is_string($newValue)) {
            $this->productType = $newValue;
            return true;
        } else {
            return false;
        }
    }

    public function setProductDescription($newValue): bool
    {
        if (is_string($newValue)) {
            $this->productDescription = $newValue;
            return true;
        } else {
            return false;
        }
    }

    public function setProduct($id, $productName, $productPrice, $productType, $productDescription, $productPhotoPath)
    {
        $this->setId($id);
        $this->setProductName($productName);
        $this->setProductPrice($productPrice);
        $this->setProductType($productType);
        $this->setProductDescription($productDescription);
        $this->setPhotoPath($productPhotoPath);
    }
}

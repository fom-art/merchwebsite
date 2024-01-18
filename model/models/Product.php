<?php

namespace model\models;

class Product
{
    /**
     * @var int|null The ID of the product.
     */
    private $id = null;

    /**
     * @var string The name of the product.
     */
    private $productName;

    /**
     * @var string The price of the product.
     */
    private $productPrice;

    /**
     * @var string The path to the product's photo.
     */
    private $productPhotoPath;

    /**
     * @var string The type/category of the product.
     */
    private $productType;

    /**
     * @var string The description of the product.
     */
    private $productDescription;

    /**
     * Get the ID of the product.
     *
     * @return int|null The ID of the product.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the name of the product.
     *
     * @return string The name of the product.
     */
    public function getProductName()
    {
        return $this->productName;
    }

    /**
     * Get the price of the product.
     *
     * @return string The price of the product.
     */
    public function getProductPrice()
    {
        return $this->productPrice;
    }

    /**
     * Get the path to the product's photo.
     *
     * @return string The path to the product's photo.
     */
    public function getProductPhotoPath()
    {
        return $this->productPhotoPath;
    }

    /**
     * Get the type/category of the product.
     *
     * @return string The type/category of the product.
     */
    public function getProductType()
    {
        return $this->productType;
    }

    /**
     * Get the description of the product.
     *
     * @return string The description of the product.
     */
    public function getProductPhotoDescription()
    {
        return $this->productDescription;
    }

    /**
     * Set the ID of the product.
     *
     * @param int|string $newValue The new ID value.
     *
     * @return bool True if the ID was set successfully, false otherwise.
     */
    public function setId($newValue): bool
    {
        if (gettype($newValue) == "string") {
            $this->id = $newValue;
            return true;
        } else {
            return false;
        }
    }

    /**
     * Set the name of the product.
     *
     * @param string $newValue The new name value.
     *
     * @return bool True if the name was set successfully, false otherwise.
     */
    public function setProductName($newValue): bool
    {
        if (gettype($newValue) == "string") {
            $this->productName = $newValue;
            return true;
        } else {
            return false;
        }
    }

    /**
     * Set the price of the product.
     *
     * @param string $newValue The new price value.
     *
     * @return bool True if the price was set successfully, false otherwise.
     */
    public function setProductPrice($newValue): bool
    {
        if (gettype($newValue) == "string") {
            $this->productPrice = $newValue;
            return true;
        } else {
            return false;
        }
    }

    /**
     * Set the path to the product's photo.
     *
     * @param string $newValue The new photo path value.
     *
     * @return bool True if the photo path was set successfully, false otherwise.
     */
    public function setPhotoPath($newValue): bool
    {
        if (gettype($newValue) == "string") {
            $this->productPhotoPath = $newValue;
            return true;
        } else {
            return false;
        }
    }

    /**
     * Set the type/category of the product.
     *
     * @param string $newValue The new type/category value.
     *
     * @return bool True if the type/category was set successfully, false otherwise.
     */
    public function setProductType($newValue): bool
    {
        if (gettype($newValue) == "string") {
            $this->productType = $newValue;
            return true;
        } else {
            return false;
        }
    }

    /**
     * Set the description of the product.
     *
     * @param string $newValue The new description value.
     *
     * @return bool True if the description was set successfully, false otherwise.
     */
    public function setProductDescription($newValue): bool
    {
        if (gettype($newValue) == "string") {
            $this->productDescription = $newValue;
            return true;
        } else {
            return false;
        }
    }

    /**
     * Set the properties of the product.
     *
     * @param int|string $id               The new ID value.
     * @param string     $productName      The new name value.
     * @param string     $productPrice     The new price value.
     * @param string     $productType      The new type/category value.
     * @param string     $productDescription The new description value.
     * @param string     $productPhotoPath The new photo path value.
     */
    public function setProduct($id, $productName, $productPrice, $productType, $productDescription, $productPhotoPath)
    {
        $this->setId($id);
        $this->setProductName($productName);
        $this->setProductPrice($productPrice);
        $this->setProductType($productType);
        $this->setProductDescription($productDescription);
        $this->setPhotoPath($productPhotoPath);
    }

    /**
     * Set the path to the product's photo.
     *
     * @param string $productPhotoPath The new photo path value.
     */
    public function setProductPhotoPath(string $productPhotoPath)
    {
        $this->productPhotoPath = $productPhotoPath;
    }

    /**
     * Convert the Product object to a JSON string.
     *
     * @return string A JSON representation of the Product object.
     */
    public function __toString()
    {
        return json_encode([
            'id' => $this->getId(),
            'productName' => $this->getProductName(),
            'productPrice' => $this->getProductPrice(),
            'productPhotoPath' => $this->getProductPhotoPath(),
            'productType' => $this->getProductType(),
            'productDescription' => $this->getProductPhotoDescription()
        ]);
    }

    /**
     * Convert the Product object to an associative array.
     *
     * @return array An associative array representing the Product object.
     */
    public function toArray() {
        return [
            'id' => $this->getId(),
            'productName' => $this->getProductName(),
            'productPrice' => $this->getProductPrice(),
            'productPhotoPath' => $this->getProductPhotoPath(),
            'productType' => $this->getProductType(),
            'productDescription' => $this->getProductPhotoDescription()
        ];
    }

}
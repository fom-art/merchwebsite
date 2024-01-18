<?php

namespace model\models;

/**
 * Class Purchase
 *
 * Represents a purchase made by a user.
 */
class Purchase
{
    /**
     * @var int|null The ID of the purchase.
     */
    private $id = null;

    /**
     * @var string The email associated with the purchase.
     */
    private $email;

    /**
     * @var string The name associated with the purchase.
     */
    private $name;

    /**
     * @var string The surname associated with the purchase.
     */
    private $surname;

    /**
     * @var string The address associated with the purchase.
     */
    private $address;

    /**
     * @var string The country associated with the purchase.
     */
    private $country;

    /**
     * @var string The city associated with the purchase.
     */
    private $city;

    /**
     * @var string The postal code associated with the purchase.
     */
    private $postCode;

    /**
     * @var string The phone number associated with the purchase.
     */
    private $phoneNumber;

    /**
     * @var string The description of the purchase.
     */
    private $purchaseDescription;

    /**
     * Get the ID of the purchase.
     *
     * @return int|null The ID of the purchase.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the email associated with the purchase.
     *
     * @return string The email associated with the purchase.
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the name associated with the purchase.
     *
     * @return string The name associated with the purchase.
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the surname associated with the purchase.
     *
     * @return string The surname associated with the purchase.
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Get the address associated with the purchase.
     *
     * @return string The address associated with the purchase.
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Get the country associated with the purchase.
     *
     * @return string The country associated with the purchase.
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Get the city associated with the purchase.
     *
     * @return string The city associated with the purchase.
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Get the phone number associated with the purchase.
     *
     * @return string The phone number associated with the purchase.
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Get the postal code associated with the purchase.
     *
     * @return string The postal code associated with the purchase.
     */
    public function getPostCode()
    {
        return $this->postCode;
    }

    /**
     * Get the description of the purchase.
     *
     * @return string The description of the purchase.
     */
    public function getPurchaseDescription()
    {
        return $this->purchaseDescription;
    }

    /**
     * Set the ID of the purchase.
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
     * Set the email associated with the purchase.
     *
     * @param string $newValue The new email value.
     *
     * @return bool True if the email was set successfully, false otherwise.
     */
    public function setEmail($newValue): bool
    {
        if (gettype($newValue) == "string") {
            $this->email = $newValue;
            return true;
        } else {
            return false;
        }
    }

    /**
     * Set the name associated with the purchase.
     *
     * @param string $newValue The new name value.
     *
     * @return bool True if the name was set successfully, false otherwise.
     */
    public function setName($newValue): bool
    {
        if (gettype($newValue) == "string") {
            $this->name = $newValue;
            return true;
        } else {
            return false;
        }
    }

    /**
     * Set the surname associated with the purchase.
     *
     * @param string $newValue The new surname value.
     *
     * @return bool True if the surname was set successfully, false otherwise.
     */
    public function setSurname($newValue): bool
    {
        if (gettype($newValue) == "string") {
            $this->surname = $newValue;
            return true;
        } else {
            return false;
        }
    }

    /**
     * Set the address associated with the purchase.
     *
     * @param string $newValue The new address value.
     *
     * @return bool True if the address was set successfully, false otherwise.
     */
    public function setAddress($newValue): bool
    {
        if (gettype($newValue) == "string") {
            $this->address = $newValue;
            return true;
        } else {
            return false;
        }
    }

    /**
     * Set the country associated with the purchase.
     *
     * @param string $newValue The new country value.
     *
     * @return bool True if the country was set successfully, false otherwise.
     */
    public function setCountry($newValue): bool
    {
        if (gettype($newValue) == "string") {
            $this->country = $newValue;
            return true;
        } else {
            return false;
        }
    }

    /**
     * Set the city associated with the purchase.
     *
     * @param string $newValue The new city value.
     *
     * @return bool True if the city was set successfully, false otherwise.
     */
    public function setCity($newValue): bool
    {
        if (gettype($newValue) == "string") {
            $this->city = $newValue;
            return true;
        } else {
            return false;
        }
    }


    /**
     * Set the postal code associated with the purchase.
     *
     * @param string $newValue The new postal code value.
     *
     * @return bool True if the postal code was set successfully, false otherwise.
     */
    public function setPostCode($newValue): bool
    {
        if (gettype($newValue) == "string") {
            $this->postCode = $newValue;
            return true;
        } else {
            return false;
        }
    }

    /**
     * Set the phone number associated with the purchase.
     *
     * @param string $newValue The new phone number value.
     *
     * @return bool True if the phone number was set successfully, false otherwise.
     */
    public function setPhoneNumber($newValue): bool
    {
        if (gettype($newValue) == "string") {
            $this->phoneNumber = $newValue;
            return true;
        } else {
            return false;
        }
    }

    /**
     * Set the description of the purchase.
     *
     * @param string $newValue The new description value.
     *
     * @return bool True if the description was set successfully, false otherwise.
     */
    public function setPurchaseDescription($newValue): bool
    {
        if (gettype($newValue) == "string") {
            $this->purchaseDescription = $newValue;
            return true;
        } else {
            return false;
        }
    }

    /**
     * Set the properties of the purchase.
     *
     * @param int|string $id               The new ID value.
     * @param string     $email            The new email value.
     * @param string     $name             The new name value.
     * @param string     $surname          The new surname value.
     * @param string     $address          The new address value.
     * @param string     $country          The new country value.
     * @param string     $city             The new city value.
     * @param string     $postCode         The new postal code value.
     * @param string     $phoneNumber      The new phone number value.
     * @param string     $purchaseDescription The new purchase description value.
     */
    public function setPurchase($id, $email, $name, $surname, $address, $country, $city, $postCode, $phoneNumber, $purchaseDescription)
    {
        $this->setId($id);
        $this->setEmail($email);
        $this->setName($name);
        $this->setSurname($surname);
        $this->setAddress($address);
        $this->setCountry($country);
        $this->setCity($city);
        $this->setPostCode($postCode);
        $this->setPhoneNumber($phoneNumber);
        $this->setPurchaseDescription($purchaseDescription);
    }
}
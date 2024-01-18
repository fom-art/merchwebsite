<?php

namespace model\models;

/**
 * Class User
 * Represents a user in the system.
 */
class User
{
    /**
     * @var int The ID of the user.
     */
    private $id;

    /**
     * @var string The email of the user.
     */
    private $email;

    /**
     * @var string The password of the user.
     */
    private $password;

    /**
     * @var string The name of the user.
     */
    private $name;

    /**
     * @var string The surname of the user.
     */
    private $surname;

    /**
     * @var string The address of the user.
     */
    private $address;

    /**
     * @var string The country of the user.
     */
    private $country;

    /**
     * @var string The city of the user.
     */
    private $city;

    /**
     * @var string The postal code of the user.
     */
    private $postCode;

    /**
     * @var string The phone number of the user.
     */
    private $phoneNumber;

    /**
     * @var bool The flag indicating if the user is an admin.
     */
    private $isAdmin;

    /**
     * Constructor to initialize the User object.
     *
     * @param int|null    $id
     * @param string|null $email
     * @param string|null $password
     * @param string|null $name
     * @param string|null $surname
     * @param string|null $address
     * @param string|null $country
     * @param string|null $city
     * @param string|null $postCode
     * @param string|null $phoneNumber
     */
    public function __construct($id = null, $email = null, $password = null, $name = null, $surname = null, $address = null, $country = null, $city = null, $postCode = null, $phoneNumber = null)
    {
        $this->setId($id);
        $this->setEmail($email);
        $this->setPassword($password);
        $this->setName($name);
        $this->setSurname($surname);
        $this->setAddress($address);
        $this->setCountry($country);
        $this->setCity($city);
        $this->setPostCode($postCode);
        $this->setPhoneNumber($phoneNumber);
        $this->setIsAdmin(false);
    }

    /**
     * Get the admin status of the user.
     *
     * @return bool True if the user is an admin, false otherwise.
     */
    public function getIsAdmin()
    {
        return $this->isAdmin;
    }

    /**
     * Set the admin status of the user.
     *
     * @param bool $isAdmin True if the user is an admin, false otherwise.
     */
    public function setIsAdmin($isAdmin): void
    {
        $this->isAdmin = $isAdmin;
    }

    /**
     * Get the ID of the user.
     *
     * @return int The ID of the user.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the email of the user.
     *
     * @return string The email of the user.
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the password of the user.
     *
     * @return string The password of the user.
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Get the name of the user.
     *
     * @return string The name of the user.
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the surname of the user.
     *
     * @return string The surname of the user.
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Get the address of the user.
     *
     * @return string The address of the user.
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Get the city of the user.
     *
     * @return string The city of the user.
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Get the country of the user.
     *
     * @return string The country of the user.
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Get the phone number of the user.
     *
     * @return string The phone number of the user.
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Get the postal code of the user.
     *
     * @return string The postal code of the user.
     */
    public function getPostCode()
    {
        return $this->postCode;
    }

    /**
     * Set the ID of the user.
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
     * Set the email of the user.
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
     * Set the password of the user.
     *
     * @param string $newValue The new password value.
     *
     * @return bool True if the password was set successfully, false otherwise.
     */
    public function setPassword($newValue): bool
    {
        if (gettype($newValue) == "string") {
            $this->password = $newValue;
            return true;
        } else {
            return false;
        }
    }

    /**
     * Set the name of the user.
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
     * Set the surname of the user.
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
     * Set the address of the user.
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
     * Set the country of the user.
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
     * Set the city of the user.
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
     * Set the postal code of the user.
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
     * Set the phone number of the user.
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
     * Set the properties of the user.
     *
     * @param int|string $id        The new ID value.
     * @param string     $email     The new email value.
     * @param string     $password  The new password value.
     * @param string     $name      The new name value.
     * @param string     $surname   The new surname value.
     * @param string     $address   The new address value.
     * @param string     $country   The new country value.
     * @param string     $city      The new city value.
     * @param string     $postCode  The new postal code value.
     * @param string     $phoneNumber The new phone number value.
     * @param bool       $isAdmin   The new admin status value.
     */
    public function setUser($id, $email, $password, $name, $surname, $address, $country, $city, $postCode, $phoneNumber, $isAdmin)
    {
        $this->setId($id);
        $this->setEmail($email);
        $this->setPassword($password);
        $this->setName($name);
        $this->setSurname($surname);
        $this->setAddress($address);
        $this->setCountry($country);
        $this->setCity($city);
        $this->setPostCode($postCode);
        $this->setPhoneNumber($phoneNumber);
        $this->setIsAdmin($isAdmin);
    }
}
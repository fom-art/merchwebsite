<?php

class User
{
    private $id;
    private $email;
    private $password;
    private $name;
    private $surname;
    private $address;
    private $country;
    private $city;
    private $postCode;
    private $phoneNumber;

    public function getId()
    {
        return $this->id;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getPostCode()
    {
        return $this->postCode;
    }

    public function getPhoneNumber()
    {
        return $this->phoneNumber;
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

    public function setEmail($newValue): bool
    {
        if (is_string($newValue)) {
            $this->email = $newValue;
            return true;
        } else {
            return false;
        }
    }

    public function setPassword($newValue): bool
    {
        if (is_string($newValue)) {
            $this->password = $newValue;
            return true;
        } else {
            return false;
        }
    }

    public function setName($newValue): bool
    {
        if (is_string($newValue)) {
            $this->name = $newValue;
            return true;
        } else {
            return false;
        }
    }

    public function setSurname($newValue): bool
    {
        if (is_string($newValue)) {
            $this->surname = $newValue;
            return true;
        } else {
            return false;
        }
    }

    public function setAddress($newValue): bool
    {
        if (is_string($newValue)) {
            $this->address = $newValue;
            return true;
        } else {
            return false;
        }
    }

    public function setCountry($newValue): bool
    {
        if (is_string($newValue)) {
            $this->country = $newValue;
            return true;
        } else {
            return false;
        }
    }

    public function setCity($newValue): bool
    {
        if (is_string($newValue)) {
            $this->city = $newValue;
            return true;
        } else {
            return false;
        }
    }

    public function setPostCode($newValue): bool
    {
        if (is_string($newValue)) {
            $this->postCode = $newValue;
            return true;
        } else {
            return false;
        }
    }

    public function setPhoneNumber($newValue): bool
    {
        if (is_string($newValue)) {
            $this->phoneNumber = $newValue;
            return true;
        } else {
            return false;
        }
    }

    public function setUser($id, $email, $password, $name, $surname, $address, $country, $city, $postCode, $phoneNumber)
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
    }
}

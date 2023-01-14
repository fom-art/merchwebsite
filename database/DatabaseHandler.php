<?php

class DatabaseHandler
{
    private mysqli $database;
    private string $userDatabaseName;
    private string $productDatabaseName;
    private string $purchaseDatabaseName;


    function __construct()
    {
        require_once(realpath(dirname(__FILE__) . '/../phpClassesConstants/Constants.php'));
        require_once("rows-instances/User.php");
        require_once("rows-instances/Product.php");
        require_once("rows-instances/Purchase.php");
        $this->setOriginalDatabase();
        $this->setDatabaseNames();
    }

    private function setOriginalDatabase(): void
    {
        $this->database = mysqli_connect(Constants::DATABASE_HOST_NAME, Constants::DATABASE_USERNAME, Constants::DATABASE_PASSWORD, Constants::DATABASE_USERNAME);
    }

    private function setDatabaseNames(): void
    {
        $this->userDatabaseName = Constants::USER_DATABASE_NAME;
        $this->productDatabaseName = Constants::PRODUCT_DATABASE_NAME;
        $this->purchaseDatabaseName = Constants::PURCHASE_DATABASE_NAME;

    }

    function getOriginalDatabase(): mysqli
    {
        return $this->database;
    }

    function checkUserForLogIn($email, $password): bool
    {
        $user = $this->getUserByEmail($email);
        if ($user->getId() == null) {
            return false;
        } else {
            if ($user->getPassword() == $password) {
                return true;
            } else {
                return false;
            }
        }
    }

    function checkIfUserWithEmailExists($email): bool {
        $user = $this->getUserByEmail($email);
        if ($user->getId() == null) {
            return false;
        } else {
            return true;
        }
    }

    function getUserByEmail($email): User
    {
        $sqlRequestToGetUser = "SELECT * FROM $this->userDatabaseName WHERE `email` = '$email'";
        $queryResult = $this->database->query($sqlRequestToGetUser);
        if ($queryResult->num_rows > 0) {
            while ($row = $queryResult->fetch_assoc()) {
                if ($row["email"] = $email) {
                    $user = new User();
                    $user->setId($row["id"]);
                    $user->setEmail($row["email"]);
                    $user->setPassword($row["password"]);
                    $user->setName($row["name"]);
                    $user->setSurname($row["surname"]);
                    $user->setAddress($row["address"]);
                    $user->setCountry($row["country"]);
                    $user->setCity($row["city"]);
                    $user->setPostCode($row["postCode"]);
                    $user->setPhoneNumber($row["phoneNumber"]);
                    return $user;
                }
            }
        }
        return new User;
    }

    function getProductById($id): Product
    {
        $sqlRequestToGetProduct = "SELECT * FROM " . $this->productDatabaseName . " WHERE id = " . $id;
        $queryResult = $this->database->query($sqlRequestToGetProduct);
        if ($queryResult->num_rows > 0) {
            while ($row = $queryResult->fetch_assoc()) {
                if ($row["id"] = $id) {
                    $product = new Product();
                    $product->setId($row["id"]);
                    $product->setProductName($row["productName"]);
                    $product->setProductPrice($row["productPrice"]);
                    $product->setPhotoPath($row["productPhotoPath"]);
                    return $product;
                }
            }
        }
        return new Product();
    }

    function getPurchaseById($id): Purchase
    {
        $sqlRequestToGetPurchase = "SELECT * FROM " . $this->purchaseDatabaseName . " WHERE id = " . $id;
        $queryResult = $this->database->query($sqlRequestToGetPurchase);
        if ($queryResult->num_rows > 0) {
            while ($row = $queryResult->fetch_assoc()) {
                if ($row["id"] = $id) {
                    $purchase = new Purchase();
                    $purchase->setId($row["id"]);
                    $purchase->setEmail($row["email"]);
                    $purchase->setName($row["name"]);
                    $purchase->setSurname($row["surname"]);
                    $purchase->setAddress($row["address"]);
                    $purchase->setCountry($row["country"]);
                    $purchase->setCity($row["city"]);
                    $purchase->setPostCode($row["postCode"]);
                    $purchase->setPhoneNumber($row["phoneNumber"]);
                    $purchase->setPurchaseDescription($row["purchaseDescription"]);
                    return $purchase;
                }
            }
        }
        return new Purchase();
    }

    function createUser($email, $password, $name, $surname, $address, $country, $city, $postCode, $phoneNumber)
    {
        $sqlQuery = "INSERT INTO `$this->userDatabaseName` (`email`, `password`, `name`, `surname`, `address`, `country`, `city`, `postCode`, `phoneNumber`)
        VALUES ('$email', '$password', '$name', '$surname', '$address', '$country', '$city', '$postCode', '$phoneNumber')";
        $this->database->query($sqlQuery);
    }

    function createProduct($productName, $productPrice, $productPhotoPath, $productType, $productDescription)
    {
        $sqlQuery = "INSERT INTO `$this->productDatabaseName` (`productName`, `productPrice`, `productPhotoPath`, `productType`, `productDescription`)
        VALUES ('$productName', '$productPrice', '$productPhotoPath', '$productType', '$productDescription')";
        return $this->database->query($sqlQuery);
    }

    function createPurchase($email, $name, $surname, $address, $country, $city, $postCode, $phoneNumber, $purchaseDescription)
    {
        $sqlQuery = "INSERT INTO `$this->purchaseDatabaseName` (`email`, `name`, `surname`, `address`, `country`, `city`, `postCode`, `phoneNumber`, `purchaseDescription`)
        VALUES ('$email', '$name', '$surname', '$address', '$country', '$city', '$postCode', '$phoneNumber', '$purchaseDescription')";
        return $this->database->query($sqlQuery);
    }

    function changeUserDatabaseData($user)
    {
        $id = $user->getId();
        $email = $user->getEmail();
        $password = $user->getPassword();
        $name = $user->getName();
        $surname = $user->getSurname();
        $address = $user->getAddress();
        $country = $user->getCountry();
        $city = $user->getCity();
        $postCode = $user->getPostCode();
        $phoneNumber = $user->getPhoneNumber();
        $sqlQuery = "UPDATE `userDatabase` SET
            `id` = '$id',
            `email` = '$email',
            `password` = '$password',
            `name` = '$name',
            `surname` = '$surname',
            `address` = '$address',
            `country` = '$country',
            `city` = '$city',
            `postCode` = '$postCode',
            `phoneNumber` = '$phoneNumber'
            WHERE `id` = '$id'";
        $this->database->query($sqlQuery);
    }

    function changeProductDatabaseData($product)
    {
        $id = $product->getId();
        $productName = $product->getProductName();
        $productPrice = $product->getProductPrice();
        $productPhotoPath = $product->getProductPhotoPath();
        $productType = $product->getProductType();
        $productDescription = $product->getProductDescription();
        $sqlQuery = $sqlQuery = "UPDATE `userDatabase` SET
            `id` = '$id',
            `productName` = '$productName',
            `productPrice` = '$productPrice',
            `productPhotoPath` = '$productPhotoPath',
            `productType` = '$productType',
            `productDescription` = '$productDescription'
            WHERE `id` = '$id'";
        $this->database->query($sqlQuery);
    }

    function changePurchaseData($purchase)
    {
        $id = $purchase->getId();
        $email = $purchase->getEmail();
        $name = $purchase->getName();
        $surname = $purchase->getSurname();
        $address = $purchase->getAddress();
        $country = $purchase->getCountry();
        $city = $purchase->getCity();
        $postCode = $purchase->getPostCode();
        $phoneNumber = $purchase->getPhoneNumber();
        $purchaseDescription = $purchase->getPurchaseDescription();
        $sqlQuery = "UPDATE `userDatabase` SET
            `id` = '$id',
            `email` = '$email',
            `name` = '$name',
            `surname` = '$surname',
            `address` = '$address',
            `country` = '$country',
            `city` = '$city',
            `postCode` = '$postCode',
            `phoneNumber` = '$phoneNumber',
            `purchaseDescription` = '$purchaseDescription'
            WHERE `id` = '$id'";
        $this->database->query($sqlQuery);
    }
}
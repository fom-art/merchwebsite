<?php

namespace model\database;

use model\constants\DatabaseConstants;
use model\models\Product;
use model\models\Purchase;
use model\models\User;
require_once __DIR__ . "/../constants/DatabaseConstants.php";
require_once __DIR__ . "/../models/User.php";
require_once __DIR__ . "/../models/Purchase.php";
require_once __DIR__ . "/../models/Product.php";

class DatabaseHandler{
    private \mysqli $database;
    private string $userDatabaseName;
    private string $productDatabaseName;
    private string $purchaseDatabaseName;


    function __construct()
    {

        $this->setOriginalDatabase();
        $this->setDatabaseNames();
    }

    private function setOriginalDatabase(): void
{
    $this->database = mysqli_connect(DatabaseConstants::DATABASE_HOST_NAME, DatabaseConstants::DATABASE_USERNAME, DatabaseConstants::DATABASE_PASSWORD, DatabaseConstants::DATABASE_USERNAME);
}

    private function setDatabaseNames(): void
{
    $this->userDatabaseName = DatabaseConstants::USER_DATABASE_NAME;
    $this->productDatabaseName = DatabaseConstants::PRODUCT_DATABASE_NAME;
    $this->purchaseDatabaseName = DatabaseConstants::PURCHASE_DATABASE_NAME;

}

    function getOriginalDatabase(): \mysqli
    {
        return $this->database;
    }

    function checkUserForLogIn($email, $password): bool
    {
        $user = $this->getUserByEmail($email);
        if ($user->getId() == null) {
            return false;
        } else {
            return password_verify($password, $user->getPassword());
        }
    }

    function checkIfUserWithEmailExists($email): bool
    {
        $user = $this->getUserByEmail($email);
        if (!($user instanceof User)) {
            return false;
        } else {
            return true;
        }
    }

    function getUserByEmail($email): User | bool
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
                    $user->setIsAdmin($row["isAdmin"]);
                    return $user;
                }
            }
        }
        return false;
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

    function createUser($email, $password, $name, $surname, $address, $country, $city, $postCode, $phoneNumber, $isAdmin): bool|\mysqli_result
    {
        $hashedPassword = $this->hashThePassword($password);
        $sqlQuery = "INSERT INTO `$this->userDatabaseName` (`email`, `password`, `name`, `surname`, `address`, `country`, `city`, `postCode`, `phoneNumber`, 
                    `isAdmin`)
        VALUES ('$email', '$hashedPassword', '$name', '$surname', '$address', '$country', '$city', '$postCode', '$phoneNumber', '$isAdmin')";
        return $this->database->query($sqlQuery);
    }

    function createProduct($productName, $productPrice, $productType, $productDescription, $productPhoto): bool
    {
        $productPhotoPath = $productPhoto;



        $sqlQuery = "INSERT INTO `$this->productDatabaseName` (`productName`, `productPrice`, `productType`, `productDescription`, `productPhotoPath`)
        VALUES ('$productName', '$productPrice', '$productType', '$productDescription',  '$productPhotoPath')";

        return $this->database->query($sqlQuery);
    }

    function createPurchase($email, $name, $surname, $address, $country, $city, $postCode, $phoneNumber, $purchaseDescription): bool
    {
        $sqlQuery = "INSERT INTO `$this->purchaseDatabaseName` (`email`, `name`, `surname`, `address`, `country`, `city`, `postCode`, `phoneNumber`, `purchaseDescription`)
        VALUES ('$email', '$name', '$surname', '$address', '$country', '$city', '$postCode', '$phoneNumber', '$purchaseDescription')";
        return $this->database->query($sqlQuery);
    }

    function changeUserDatabaseData($user): bool
    {
        $id = $user->getId();
        $email = $user->getEmail();
        $name = $user->getName();
        $surname = $user->getSurname();
        $address = $user->getAddress();
        $country = $user->getCountry();
        $city = $user->getCity();
        $postCode = $user->getPostCode();
        $phoneNumber = $user->getPhoneNumber();
        $sqlQuery = "UPDATE `users` SET
            `id` = '$id',
            `email` = '$email',
            `name` = '$name',
            `surname` = '$surname',
            `address` = '$address',
            `country` = '$country',
            `city` = '$city',
            `postCode` = '$postCode',
            `phoneNumber` = '$phoneNumber'
            WHERE `id` = '$id'";
        return $this->database->query($sqlQuery);
    }

    function changeProductDatabaseData($product): void
    {
        $id = $product->getId();
        $productName = $product->getProductName();
        $productPrice = $product->getProductPrice();
        $productPhotoPath = $product->getProductPhotoPath();
        $productType = $product->getProductType();
        $productDescription = $product->getProductDescription();
        $sqlQuery = $sqlQuery = "UPDATE `users` SET
            `id` = '$id',
            `productName` = '$productName',
            `productPrice` = '$productPrice',
            `productPhotoPath` = '$productPhotoPath',
            `productType` = '$productType',
            `productDescription` = '$productDescription'
            WHERE `id` = '$id'";
        $this->database->query($sqlQuery);
    }

    function changePurchaseData($purchase): void
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

    private function hashThePassword($passwordToHash): string
{
    return password_hash($passwordToHash, PASSWORD_BCRYPT);
}

    public function productPhotoExists($photoPath): bool
    {
        $sqlRequestToGetProduct = "SELECT COUNT(*) FROM " . $this->productDatabaseName . " WHERE productPhotoPath = ?";
        $stmt = $this->database->prepare($sqlRequestToGetProduct);
        if ($stmt) {
            $stmt->bind_param("s", $photoPath);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_row();
            $stmt->close();
            return $row[0] > 0; // If count is greater than 0, the photo exists
        } else {
            // Handle error, possibly log it and/or notify someone
            error_log('Prepare failed: ' . $this->database->error);
            return false;
        }
    }

}
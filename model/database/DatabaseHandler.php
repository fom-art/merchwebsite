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

/**
 * The DatabaseHandler class is responsible for handling database operations.
 */
class DatabaseHandler
{
    /**
     * @var \mysqli The MySQL database connection object.
     */
    private \mysqli $database;

    /**
     * @var string The name of the user database.
     */
    private string $userDatabaseName;

    /**
     * @var string The name of the product database.
     */
    private string $productDatabaseName;

    /**
     * @var string The name of the purchase database.
     */
    private string $purchaseDatabaseName;

    /**
     * DatabaseHandler constructor.
     * Initializes a new instance of the DatabaseHandler class.
     */
    public function __construct()
    {
        $this->connectToDatabase();
        $this->setDatabaseNames();
    }

    /**
     * Establishes a connection to the MySQL database.
     */
    private function connectToDatabase(): void
    {
        $this->database = mysqli_connect(
            DatabaseConstants::DATABASE_HOST_NAME,
            DatabaseConstants::DATABASE_USERNAME,
            DatabaseConstants::DATABASE_PASSWORD,
            DatabaseConstants::DATABASE_USERNAME
        );
    }

    /**
     * Sets the names of user, product, and purchase databases from constants.
     */
    private function setDatabaseNames(): void
    {
        $this->userDatabaseName = DatabaseConstants::USER_DATABASE_NAME;
        $this->productDatabaseName = DatabaseConstants::PRODUCT_DATABASE_NAME;
        $this->purchaseDatabaseName = DatabaseConstants::PURCHASE_DATABASE_NAME;
    }

    /**
     * Gets the original database connection object.
     *
     * @return \mysqli The original database connection object.
     */
    function getOriginalDatabase(): \mysqli
    {
        return $this->database;
    }

    /**
     * Checks if a user with the given email and password exists in the database.
     *
     * @param string $email The email of the user.
     * @param string $password The hashed password of the user.
     *
     * @return bool True if the user exists and the password is correct; otherwise, false.
     */
    public function checkUserForLogIn($email, $password): bool
    {
        $user = $this->getUserByEmail($email);
        return $user && password_verify($password, $user->getPassword());
    }

    /**
     * Checks if a user with the given email exists in the database.
     *
     * @param string $email The email to check.
     *
     * @return bool True if a user with the email exists; otherwise, false.
     */
    public function checkIfUserWithEmailExists($email): bool
    {
        $user = $this->getUserByEmail($email);
        return $user instanceof User;
    }

    /**
     * Retrieves a user from the database by email.
     *
     * @param string $email The email of the user to retrieve.
     *
     * @return User|bool The retrieved User object if found; otherwise, false.
     */
    public function getUserByEmail($email): User|bool
    {
        $sqlRequestToGetUser = "SELECT * FROM $this->userDatabaseName WHERE `email` = ?";
        $stmt = $this->database->prepare($sqlRequestToGetUser);

        if ($stmt) {
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
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

        return false;
    }

    /**
     * Retrieves a purchase from the database by its ID.
     *
     * @param int $id The ID of the purchase to retrieve.
     *
     * @return Purchase The retrieved Purchase object.
     */
    public function getPurchaseById($id): Purchase
    {
        $sqlRequestToGetPurchase = "SELECT * FROM $this->purchaseDatabaseName WHERE id = ?";
        $stmt = $this->database->prepare($sqlRequestToGetPurchase);

        if ($stmt) {
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
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

        return new Purchase();
    }

    /**
     * Retrieves a product from the database by its ID.
     *
     * @param int $id The ID of the product to retrieve.
     *
     * @return Product The retrieved Product object.
     */
    public function getProductById($id): Product
    {
        $sqlRequestToGetProduct = "SELECT * FROM $this->productDatabaseName WHERE id = ?";
        $stmt = $this->database->prepare($sqlRequestToGetProduct);

        if ($stmt) {
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $product = new Product();
                $product->setId($row["id"]);
                $product->setProductName($row["productName"]);
                $product->setProductPrice($row["productPrice"]);
                $product->setPhotoPath($row["productPhotoPath"]);
                return $product;
            }
        }

        return new Product();
    }

    /**
     * Creates a new user record in the database.
     *
     * @param string $email The email of the user.
     * @param string $password The hashed password of the user.
     * @param string $name The name of the user.
     * @param string $surname The surname of the user.
     * @param string $address The address of the user.
     * @param string $country The country of the user.
     * @param string $city The city of the user.
     * @param string $postCode The postal code of the user.
     * @param string $phoneNumber The phone number of the user.
     * @param bool $isAdmin Whether the user is an admin.
     *
     * @return bool|\mysqli_result True if the user was created successfully; otherwise, false.
     */
    public function createUser($email, $password, $name, $surname, $address, $country, $city, $postCode, $phoneNumber, $isAdmin): bool|\mysqli_result
    {
        $hashedPassword = $this->hashThePassword($password);
        $sqlQuery = "INSERT INTO `$this->userDatabaseName` (`email`, `password`, `name`, `surname`, `address`, `country`, `city`, `postCode`, `phoneNumber`, `isAdmin`)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->database->prepare($sqlQuery);

        if ($stmt) {
            $stmt->bind_param("ssssssssss", $email, $hashedPassword, $name, $surname, $address, $country, $city, $postCode, $phoneNumber, $isAdmin);
            return $stmt->execute();
        }

        return false;
    }

    /**
     * Creates a new product record in the database.
     *
     * @param string $productName The name of the product.
     * @param string $productPrice The price of the product.
     * @param string $productType The type of the product.
     * @param string $productDescription The description of the product.
     * @param string $productPhoto The path to the product photo.
     *
     * @return bool True if the product was created successfully; otherwise, false.
     */
    public function createProduct($productName, $productPrice, $productType, $productDescription, $productPhoto): bool
    {
        $productPhotoPath = $productPhoto;
        $sqlQuery = "INSERT INTO `$this->productDatabaseName` (`productName`, `productPrice`, `productType`, `productDescription`, `productPhotoPath`)
        VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->database->prepare($sqlQuery);

        if ($stmt) {
            $stmt->bind_param("sssss", $productName, $productPrice, $productType, $productDescription, $productPhotoPath);
            return $stmt->execute();
        }

        return false;
    }

    /**
     * Creates a new purchase record in the database.
     *
     * @param string $email The email of the user making the purchase.
     * @param string $name The name of the purchaser.
     * @param string $surname The surname of the purchaser.
     * @param string $address The address of the purchaser.
     * @param string $country The country of the purchaser.
     * @param string $city The city of the purchaser.
     * @param string $postCode The postal code of the purchaser.
     * @param string $phoneNumber The phone number of the purchaser.
     * @param string $purchaseDescription The description of the purchase.
     *
     * @return bool True if the purchase was created successfully; otherwise, false.
     */
    public function createPurchase($email, $name, $surname, $address, $country, $city, $postCode, $phoneNumber, $purchaseDescription): bool
    {
        $sqlQuery = "INSERT INTO `$this->purchaseDatabaseName` (`email`, `name`, `surname`, `address`, `country`, `city`, `postCode`, `phoneNumber`, `purchaseDescription`)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->database->prepare($sqlQuery);

        if ($stmt) {
            $stmt->bind_param("sssssssss", $email, $name, $surname, $address, $country, $city, $postCode, $phoneNumber, $purchaseDescription);
            return $stmt->execute();
        }

        return false;
    }

    /**
     * Updates the database data for a user.
     *
     * @param User $user The User object with updated data.
     *
     * @return bool True if the user data was updated successfully; otherwise, false.
     */
    public function changeUserDatabaseData($user): bool
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
        $sqlQuery = "UPDATE `$this->userDatabaseName` SET
            `email` = ?,
            `name` = ?,
            `surname` = ?,
            `address` = ?,
            `country` = ?,
            `city` = ?,
            `postCode` = ?,
            `phoneNumber` = ?
            WHERE `id` = ?";
        $stmt = $this->database->prepare($sqlQuery);

        if ($stmt) {
            $stmt->bind_param("ssssssssi", $email, $name, $surname, $address, $country, $city, $postCode, $phoneNumber, $id);
            return $stmt->execute();
        }

        return false;
    }

    /**
     * Updates the database data for a product.
     *
     * @param Product $product The Product object with updated data.
     *
     * @return void
     */
    public function changeProductDatabaseData($product): void
    {
        $id = $product->getId();
        $productName = $product->getProductName();
        $productPrice = $product->getProductPrice();
        $productPhotoPath = $product->getProductPhotoPath();
        $productType = $product->getProductType();
        $productDescription = $product->getProductDescription();
        $sqlQuery = "UPDATE `$this->productDatabaseName` SET
            `productName` = ?,
            `productPrice` = ?,
            `productPhotoPath` = ?,
            `productType` = ?,
            `productDescription` = ?
            WHERE `id` = ?";
        $stmt = $this->database->prepare($sqlQuery);

        if ($stmt) {
            $stmt->bind_param("sssssi", $productName, $productPrice, $productPhotoPath, $productType, $productDescription, $id);
            $stmt->execute();
        }
    }

    /**
     * Updates the database data for a purchase.
     *
     * @param Purchase $purchase The Purchase object with updated data.
     *
     * @return void
     */
    public function changePurchaseData($purchase): void
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
        $sqlQuery = "UPDATE `$this->purchaseDatabaseName` SET
            `email` = ?,
            `name` = ?,
            `surname` = ?,
            `address` = ?,
            `country` = ?,
            `city` = ?,
            `postCode` = ?,
            `phoneNumber` = ?,
            `purchaseDescription` = ?
            WHERE `id` = ?";
        $stmt = $this->database->prepare($sqlQuery);

        if ($stmt) {
            $stmt->bind_param("sssssssssi", $email, $name, $surname, $address, $country, $city, $postCode, $phoneNumber, $purchaseDescription, $id);
            $stmt->execute();
        }
    }

    /**
     * Hashes the provided password using Bcrypt.
     *
     * @param string $passwordToHash The password to hash.
     *
     * @return string The hashed password.
     */
    private function hashThePassword($passwordToHash): string
    {
        return password_hash($passwordToHash, PASSWORD_BCRYPT);
    }

    /**
     * Checks if a product photo with the given path exists in the database.
     *
     * @param string $photoPath The path of the product photo.
     *
     * @return bool True if the product photo exists in the database; otherwise, false.
     */
    public function productPhotoExists($photoPath): bool
    {
        $sqlRequestToGetProduct = "SELECT COUNT(*) FROM $this->productDatabaseName WHERE productPhotoPath = ?";
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

    /**
     * Retrieves a list of products with pagination.
     *
     * @param int $page The current page number.
     * @param int $itemsPerPage The number of items to display per page.
     *
     * @return array An array of Product objects representing the products on the current page.
     */
    public function getProductsList($page = 1, $itemsPerPage = 10): array
    {
        $products = [];
        $offset = ($page - 1) * $itemsPerPage;

        // SQL query with ORDER BY and LIMIT for pagination
        $sqlQuery = "SELECT * FROM `$this->productDatabaseName` ORDER BY productName ASC LIMIT ? OFFSET ?";
        $stmt = $this->database->prepare($sqlQuery);

        if ($stmt) {
            $stmt->bind_param('ii', $itemsPerPage, $offset);
            $stmt->execute();
            $result = $stmt->get_result();


            while ($row = $result->fetch_assoc()) {
                $product = new Product();
                $product->setId($row["id"]);
                $product->setProductName($row["productName"]);
                $product->setProductPrice($row["productPrice"]);
                $product->setProductType($row["productType"]);
                $product->setProductDescription($row["productDescription"]);
                $product->setProductPhotoPath($row["productPhotoPath"]);
                $products[] = $product;
            }
            $stmt->close();
        }

        return $products;
    }

    /**
     * Retrieves the total number of products in the database.
     *
     * @return int The total number of products.
     */
    public function getTotalProductsCount()
    {
        $sqlQuery = "SELECT COUNT(*) as total FROM `$this->productDatabaseName`";
        $result = $this->database->query($sqlQuery);

        if ($result) {
            $row = $result->fetch_assoc();
            return (int)$row['total'];
        }

        return 0;
    }
}
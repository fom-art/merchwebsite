<?php

namespace controller;

use controller\utlis\FormValidation;
use controller\utlis\Utils;
use model\database\DatabaseHandler;
use view\AdminView;

require_once __DIR__ . '/../view/AdminView.php';
require_once __DIR__ . '/utils/Utils.php';

/**
 * Class AdminController
 *
 * This class manages administrative tasks such as adding products to the system.
 */
class AdminController
{
    /**
     * @var AdminView
     */
    private AdminView $view;

    /**
     * AdminController constructor.
     *
     * Initializes the admin controller, validates the form, and handles product addition.
     */
    public function __construct()
    {
        $isFormValid = false;
        $addProductResult = false;
        $isCsrfSuccess = false;

        if (isset($_POST['csrf-token']) && isset($_SESSION['csrf-token']) && $_POST['csrf-token'] == $_SESSION['csrf-token']) {
            $isCsrfSuccess = true;
            $isFormValid = $this->validateForm();
        }

        if ($isFormValid && isset($_POST['csrf-token']) && isset($_SESSION['csrf-token']) && $_POST['csrf-token'] == $_SESSION['csrf-token']) {
            $addProductResult = $this->addProduct();
        }

        if (!isset($_SESSION['csrf-token'])) {
            $_SESSION['csrf-token'] = bin2hex(random_bytes(32));
        }

        $this->view = new AdminView(
            productName: $_POST["product-name"] ?? "",
            productPrice: $_POST["product-price"] ?? "",
            productType: $_POST["product-type"] ?? "",
            productDescription: $_POST["product-description"] ?? "",
            productPhoto: $_FILES['photo'] ?? [],
            addProductResult: $addProductResult,
            csrfToken: $_SESSION['csrf-token'],
            isCsrfSuccess: $isCsrfSuccess
        );
    }

    /**
     * Render the admin page.
     *
     * @return void
     */
    public function index(): void
    {
        $this->view->render();
    }

    /**
     * Validate the product addition form.
     *
     * @return bool True if the form data is valid, otherwise false.
     */
    private function validateForm(): bool
    {
        if (isset($_POST['product-name'])) {
            return FormValidation::validateProductForm(
                productName: $_POST['product-name'],
                productPrice: $_POST['product-price'],
                productType: $_POST['product-type'],
                productDescription: $_POST['product-description'],
                productPhoto: $_FILES['photo']
            );
        }
        return false;
    }

    /**
     * Add a new product to the system.
     *
     * @return bool True if the product addition is successful, otherwise false.
     */
    private function addProduct(): bool
    {
        $productPath = $this->addProductPhoto();
        $dbHandler = new DatabaseHandler();
        unset($_SESSION['csrf-token']);
        if ($productPath != "") {
            return $dbHandler->createProduct(
                productName: $_POST['product-name'],
                productPrice: $_POST['product-price'],
                productType: $_POST['product-type'],
                productDescription: $_POST['product-description'],
                productPhoto: $productPath
            );
        }
        return false;
    }

    /**
     * Add a product photo to the system and return its path.
     *
     * @return string The path to the added product photo.
     */
    private function addProductPhoto(): string
    {
        $targetDir = "/home/fomenart/www/view/images/";
        $fileName = basename($_FILES['photo']['name']);
        $targetFile = $targetDir . $fileName;
        $fileExtension = pathinfo($targetFile, PATHINFO_EXTENSION);

        $dbHandler = new DatabaseHandler();

        // Check if file exists and append a unique ID if it does
        $fileBaseName = pathinfo($targetFile, PATHINFO_FILENAME);
        while (file_exists($targetFile) && $dbHandler->productPhotoExists($targetFile)) {
            $uniqueID = uniqid(); // Generate a unique ID
            $targetFile = $targetDir . $fileBaseName . '_' . $uniqueID . '.' . $fileExtension;
        }

        if (!move_uploaded_file($_FILES['photo']['tmp_name'], $targetFile)) {
            error_log("Failed to move uploaded file '{$_FILES['photo']['name']}' to '{$targetFile}'. Check permissions and upload_tmp_dir setting.");
            return "";
        }

        return str_replace("/home/fomenart/www/", "", $targetFile);
    }

    /**
     * Get the product photo extension.
     *
     * @return string The product photo extension.
     */
    private function getProductPhotoExtension(): string
    {
        $targetDir = HrefsConstants::IMAGES_STORAGE;
        $targetFile = $targetDir . basename($_FILES['photo']['name']);

        return strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    }
}

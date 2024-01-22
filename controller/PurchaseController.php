<?php

namespace controller;

use controller\utlis\FormValidation;
use model\database\DatabaseHandler;
use view\PurchaseView;

require_once __DIR__ . '/../view/PurchaseView.php';

/**
 * Class PurchaseController
 *
 * This class manages the purchase process for users.
 */
class PurchaseController
{
    /**
     * @var PurchaseView
     */
    private PurchaseView $view;

    /**
     * PurchaseController constructor.
     *
     * Initializes the purchase controller, validates the form, and handles user purchases.
     */
    public function __construct()
    {
        $isFormValid = $this->validateForm();

        $purchaseResult = false;
        $isCsrfSuccess = false;

        if (isset($_POST['csrf-token']) && isset($_SESSION['csrf-token']) && $_POST['csrf-token'] == $_SESSION['csrf-token']) {
            $isCsrfSuccess = true;
        }

        if ($isFormValid && $isCsrfSuccess) {
            $purchaseResult = $this->makePurchase();
            $_POST = array();
        }

        if (!isset($_SESSION['csrf-token'])) {
            $_SESSION['csrf-token'] = bin2hex(random_bytes(32));
        }

        $this->view = new PurchaseView(
            purchaseResult: $purchaseResult,
            isPostSet: isset($_POST),
            email: $_POST['email'] ?? $_SESSION['email'] ?? "",
            name: $_POST['name'] ?? $_SESSION['name'] ?? "",
            surname: $_POST['surname'] ?? $_SESSION['surname'] ?? "",
            address: $_POST['address'] ?? $_SESSION['address'] ?? "",
            country: $_POST['country'] ?? $_SESSION['country'] ?? "",
            city: $_POST['city'] ?? $_SESSION['city'] ?? "",
            postCode: $_POST['post-code'] ?? $_SESSION['post-code'] ?? "",
            phoneNumber: $_POST['phone-number'] ?? $_SESSION['phone-number'] ?? "",
            purchaseDescription: $_POST['purchase-description'] ?? "",
            csrfToken: $_SESSION['csrf-token'],
            isCsrfSuccess: $_SESSION['csrf-token']
        );
    }

    /**
     * Render the purchase page.
     *
     * @return void
     */
    public function index(): void
    {
        $this->view->render();
    }

    /**
     * Validate the purchase form data.
     *
     * @return bool True if the form data is valid, otherwise false.
     */
    private function validateForm(): bool
    {
        if (isset($_POST['email'])) {
            return FormValidation::validatePurchaseForm(
                email: $_POST['email'],
                name: $_POST['name'],
                surname: $_POST['surname'],
                address: $_POST['address'],
                country: $_POST['country'],
                city: $_POST['city'],
                postCode: $_POST['post-code'],
                phoneNumber: $_POST['phone-number'],
                purchaseDescription: $_POST['purchase-description']
            );
        }
        return false;
    }

    /**
     * Make a user purchase and update session variables.
     *
     * @return bool True if the purchase is successful, otherwise false.
     */
    private function makePurchase(): bool
    {
        $dbHandler = new DatabaseHandler();
        unset($_SESSION['csrf-token']);
        return $dbHandler->createPurchase(
            email: $_POST['email'],
            name: $_POST['name'],
            surname: $_POST['surname'],
            address: $_POST['address'],
            country: $_POST['country'],
            city: $_POST['city'],
            postCode: $_POST['post-code'],
            phoneNumber: $_POST['phone-number'],
            purchaseDescription: $_POST['purchase-description']
        );
    }
}

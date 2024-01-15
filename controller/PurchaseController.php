<?php

namespace controller;

use controller\utlis\FormValidation;
use model\database\DatabaseHandler;
use view\PurchaseView;

require_once __DIR__ . '/../view/PurchaseView.php';

class PurchaseController
{
    private PurchaseView $view;

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
        }

        if (!isset($_SESSION['csrf-token'])) {
            $_SESSION['csrf-token'] = bin2hex(random_bytes(32));
        }

        $this->view = new PurchaseView(
            purchaseResult: $purchaseResult,
            isPostSet: isset($_POST),
            email: $_SESSION['email'] ?? "",
            name: $_SESSION['name'] ?? "",
            surname: $_SESSION['surname'] ?? "",
            address: $_SESSION['address'] ?? "",
            country: $_SESSION['country'] ?? "",
            city: $_SESSION['city'] ?? "",
            postCode: $_SESSION['post-code'] ?? "",
            phoneNumber: $_SESSION['phone-number'] ?? "",
            purchaseDescription: "",
            csrfToken: $_SESSION['csrf-token'],
            isCsrfSuccess: $_SESSION['csrf-token']
        );
    }

    public function index(): void
    {
        $this->view->render();
    }

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

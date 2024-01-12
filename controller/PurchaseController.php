<?php

namespace controller;

use controller\utlis\FormValidation;
use model\database\DatabaseHandler;
use view\PurchaseView;

require_once __DIR__ . '/../view/PurchaseView.php';

class PurchaseController
{
    private PurchaseView $view;
    private $isAlreadyRegisetered;

    public function __construct($isRegistered, $isAdmin)
    {
        $this->view = new PurchaseView(isPostSet: isset($_POST),
            email: $_POST['email'] ?? "",
            name: $_POST['name'] ?? "",
            surname: $_POST['surname'] ?? "",
            address: $_POST['address'] ?? "",
            country: $_POST['country'] ?? "",
            city: $_POST['city'] ?? "",
            postCode: $_POST['post-code'] ?? "",
            phoneNumber: $_POST['phone-number'] ?? "",
            purchaseDescription: $_POST['purchase-description'] ?? "");
    }

    public function index(): void
    {
        $this->view->render();
    }


}

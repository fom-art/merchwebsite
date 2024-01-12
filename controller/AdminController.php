<?php

namespace controller;

use controller\utlis\Utils;
use view\AdminView;

require_once __DIR__ . '/../view/AdminView.php';
require_once __DIR__ . '/utils/Utils.php';

class AdminController
{
    private AdminView $view;


    public function __construct()
    {
        $this->view = new AdminView(
            productName: $_POST["product-name"] ?? "",
            productPrice: $_POST["product-price"] ?? "",
            productType: $_POST["product-type"] ?? "",
            productDescription: $_POST["product-description"] ?? "",
            productPhoto: $_FILES["product-photo"]["name"] ?? ""
        );
    }

    public function index(): void
    {
        $this->view->render();
    }
}

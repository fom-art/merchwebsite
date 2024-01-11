<?php

namespace controller;

use view\PurchaseView;

require_once __DIR__ . '/../view/PurchaseView.php';

class PurchaseController
{
    private PurchaseView $view;

    public function __construct($isRegistered, $isAdmin)
    {
        $this->view = new PurchaseView($isRegistered ?: false, $isAdmin ?: false);
    }

    public function index(): void
    {
        $this->view->render();
    }
}

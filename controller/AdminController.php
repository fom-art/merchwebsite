<?php

namespace controller;

use view\AdminView;

require_once __DIR__ . '/../view/AdminView.php';

class AdminController
{
    private AdminView $view;

    public function __construct($isRegistered, $isAdmin)
    {
        $this->view = new AdminView($isRegistered ?: false, $isAdmin ?: false);
    }

    public function index(): void
    {
        $this->view->render();
    }
}

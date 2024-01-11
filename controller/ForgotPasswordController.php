<?php

namespace controller;

use view\ForgotPasswordView;

require_once __DIR__ . '/../view/ForgotPasswordView.php';

class ForgotPasswordController
{
    private ForgotPasswordView $view;

    public function __construct($isRegistered, $isAdmin)
    {
        $this->view = new ForgotPasswordView($isRegistered ?: false, $isAdmin ?: false);
    }

    public function index(): void
    {
        $this->view->render();
    }
}

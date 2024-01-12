<?php

namespace controller;

use controller\utlis\FormValidation;
use view\ForgotPasswordView;

require_once __DIR__ . '/../view/ForgotPasswordView.php';

class ForgotPasswordController
{
    private ForgotPasswordView $view;

    public function __construct()
    {
        $this->view = new ForgotPasswordView(
            isFormValid: FormValidation::isEmailValid($_POST["email"] ?? ""),
            email: $_POST["email"] ?? ""
        );
    }

    public function index(): void
    {
        $this->view->render();
    }
}

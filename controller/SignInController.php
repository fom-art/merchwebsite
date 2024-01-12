<?php

namespace controller;

use view\SignInView;

require_once __DIR__ . '/../view/SignInView.php';

class SignInController
{
    private SignInView $view;

    public function __construct()
    {
        $this->view = new SignInView(
            email: $_POST['email'] ?? "",
            password: $_POST['password'] ?? ""
        );
    }

    public function index(): void
    {
        $this->view->render();
    }
}

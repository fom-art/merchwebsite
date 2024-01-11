<?php

namespace controller;

use view\SignUpView;

require_once __DIR__ . '/../view/SignUpView.php';

class SignUpController
{
    private SignUpView $view;

    public function __construct($isRegistered, $isAdmin)
    {
        $this->view = new SignUpView($isRegistered ?: false, $isAdmin ?: false);
    }

    public function index(): void
    {
        $this->view->render();
    }
}

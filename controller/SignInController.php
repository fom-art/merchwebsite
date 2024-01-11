<?php

namespace controller;

use view\SignInView;

require_once __DIR__ . '/../view/SignInView.php';

class SignInController
{
    private SignInView $view;

    public function __construct($isRegistered, $isAdmin)
    {
        $this->view = new SignInView($isRegistered ?: false, $isAdmin ?: false);
    }

    public function index(): void
    {
        $this->view->render();
    }
}

<?php

namespace controller;

use view\UserDetailsView;

require_once __DIR__ . '/../view/UserDetailsView.php';

class UserDetailsController
{
    private UserDetailsView $view;

    public function __construct($isRegistered, $isAdmin)
    {
        $this->view = new UserDetailsView($isRegistered ?: false, $isAdmin ?: false);
    }

    public function index(): void
    {
        $this->view->render();
    }
}

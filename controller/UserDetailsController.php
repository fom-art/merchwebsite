<?php

namespace controller;

use view\UserDetailsView;

require_once __DIR__ . '/../view/UserDetailsView.php';

class UserDetailsController
{
    private UserDetailsView $view;

    public function __construct()
    {
        $this->view = new UserDetailsView(
            email: $_POST['email'] ?? "",
            name: $_POST['name'] ?? "",
            surname: $_POST['surname'] ?? "",
            password: $_POST['password'] ?? "",
            address: $_POST['address'] ?? "",
            country: $_POST['country'] ?? "",
            city: $_POST['city'] ?? "",
            postCode: $_POST['post-code'] ?? "",
            phoneNumber: $_POST['phone-number'] ?? "",
        );
    }

    public function index(): void
    {
        $this->view->render();
    }
}

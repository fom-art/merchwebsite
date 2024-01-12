<?php

namespace controller;

use model\database\DatabaseHandler;
use view\SignUpView;

require_once __DIR__ . '/../view/SignUpView.php';

class SignUpController
{
    private SignUpView $view;

    public function __construct()
    {
        $this->view = new SignUpView(
            isPostSet: isset($_POST),
            isAlreadyRegistered: isset($_POST['email']) && $this->checkIfUserWithEmailRegistered($_POST['email']),
            email: $_POST['email'] ?? "",
            password: $_POST['password'] ?? "",
            passwordRepeat: $_POST['password-repeat'] ?? "",
            name: $_POST['name'] ?? "",
            surname: $_POST['surname'] ?? "",
            address: $_POST['address'] ?? "",
            country: $_POST['country'] ?? "",
            city: $_POST['city'] ?? "",
            postCode: $_POST['post-code'] ?? "",
            phoneNumber: $_POST['phone-number'] ?? "",);
    }

    public function index(): void
    {
        $this->view->render();
    }

    private function checkIfUserWithEmailRegistered($email): bool
    {
        $database = new DatabaseHandler;
        return $database->checkIfUserWithEmailExists($email);
    }
}

<?php

namespace controller;

use controller\utlis\FormValidation;
use model\database\DatabaseHandler;
use view\SignUpView;

require_once __DIR__ . '/../view/SignUpView.php';

class SignUpController
{
    private SignUpView $view;

    public function __construct()
    {
        $isFormValid = FormValidation::validateSignUpForm(
            email: $_POST['email'],
            name: $_POST['name'],
            surname: $_POST['surname'],
            password: $_POST['password'],
            passwordRepeat: $_POST['repeat-password'],
            address: $_POST['address'],
            country: $_POST['country'],
            city: $_POST['city'],
            postCode: $_POST['post-code'],
            phoneNumber: $_POST['phone-number']
        );
        $registrationResult = $isFormValid;
        $isRegisteredAlready = isset($_POST['email']) && $this->checkIfUserWithEmailRegistered($_POST['email']);
        if ($isFormValid && !$isRegisteredAlready) {
            $dbHandler = new DatabaseHandler();
            $registrationResult = $dbHandler->createUser(
                email: $this->view->email,
                password: $this->view->password,
                name: $this->view->name,
                surname: $this->view->surname,
                address: $this->view->address,
                country: $this->view->country,
                city: $this->view->city,
                postCode: $this->view->postCode,
                phoneNumber: $this->view->phoneNumber,
                isAdmin: false);
        }

        $this->view = new SignUpView(
            isFormValid: $isFormValid,
            isRegisteredAlready: $isRegisteredAlready,
            isRegistrationSuccess: $registrationResult,
            email: $_POST['email'] ?? "",
            password: $_POST['password'] ?? "",
            passwordRepeat: $_POST['repeat-password'] ?? "",
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

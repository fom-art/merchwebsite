<?php

namespace controller;

use controller\utlis\FormValidation;
use model\database\DatabaseHandler;
use view\SignInView;

require_once __DIR__ . '/../view/SignInView.php';

class SignInController
{
    private SignInView $view;

    public function __construct()
    {
        $isFormValid = $this->validateForm();

        $logInResult = false;

        if ($isFormValid && isset($_POST['csrf-token']) && isset($_SESSION['csrf-token']) && $_POST['csrf-token'] == $_SESSION['csrf-token']) {
            $logInResult = $this->logInUser();
        }

        if (!isset($_SESSION['csrf-token'])) {
            $_SESSION['csrf-token'] = bin2hex(random_bytes(32));
        }

        $this->view = new SignInView(
            email: $_POST['email'] ?? "",
            password: $_POST['password'] ?? "",
            logInResult: $logInResult,
            csrfToken: $_SESSION['csrf-token']
        );
    }

    public function index(): void
    {
        $this->view->render();
    }

    private function validateForm(): bool
    {
        return FormValidation::validateSignInForm(
            email: $_POST['email'] ?? "",
            password: $_POST['password'] ?? "");
    }

    private function logInUser(): bool
    {
        $dbHandler = new DatabaseHandler();
        $isSuccess = $dbHandler->checkUserForLogIn(
            email: $_POST['email'] ?? "",
            password: $_POST['password'] ?? ""
        );

        if ($isSuccess) {
            $user = $dbHandler->getUserByEmail($_POST['email']);
            $_SESSION['logged_in'] = true;
            $_SESSION['user_id'] = $user->getId();
            $_SESSION['email'] = $user->getEmail();
            $_SESSION['name'] = $user->getName();
            $_SESSION['surname'] = $user->getSurname();
            $_SESSION['address'] = $user->getAddress();
            $_SESSION['country'] = $user->getCountry();
            $_SESSION['city'] = $user->getCity();
            $_SESSION['post-code'] = $user->getPostCode();
            $_SESSION['phone-number'] = $user->getPhoneNumber();
            $_SESSION['is-admin'] = $user->getIsAdmin();
            unset($_SESSION['csrf-token']);
        }


        return $isSuccess;
    }
}

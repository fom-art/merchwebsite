<?php

namespace controller;

use controller\utlis\FormValidation;
use Exception;
use model\database\DatabaseHandler;
use view\SignUpView;

require_once __DIR__ . '/../view/SignUpView.php';

class SignUpController
{
    private SignUpView $view;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        $isFormValid = $this->validateForm();

        $registrationResult = false;
        $isRegisteredAlready = isset($_POST['email']) && $this->checkIfUserWithEmailRegistered($_POST['email']);

        if ($isFormValid && !$isRegisteredAlready
            && isset($_POST['csrf-token']) && $_POST['csrf-token'] == $_SESSION['csrf-token']) {
            $registrationResult = $this->registerUser();
        }

        if (!isset($_SESSION['csrf-token'])) {
            $_SESSION['csrf-token'] = bin2hex(random_bytes(32));
            $isRegisteredAlready = false;
        }

        if (isset($_POST['csrf-token']) && $_POST['csrf-token'] != $_SESSION['csrf-token']) {
            $isRegisteredAlready = false;
        }

        $this->setupView($isFormValid, $isRegisteredAlready, $registrationResult);
    }

    public
    function index(): void
    {
        $this->view->render();
    }

    private
    function checkIfUserWithEmailRegistered($email): bool
    {
        $database = new DatabaseHandler;
        return $database->checkIfUserWithEmailExists($email);
    }

    private function registerUser(): bool
    {
        unset($_SESSION['csrf-token']);
        $dbHandler = new DatabaseHandler();
        return $dbHandler->createUser(
            email: $_POST['email'] ?? "",
            password: $_POST['password'] ?? "",
            name: $_POST['name'] ?? "",
            surname: $_POST['surname'] ?? "",
            address: $_POST['address'] ?? "",
            country: $_POST['country'] ?? "",
            city: $_POST['city'] ?? "",
            postCode: $_POST['post-code'] ?? "",
            phoneNumber: $_POST['phone-number'] ?? "",
            isAdmin: false);
    }

    private function validateForm(): bool
    {
        if (isset($_POST['email'])) {
            return FormValidation::validateSignUpForm(
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
        }
        return false;
    }

    private function setupView($isFormValid, $isRegisteredAlready, $registrationResult) {
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
            phoneNumber: $_POST['phone-number'] ?? "",
            csrfToken: $_SESSION['csrf-token']
        );
}
}

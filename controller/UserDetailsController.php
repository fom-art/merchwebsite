<?php

namespace controller;

use controller\utlis\FormValidation;
use HrefsConstants;
use model\database\DatabaseHandler;
use model\models\User;
use view\UserDetailsView;

require_once __DIR__ . '/../view/UserDetailsView.php';

class UserDetailsController
{
    private UserDetailsView $view;

    public function __construct()
    {
        if (isset($_POST['action']) && $_POST['action'] == 'unset') {
            session_destroy();
        }

        $isFormValid = $this->validateForm();

        $userDetailsEditResult = false;
        $isCsrfSuccess = false;

        if (isset($_POST['csrf-token']) && isset($_SESSION['csrf-token']) && $_POST['csrf-token'] == $_SESSION['csrf-token']) {
            $isCsrfSuccess = true;
        }

        if ($isFormValid && isset($_POST['csrf-token']) && isset($_SESSION['csrf-token']) && $_POST['csrf-token'] == $_SESSION['csrf-token']) {
            $userDetailsEditResult = $this->editUserDetails();
        }

        if (!isset($_SESSION['csrf-token'])) {
            $_SESSION['csrf-token'] = bin2hex(random_bytes(32));
        }

        $this->view = new UserDetailsView(
            email: $_SESSION['email'] ?? "",
            name: $_SESSION['name'] ?? "",
            surname: $_SESSION['surname'] ?? "",
            password: $_SESSION['password'] ?? "",
            address: $_SESSION['address'] ?? "",
            country: $_SESSION['country'] ?? "",
            city: $_SESSION['city'] ?? "",
            postCode: $_SESSION['post-code'] ?? "",
            phoneNumber: $_SESSION['phone-number'] ?? "",
            userDetailsEditResult: $userDetailsEditResult,
            csrfToken: $_SESSION['csrf-token'],
            isCsrfSuccess: $isCsrfSuccess
        );
    }

    public function index(): void
    {
        $this->view->render();
    }

    private function validateForm(): bool
    {
        if (isset($_POST['email'])) {
            return FormValidation::validateUserDetailsForm(
                email: $_POST['email'],
                name: $_POST['name'],
                surname: $_POST['surname'],
                password: $_POST['password'],
                address: $_POST['address'],
                country: $_POST['country'],
                city: $_POST['city'],
                postCode: $_POST['post-code'],
                phoneNumber: $_POST['phone-number'],
            );
        }
        return false;
    }

    private function editUserDetails(): bool
    {
        $dbHandler = new DatabaseHandler();
        unset($_SESSION['csrf-token']);
        $isSuccess = $dbHandler->changeUserDatabaseData(
            new User(
                id: $_SESSION['user-id'],
                email: $_POST['email'],
                password: $_POST['password'],
                name: $_POST['name'],
                surname: $_POST['surname'],
                address: $_POST['address'],
                country: $_POST['country'],
                city: $_POST['city'],
                postCode: $_POST['post-code'],
                phoneNumber: $_POST['phone-number'],
            )
        );
        if ($isSuccess) {
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['password'] = $_POST['password'];
            $_SESSION['name'] = $_POST['name'];
            $_SESSION['surname'] = $_POST['surname'];
            $_SESSION['address'] = $_POST['address'];
            $_SESSION['country'] = $_POST['country'];
            $_SESSION['city'] = $_POST['city'];
            $_SESSION['post-code'] = $_POST['post-code'];
            $_SESSION['phone-number'] = $_POST['phone-number'];
        }
        return $isSuccess;
    }
}

<?php

namespace controller;

use controller\utlis\FormValidation;
use model\database\DatabaseHandler;
use view\SignInView;

require_once __DIR__ . '/../view/SignInView.php';

/**
 * Class SignInController
 *
 * This class handles the sign-in process for users.
 */
class SignInController
{
    /**
     * @var SignInView
     */
    private SignInView $view;

    /**
     * SignInController constructor.
     *
     * Initializes the sign-in controller, validates the form, and handles user login.
     */
    public function __construct()
    {
        $isFormValid = $this->validateForm();

        $logInResult = false;

        if ($isFormValid && isset($_POST['csrf-token']) && isset($_SESSION['csrf-token']) && $_POST['csrf-token'] == $_SESSION['csrf-token']) {
            $logInResult = $this->logInUser();
        }

        if (!isset($_SESSION['csrf-token'])) {
            $_SESSION['csrf-token'] = bin2hex(random_bytes(32));
            $_POST = array();
        }

        $this->view = new SignInView(
            email: $_POST['email'] ?? "",
            password: $_POST['password'] ?? "",
            logInResult: $logInResult,
            csrfToken: $_SESSION['csrf-token']
        );
    }

    /**
     * Render the sign-in page.
     *
     * @return void
     */
    public function index(): void
    {
        $this->view->render();
    }

    /**
     * Validate the sign-in form data.
     *
     * @return bool True if the form data is valid, otherwise false.
     */
    private function validateForm(): bool
    {
        return FormValidation::validateSignInForm(
            email: $_POST['email'] ?? "",
            password: $_POST['password'] ?? "");
    }

    /**
     * Log in the user and update session variables if successful.
     *
     * @return bool True if the user login is successful, otherwise false.
     */
    private function logInUser(): bool
    {
        $dbHandler = new DatabaseHandler();
        $isSuccess = $dbHandler->checkUserForLogIn(
            email: $_POST['email'] ?? "",
            password: $_POST['password'] ?? ""
        );

        if ($isSuccess) {
            $user = $dbHandler->getUserByEmail($_POST['email']);
            $_SESSION['logged-in'] = true;
            $_SESSION['user-id'] = $user->getId();
            $_SESSION['email'] = $user->getEmail();
            $_SESSION['password'] = $_POST['password'];
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

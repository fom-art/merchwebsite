<?php

namespace controller;

use controller\utlis\FormValidation;
use Exception;
use model\database\DatabaseHandler;
use view\SignUpView;

require_once __DIR__ . '/../view/SignUpView.php';

/**
 * Class SignUpController
 *
 * This class handles the sign-up process for users.
 */
class SignUpController
{
    /**
     * @var SignUpView
     */
    private SignUpView $view;

    /**
     * SignUpController constructor.
     *
     * Initializes the sign-up controller, validates the form, and registers the user if conditions are met.
     *
     * @throws Exception
     */
    public function __construct()
    {
        $isFormValid = $this->validateForm();

        $registrationResult = false;
        $isRegisteredAlready = isset($_POST['email']) && $this->checkIfUserWithEmailRegistered($_POST['email']);

        if ($isFormValid && !$isRegisteredAlready
            && isset($_POST['csrf-token']) && isset($_SESSION['csrf-token']) && $_POST['csrf-token'] == $_SESSION['csrf-token']) {
            $registrationResult = $this->registerUser();
            $_POST = array();
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

    /**
     * Render the sign-up page.
     *
     * @return void
     */
    public function index(): void
    {
        $this->view->render();
    }

    /**
     * Check if a user with a given email is already registered.
     *
     * @param string $email The email address to check.
     * @return bool True if the user with the email exists, otherwise false.
     */
    private function checkIfUserWithEmailRegistered(string $email): bool
    {
        $database = new DatabaseHandler;
        return $database->checkIfUserWithEmailExists($email);
    }

    /**
     * Register a user.
     *
     * @return bool True if the user registration is successful, otherwise false.
     */
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
            isAdmin: false
        );
    }

    /**
     * Validate the sign-up form data.
     *
     * @return bool True if the form data is valid, otherwise false.
     */
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

    /**
     * Set up the view for the sign-up page.
     *
     * @param bool $isFormValid Whether the form data is valid.
     * @param bool $isRegisteredAlready Whether the user is already registered with the provided email.
     * @param bool $registrationResult Whether the registration was successful.
     * @return void
     */
    private function setupView(bool $isFormValid, bool $isRegisteredAlready, bool $registrationResult): void
    {
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

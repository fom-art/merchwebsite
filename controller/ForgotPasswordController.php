<?php

namespace controller;

use controller\utlis\FormValidation;
use model\database\DatabaseHandler;
use view\ForgotPasswordView;

require_once __DIR__ . '/../view/ForgotPasswordView.php';

/**
 * Class ForgotPasswordController
 *
 * This class manages the process of password recovery for users.
 */
class ForgotPasswordController
{
    /**
     * @var ForgotPasswordView
     */
    private ForgotPasswordView $view;

    /**
     * ForgotPasswordController constructor.
     *
     * Initializes the password recovery controller, validates the form, and handles the recovery process.
     */
    public function __construct()
    {
        $isFormValid = false;

        if (isset($_POST['email'])) {
            $isFormValid = FormValidation::isEmailValid($_POST['email']);
        }

        $isUserWithEmailFound = false;
        $isCsrfSuccess = false;

        if (isset($_POST['csrf-token']) && isset($_SESSION['csrf-token']) && $_POST['csrf-token'] == $_SESSION['csrf-token']) {
            $isCsrfSuccess = true;
        }

        if ($isFormValid && isset($_POST['csrf-token']) && isset($_SESSION['csrf-token']) && $_POST['csrf-token'] == $_SESSION['csrf-token']) {
            $isUserWithEmailFound = $this->getIfUserWithEmailExist($_POST['email']);
            if ($isUserWithEmailFound) {
                unset($_SESSION['csrf-token']);
                unset($_POST['email']);
                $this->sendEmailToUser();
                $_POST = array();
            }
        }

        if (!isset($_SESSION['csrf-token'])) {
            $_SESSION['csrf-token'] = bin2hex(random_bytes(32));
        }

        $this->view = new ForgotPasswordView(
            isUserWithEmailFound: $isUserWithEmailFound,
            email: $_POST['email'] ?? "",
            csrfToken: $_SESSION['csrf-token'],
            isCsrfSuccess: $isCsrfSuccess
        );
    }

    /**
     * Render the password recovery page.
     *
     * @return void
     */
    public function index(): void
    {
        $this->view->render();
    }

    /**
     * Check if a user with the provided email exists in the database.
     *
     * @param string $email The email address to check.
     *
     * @return bool True if a user with the email exists, otherwise false.
     */
    private function getIfUserWithEmailExist($email): bool
    {
        $dbHandler = new DatabaseHandler();
        return $dbHandler->getUserByEmail(email: $email) != false;
    }

    /**
     * Send a recovery email to the user for password reset.
     *
     * @return void
     */
    private function sendEmailToUser()
    {
        //TODO: This functionality will be implemented in the future.
    }
}

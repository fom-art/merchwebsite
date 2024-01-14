<?php

namespace controller;

use controller\utlis\FormValidation;
use model\database\DatabaseHandler;
use view\ForgotPasswordView;

require_once __DIR__ . '/../view/ForgotPasswordView.php';

class ForgotPasswordController
{
    private ForgotPasswordView $view;

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

    public function index(): void
    {
        $this->view->render();
    }

    private function getIfUserWithEmailExist($email): bool
    {
        $dbHandler = new DatabaseHandler();
        return $dbHandler->getUserByEmail(email: $email) != false;
    }

    private function sendEmailToUser()
    {
        //TODO: Won't be implemented within scope of this sem project
    }
}

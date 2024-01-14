<?php

namespace view;
require_once "utils/sections/ForgotPasswordSections.php";
require_once 'utils/Icons.php';
require_once 'utils/HrefsConstants.php';

class ForgotPasswordView
{
    public $isUserWithEmailFound;
    public $email;
    public $csrfToken;
    public $isCsrfSuccess;

    public function __construct($isUserWithEmailFound, $email, $csrfToken, $isCsrfSuccess)
    {
        $this->isUserWithEmailFound = $isUserWithEmailFound;
        $this->email = $email;
        $this->csrfToken = $csrfToken;
        $this->isCsrfSuccess = $isCsrfSuccess;
    }

    public function render(): void
    {
        include __DIR__ . '/templates/forgotPassword.php';
    }
}

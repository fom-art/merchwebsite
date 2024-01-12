<?php

namespace view;
require_once "utils/sections/ForgotPasswordSections.php";
require_once 'utils/Icons.php';
require_once 'utils/HrefsConstants.php';

class ForgotPasswordView
{
    private $isFormValid;
    private $email;

    public function __construct($isFormValid, $email)
    {
        $this->$isFormValid = $isFormValid;
        $this->$email = $email;
    }

    public function render()
    {
        include __DIR__ . '/templates/forgotPassword.php';
    }
}

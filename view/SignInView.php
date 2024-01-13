<?php

namespace view;

require_once "utils/sections/SignInSections.php";
require_once 'utils/Icons.php';
require_once 'utils/HrefsConstants.php';

class SignInView
{
    public string $email;
    public string $password;
    public bool $logInResult;
    public string $csrfToken;

    public function __construct($email, $password, $logInResult, $csrfToken)
    {
        $this->email = $email;
        $this->password = $password;
        $this->logInResult = $logInResult;
        $this->csrfToken = $csrfToken;
    }

    public function render()
    {
        include __DIR__ . '/templates/signIn.php';
    }
}

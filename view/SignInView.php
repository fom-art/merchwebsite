<?php

namespace view;

require_once "utils/sections/SignInSections.php";
require_once 'utils/Icons.php';
require_once 'utils/HrefsConstants.php';

class SignInView
{
    private $email;
    private $password;

    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function render()
    {
        include __DIR__ . '/templates/signIn.php';
    }
}

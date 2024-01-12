<?php

namespace controller\utlis;

use database\DatabaseHandler;

class Utils
{
    function isSignInSuccessful($POST): bool
    {
        require_once("../database/DatabaseHandler.php");
        require_once("FormValidation.php");
        $email = $POST["email"];
        $password = $POST["password"];
        $database = new DatabaseHandler();
        $validation = new FormValidation();
        return $this->isPostSet($POST) && $validation->validateSignInForm($email, $password) * $database->checkUserForLogIn($email, $password);
    }


}
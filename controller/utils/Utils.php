<?php

namespace controller\utlis;

use database\DatabaseHandler;

class Utils
{
    static function isPostSet($POST): bool
    {
        return $POST && $POST["confirm"] = "confirm";
    }

    function isSignInSuccessful($POST): bool
    {
        require_once("../database/DatabaseHandler.php");
        require_once("Validation.php");
        $email = $POST["email"];
        $password = $POST["password"];
        $database = new DatabaseHandler();
        $validation = new Validation();
        return $this->isPostSet($POST) && $validation->validateSignInForm($email, $password) * $database->checkUserForLogIn($email, $password);
    }


}
<?php

namespace controller\utlis;

use database\DatabaseHandler;

/**
 * Class Utils
 *
 * Utility class for various helper functions.
 *
 * @package controller\utlis
 */
class Utils
{

    /**
     * Checks if sign-in is successful by validating user credentials.
     *
     * @param array $POST The POST data containing user credentials (email and password).
     *
     * @return bool True if sign-in is successful, false otherwise.
     */
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
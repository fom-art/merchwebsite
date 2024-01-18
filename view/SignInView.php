<?php

namespace view;

require_once "utils/sections/SignInSections.php";
require_once 'utils/Icons.php';
require_once 'utils/HrefsConstants.php';

/**
 * Class SignInView
 *
 * This class represents the view for the sign-in page of the web application.
 * It is used to render the user interface for user authentication and login.
 */
class SignInView
{
    /**
     * @var string The user's email address entered during login.
     */
    public string $email;

    /**
     * @var string The user's password entered during login.
     */
    public string $password;

    /**
     * @var bool Indicates whether the login attempt was successful (true/false).
     */
    public bool $logInResult;

    /**
     * @var string The CSRF token for form submission security.
     */
    public string $csrfToken;

    /**
     * SignInView constructor.
     *
     * @param string $email The user's email address entered during login.
     * @param string $password The user's password entered during login.
     * @param bool $logInResult Indicates whether the login attempt was successful (true/false).
     * @param string $csrfToken The CSRF token for form submission security.
     */
    public function __construct($email, $password, $logInResult, $csrfToken)
    {
        $this->email = $email;
        $this->password = $password;
        $this->logInResult = $logInResult;
        $this->csrfToken = $csrfToken;
    }

    /**
     * Render the sign-in page template.
     */
    public function render()
    {
        // Include the template for rendering the sign-in page (e.g., signIn.php).
        include __DIR__ . '/templates/signIn.php';
    }
}

<?php

namespace view;
require_once "utils/sections/ForgotPasswordSections.php";
require_once 'utils/Icons.php';
require_once 'utils/HrefsConstants.php';

/**
 * Class ForgotPasswordView
 *
 * This class represents the view for the "Forgot Password" page.
 * It is used to render the user interface for resetting a forgotten password.
 */
class ForgotPasswordView
{
    /**
     * @var bool Indicates whether a user with the provided email was found.
     */
    public $isUserWithEmailFound;

    /**
     * @var string The email address provided for password reset.
     */
    public $email;

    /**
     * @var string The CSRF token used to protect against Cross-Site Request Forgery attacks.
     */
    public $csrfToken;

    /**
     * @var bool Indicates whether the CSRF token validation was successful.
     */
    public $isCsrfSuccess;

    /**
     * ForgotPasswordView constructor.
     *
     * @param bool $isUserWithEmailFound Indicates whether a user with the provided email was found.
     * @param string $email The email address provided for password reset.
     * @param string $csrfToken The CSRF token used to protect against Cross-Site Request Forgery attacks.
     * @param bool $isCsrfSuccess Indicates whether the CSRF token validation was successful.
     */
    public function __construct($isUserWithEmailFound, $email, $csrfToken, $isCsrfSuccess)
    {
        $this->isUserWithEmailFound = $isUserWithEmailFound;
        $this->email = $email;
        $this->csrfToken = $csrfToken;
        $this->isCsrfSuccess = $isCsrfSuccess;
    }

    /**
     * Render the "Forgot Password" page template.
     */
    public function render(): void
    {
        // Include the template for rendering the "Forgot Password" page (e.g., forgotPassword.php).
        include __DIR__ . '/templates/forgotPassword.php';
    }
}


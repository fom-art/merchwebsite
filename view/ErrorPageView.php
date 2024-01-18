<?php

namespace view;

require_once 'utils/HrefsConstants.php';

/**
 * Class ErrorPageView
 *
 * This class represents the view for error pages, such as 404 (Not Found) errors.
 * It is used to display error information to the user when a specific page is not found.
 */
class ErrorPageView
{
    /**
     * @var string|null The request that led to the error (e.g., the URL).
     */
    private $request;

    /**
     * ErrorPageView constructor.
     *
     * @param string|null $request The request that led to the error (e.g., the URL).
     */
    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * Render the error page template.
     */
    public function render()
    {
        // Include the template for rendering the error page (e.g., 404.php).
        include __DIR__ . '/templates/404.php';
    }
}

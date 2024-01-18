<?php

namespace controller;

use view\ErrorPageView;

require_once __DIR__ . '/../view/ErrorPageView.php';

/**
 * Class ErrorPageController
 *
 * This class handles error pages and displays error messages to users.
 */
class ErrorPageController
{
    /**
     * @var ErrorPageView
     */
    private ErrorPageView $view;

    /**
     * ErrorPageController constructor.
     *
     * Initializes the error page controller with a request and prepares the view.
     *
     * @param string $request The error message or request description.
     */
    public function __construct($request)
    {
        $this->view = new ErrorPageView($request);
    }

    /**
     * Render the error page.
     *
     * @return void
     */
    public function index(): void
    {
        $this->view->render();
    }
}

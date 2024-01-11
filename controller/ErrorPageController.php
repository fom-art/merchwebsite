<?php

namespace controller;

use view\ErrorPageView;

require_once __DIR__ . '/../view/ErrorPageView.php';

class ErrorPageController
{
    private ErrorPageView $view;

    public function __construct($request)
    {
        $this->view = new ErrorPageView($request);
    }

    public function index(): void
    {
        $this->view->render();
    }
}

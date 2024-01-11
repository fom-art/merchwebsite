<?php

namespace controller;

use view\HomeView;

require_once __DIR__ . '/../view/HomeView.php';

class HomeController
{
    private HomeView $view;

    public function __construct($isRegistered, $isAdmin)
    {
        $this->view = new HomeView($isRegistered ?: false, $isAdmin ?: false);
    }

    public function index(): void
    {
        $this->view->render();
    }
}
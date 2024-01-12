<?php

namespace controller;

use view\HomeView;

require_once __DIR__ . '/../view/HomeView.php';

class HomeController
{
    private HomeView $view;

    public function __construct()
    {
        $this->view = new HomeView(
            isRegistered: isset($_SESSION["user"]),
            isAdmin: isset($_SESSION['user']['isAdmin']) && $_SESSION['user']['isAdmin']
        );
    }

    public function index(): void
    {
        $this->view->render();
    }
}
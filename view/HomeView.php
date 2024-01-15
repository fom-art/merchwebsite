<?php

namespace view;

require_once "utils/sections/HomeSections.php";
require_once 'utils/HrefsConstants.php';

class HomeView
{
    public String $isRegistered;
    public String $isAdmin;
    public array $products;

    public function __construct($isRegistered, $isAdmin, $products)
    {
        $this->isRegistered = $isRegistered;
        $this->isAdmin = $isAdmin;
        $this->products = $products;
    }
    public function render() {
        include __DIR__ . '/templates/home.php';
    }
}
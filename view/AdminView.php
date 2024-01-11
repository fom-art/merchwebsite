<?php

namespace view;

require_once "utils/sections/HomeSections.php";
require_once 'utils/HrefsConstants.php';

class AdminView
{
    public String $isRegistered;
    public String $isAdmin;

    public function __construct($isRegistered, $isAdmin)
    {
        $this->isRegistered = $isRegistered;
        $this->isAdmin = $isAdmin;
    }
    public function render() {
        include __DIR__ . '/templates/admin.php';
    }
}
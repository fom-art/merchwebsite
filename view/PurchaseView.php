<?php

namespace view;

require_once "utils/sections/PurchaseSections.php";
require_once 'utils/HrefsConstants.php';

class PurchaseView
{
    public String $isRegistered;
    public String $isAdmin;

    public function __construct($isRegistered, $isAdmin)
    {
        $this->isRegistered = $isRegistered;
        $this->isAdmin = $isAdmin;
    }
    public function render() {
        include __DIR__ . '/templates/purchase.php';
    }
}
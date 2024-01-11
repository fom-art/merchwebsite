<?php

namespace view;
require_once "utils/sections/UserDetailsSections.php";
require_once 'utils/Icons.php';
require_once 'utils/HrefsConstants.php';

class UserDetailsView
{
    private $isRegistered;
    private $isAdmin;

    public function __construct($isRegistered, $isAdmin)
    {
        $this->isRegistered = $isRegistered;
        $this->isAdmin = $isAdmin;
    }

    public function render()
    {
        include __DIR__ . '/templates/userDetails.php';
    }
}

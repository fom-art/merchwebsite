<?php

namespace view;

require_once 'utils/HrefsConstants.php';

class ErrorPageView
{
    private $request;

    public function __construct($request)
    {
        $this->$request = $request;
    }

    public function render()
    {
        include __DIR__ . '/templates/404.php';
    }
}

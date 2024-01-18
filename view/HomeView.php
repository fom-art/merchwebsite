<?php

namespace view;

require_once "utils/sections/HomeSections.php";
require_once 'utils/HrefsConstants.php';

/**
 * Class HomeView
 *
 * This class represents the view for the home page of the web application.
 * It is used to render the user interface for the home page, displaying products and user-related information.
 */
class HomeView
{
    /**
     * @var string Indicates whether a user is registered (e.g., "user" or "guest").
     */
    public string $isRegistered;

    /**
     * @var string Indicates whether the user has admin privileges (e.g., "admin" or "user").
     */
    public string $isAdmin;

    /**
     * @var array An array of products to be displayed on the home page.
     */
    public array $products;

    /**
     * HomeView constructor.
     *
     * @param string $isRegistered Indicates whether a user is registered (e.g., "user" or "guest").
     * @param string $isAdmin Indicates whether the user has admin privileges (e.g., "admin" or "user").
     * @param array $products An array of products to be displayed on the home page.
     */
    public function __construct($isRegistered, $isAdmin, $products)
    {
        $this->isRegistered = $isRegistered;
        $this->isAdmin = $isAdmin;
        $this->products = $products;
    }

    /**
     * Render the home page template.
     */
    public function render()
    {
        // Include the template for rendering the home page (e.g., home.php).
        include __DIR__ . '/templates/home.php';
    }
}

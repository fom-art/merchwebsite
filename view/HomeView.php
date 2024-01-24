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
     * @var array List of products to be displayed on the home page.
     */
    public array $products;

    /**
     * @var string Current page number for pagination.
     */
    public string $page;

    /**
     * @var string Total number of pages available for pagination.
     */
    public string $pagesAmount;

    /**
     * @var string Indicates the registration status of the user (e.g., "user" or "guest").
     */
    public string $isRegistered;

    /**
     * @var string Indicates whether the user has admin privileges (e.g., "admin" or "user").
     */
    public string $isAdmin;

    /**
     * Constructor for HomeView.
     *
     * Initializes the view with data necessary for rendering the home page.
     *
     * @param array $products List of products to be displayed.
     * @param string $page Current page number for pagination.
     * @param string $pagesAmount Total number of pages available.
     * @param string $isRegistered User's registration status.
     * @param string $isAdmin User's admin status.
     */
    public function __construct($products, string $page, $pagesAmount, $isRegistered, $isAdmin)
    {
        $this->products = $products;
        $this->page = $page;
        $this->pagesAmount = $pagesAmount;
        $this->isRegistered = $isRegistered;
        $this->isAdmin = $isAdmin;
    }

    /**
     * Renders the home page.
     *
     * Includes the home page template for displaying content.
     */
    public function render()
    {
        include __DIR__ . '/templates/home.php';
    }
}
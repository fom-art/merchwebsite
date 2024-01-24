<?php

namespace controller;

use model\database\DatabaseHandler;
use model\models\Product;
use view\HomeView;
use view\utils\sections\HomeSections;

require_once __DIR__ . '/../view/HomeView.php';

/**
 * Class HomeController
 *
 * This class manages the home page and product listing.
 */
class HomeController
{
    /**
     * @var HomeView
     */
    private HomeView $view;

    /**
     * HomeController constructor.
     *
     * Initializes the home controller, fetches and displays products.
     */
    public function __construct()
    {
        $products = [];
        $pagesAmount = "1";
        $page = "1";

        // Receive GET data
        if (isset($_GET['page']) && isset($_GET['perPage'])) {
            $products = $this->getProducts();
            $pagesAmount = $this->getPagesAmount();
            $page = (int)$_GET['page'];

            if ($page < 1) {
                $page = 1;
            }

            if ($page > $pagesAmount) {
                $page = $pagesAmount;
            }
        }

        $this->view = new HomeView(
            products: $products,
            page: $page,
            pagesAmount: $pagesAmount,
            isRegistered: isset($_SESSION["email"]),
            isAdmin: isset($_SESSION['is-admin']) && $_SESSION['is-admin'],
        );
    }

    /**
     * Render the home page.
     *
     * @return void
     */
    public function index(): void
    {
        $this->view->render();
    }

    /**
     * Retrieve a list of products based on page and perPage parameters.
     *
     * @return array An array of Product objects.
     */
    private function getProducts(): array
    {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = isset($_GET['perPage']) ? (int)$_GET['perPage'] : 10;
        $pagesAmount  = $this->getPagesAmount();

        if ($page < 1) {
            $page = 1;
        }

        if ($page > $pagesAmount) {
            $page = $pagesAmount;
        }

        $dbHandler = new DatabaseHandler();
        return $dbHandler->getProductsList($page, $perPage);
    }

    /**
     * Calculate the total number of pages based on product count and perPage value.
     *
     * @return int The total number of pages.
     */
    private function getPagesAmount(): int
    {
        $dbHandler = new DatabaseHandler();
        $totalProductsCount = $dbHandler->getTotalProductsCount();
        $perPage = isset($_GET['perPage']) ? (int)$_GET['perPage'] : 10; // Default to 10 if not set

        return ceil($totalProductsCount / $perPage);
    }
}

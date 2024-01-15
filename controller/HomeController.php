<?php

namespace controller;

use model\database\DatabaseHandler;
use model\models\Product;
use view\HomeView;

require_once __DIR__ . '/../view/HomeView.php';

class HomeController
{
    private HomeView $view;

    public function __construct()
    {
        $products = array();
        // Receive POST data
        if (isset($_POST['page']) && isset($_POST['perPage'])) {
            $products = $this->getProducts();
            $productsArray = array_map(function($product) {
                return $product->toArray();
            }, $products);

            $pagesAmount = $this->getPagesAmount();
            $response = [
                'products' => $productsArray,
                'totalPages' => $pagesAmount
            ];

            echo json_encode($response);
            exit;
        }

        foreach ($products as $product) {
            echo "Name: " . $product->getName() . ", Price: " . $product->getPrice() . "<br>";
        }
        $this->view = new HomeView(
            isRegistered: isset($_SESSION["email"]),
            isAdmin: isset($_SESSION['is-admin']) && $_SESSION['is-admin'],
            products: $products
        );
    }

    public function index(): void
    {
        $this->view->render();
    }

    private function getProducts(): array
    {
        $page = isset($_POST['page']) ? (int)$_POST['page'] : 1;
        $perPage = isset($_POST['perPage']) ? (int)$_POST['perPage'] : 10;

        $dbHandler = new DatabaseHandler();
        return $dbHandler->getProductsList($page, $perPage);
    }

    private function getPagesAmount(): int {
        $dbHandler = new DatabaseHandler();
        $totalProductsCount = $dbHandler->getTotalProductsCount();
        $perPage = isset($_POST['perPage']) ? (int)$_POST['perPage'] : 10; // Default to 10 if not set

        return ceil($totalProductsCount / $perPage);
    }
}
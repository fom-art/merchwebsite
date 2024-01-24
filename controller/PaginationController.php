<?php

namespace controller;

use model\database\DatabaseHandler;

class PaginationController
{
    public function sendTotalPagesAmount()
    {
        $pagesAmount = $this->getPagesAmount();

        echo json_encode($pagesAmount);
        exit;
    }


    /**
     * Calculate the total number of pages based on product count and perPage value.
     *
     * @return int The total number of pages.
     */
    private function getPagesAmount(): int {
        $dbHandler = new DatabaseHandler();
        $totalProductsCount = $dbHandler->getTotalProductsCount();
        $perPage = isset($_GET['perPage']) ? (int)$_GET['perPage'] : 10; // Default to 10 if not set

        return ceil($totalProductsCount / $perPage);
    }
}
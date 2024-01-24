<?php

// Start the session
session_start();

// Import necessary classes and dependencies
use controller\AdminController;
use controller\ErrorPageController;
use controller\ForgotPasswordController;
use controller\HomeController;
use controller\PaginationController;
use controller\PurchaseController;
use controller\SignInController;
use controller\SignUpController;
use controller\UserDetailsController;
use controller\utlis\Utils;
use controller\utlis\FormValidation;
use model\database\DatabaseHandler;

// Include necessary files
require_once 'controller/utils/Utils.php';
require_once 'controller/utils/FormValidation.php';
require_once 'model/database/DatabaseHandler.php';
require_once __DIR__ . '/controller/HomeController.php';
require_once __DIR__ . '/controller/AdminController.php';
require_once __DIR__ . '/controller/ForgotPasswordController.php';
require_once __DIR__ . '/controller/PurchaseController.php';
require_once __DIR__ . '/controller/SignInController.php';
require_once __DIR__ . '/controller/SignUpController.php';
require_once __DIR__ . '/controller/UserDetailsController.php';
require_once __DIR__ . '/controller/ErrorPageController.php';
require_once __DIR__ . '/controller/PaginationController.php';

// Create instances of necessary classes
global $utils;
global $validation;
global $database;
$utils = new Utils();
$validation = new FormValidation();
$database = new DatabaseHandler();

// Error reporting settings (Adjust as needed)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Base path of the project
$base_path = '/~fomenart/';

// Exclude static resources from PHP routing
if (preg_match('/\.(?:png|jpg|jpeg|gif|css|js|svg)$/', $_SERVER["REQUEST_URI"])) {
    return false; // Serve the requested resource as-is.
}

// Extract the requested URI and URI segments
$requestUri = $_SERVER['REQUEST_URI'];
$requestUri = str_replace($base_path, '', $requestUri); // Remove the base path
$uri_parts = explode('?', $requestUri);
$uriSegments = explode('/', $uri_parts[0]);

if (sizeof($uri_parts) == 2) {
    array_pop($uriSegments);
}

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) ) {
    echo "Hello";
}

// Here, you can add routing logic to display different pages based on the URI
switch (end($uriSegments)) {
    case '/':
    case '':
        // Route to the home page
        $homeController = new HomeController();
        $homeController->index();
        break;
    case 'admin':
        if (isset($_SESSION['is-admin']) && $_SESSION['is-admin']) {
            // Check if the user is an admin and route to the admin page
            $adminController = new AdminController();
            $adminController->index();
        } else {
            // Redirect non-admin users to the homepage
            header('Location: '. HrefsConstants::INDEX); // Replace '/path/to/homepage' with the actual path
            exit;
        }
        break;
    case 'forgot-password':
        if (isset($_SESSION['email'])) {
            // Redirect signed-in users to the homepage
            header('Location: '. HrefsConstants::INDEX); // Replace '/path/to/homepage' with the actual path
            exit;
        } else {
            // Route to the forgot password page
            $forgotPasswordController = new ForgotPasswordController();
            $forgotPasswordController->index();
        }
        break;
    case 'purchase':
        // Route to the purchase page
        $purchaseController = new PurchaseController();
        $purchaseController->index();
        break;
    case 'sign-in':
        if (isset($_SESSION['email'])) {
            // Redirect signed-in users to the homepage
            header('Location: '. HrefsConstants::INDEX); // Replace '/path/to/homepage' with the actual path
            exit;
        } else {
            // Route to the sign-in page
            $signInController = new SignInController();
            $signInController->index();
        }
        break;
    case 'sign-up':
        if (isset($_SESSION['email'])) {
            // Redirect signed-in users to the homepage
            header('Location: '. HrefsConstants::INDEX); // Replace '/path/to/homepage' with the actual path
            exit;
        } else {
            // Route to the sign-up page
            $signUpController = new SignUpController();
            $signUpController->index();
        }
        break;
    case 'user':
        if (isset($_SESSION['email'])) {
            // Route to the user details page for signed-in users
            $userDetailsController = new UserDetailsController();
            $userDetailsController->index();
        } else {
            // Redirect non-signed-in users to the homepage
            header('Location: '. HrefsConstants::INDEX); // Replace '/path/to/homepage' with the actual path
            exit;
        }
        break;
    case 'pagesAmount':
        // Route to the purchase page
        $paginationController = new PaginationController();
        $paginationController->sendTotalPagesAmount();
        break;
    default:
//        if (isset($_GET) && isset($_GET['page']) && isset($_GET['perPage'])) {
//            $homeController = new HomeController();
//            $homeController->index();
//        } else {
            // Set HTTP response code to 404 and route to an error page
            http_response_code(404);
            $errorPageController = new ErrorPageController($uriSegments[0]);
            $errorPageController->index();
//        }
        break;
}
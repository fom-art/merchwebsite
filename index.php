<?php

// Start the session
session_start();

use controller\AdminController;
use controller\ErrorPageController;
use controller\ForgotPasswordController;
use controller\HomeController;
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

$requestUri = $_SERVER['REQUEST_URI'];
$requestUri = str_replace($base_path, '', $requestUri); // Remove the base path
$uriSegments = explode('/', $requestUri);

//echo "<pre>URI Segments: ";
//print_r($uriSegments);
//echo "</pre>";


// Here, you can add routing logic to display different pages based on the URI
switch (end($uriSegments)) {
    case '/':
    case '':
        $homeController = new HomeController();
        $homeController->index();
        break;
    case 'admin':
        $adminController = new AdminController();
        $adminController->index();
        break;
    case 'forgot-password':
        $forgotPasswordController = new ForgotPasswordController();
        $forgotPasswordController->index();
        break;
    case 'purchase':
        $purchaseController = new PurchaseController();
        $purchaseController->index();
        break;
    case 'sign-in':
        $signInController = new SignInController();
        $signInController->index();
        break;
    case 'sign-up':
        $signUpController = new SignUpController();
        $signUpController->index();
        break;
    case 'user':
        $userDetailsController = new UserDetailsController();
        $userDetailsController->index();
        break;
    default:
        http_response_code(404);
        $errorPageController = new ErrorPageController($uriSegments[0]);
        $errorPageController->index();
        break;
}

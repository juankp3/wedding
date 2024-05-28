<?php
require_once 'controllers/FrontController.php';
require_once 'controllers/LoginController.php';
require_once 'controllers/DashboardController.php';
require_once 'controllers/UserController.php';
require_once 'controllers/CustomerController.php';
require_once 'controllers/GuestController.php';
require_once 'controllers/EventController.php';
require_once 'controllers/WhishesController.php';
require_once 'controllers/TableController.php';


// Elsewhere in your application
$oFrontController = new FrontController();
if (empty($oFrontController->user)){
    return false;
}

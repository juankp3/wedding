<?php
require_once 'controllers/FrontController.php';
require_once 'controllers/LoginController.php';
require_once 'controllers/DashboardController.php';
require_once 'controllers/UserController.php';
require_once 'controllers/ShopController.php';
require_once 'controllers/ProductController.php';
require_once 'controllers/CategoryController.php';
require_once 'controllers/CustomerController.php';
require_once 'controllers/PaymentController.php';
require_once 'controllers/OrderController.php';


// Elsewhere in your application


$oFrontController = new FrontController();
if (empty($oFrontController->user)){
    return false;
}

// $oDashboardController = new DashboardController();
// Flight::route('GET|POST /dashboard', array($oDashboardController, 'index'));
// Flight::route('GET|POST /dashboard/file', array($oDashboardController, 'index'));
// Flight::route('GET|POST /dashboard/file/edit/@id', array($oDashboardController, 'edit'));
// Flight::route('GET|POST /dashboard/file/delete/@id', array($oDashboardController, 'delete'));

// $oUserController = new UserController();
// Flight::route('GET|POST /dashboard/user', array($oUserController, 'index'));
// Flight::route('GET|POST /dashboard/user/new', array($oUserController, 'add'));
// Flight::route('GET|POST /dashboard/user/delete/@id', array($oUserController, 'delete'));

// $oShopController = new ShopController();
// Flight::route('GET|POST /dashboard/shop', array($oShopController, 'index'));
// Flight::route('GET|POST /dashboard/shop/new', array($oShopController, 'add'));
// Flight::route('GET|POST /dashboard/shop/edit/@id', array($oShopController, 'edit'));
// Flight::route('GET|POST /dashboard/shop/delete/@id', array($oShopController, 'delete'));

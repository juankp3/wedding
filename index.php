<?php
require 'vendor/autoload.php';


$showError = 1;
ini_set('display_errors', $showError);
ini_set('display_startup_errors', $showError);
error_reporting(E_ALL);
// Flight::set('flight.log_errors', false);
session_start();
date_default_timezone_set('America/Lima');


$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

define('BASE_URL', $_ENV['BASE_URL']);
define('DEBUG', false);
define('JS_URL', BASE_URL . '/assets/js');
define('CSS_URL', BASE_URL . '/assets/css');
define('IMG_URL', BASE_URL . '/assets/img');
define('IMG_FILES', BASE_URL . '/assets/files');
define('APP_UPLOAD_FILE', BASE_URL . '/uploads/');
define('APP_UPLOAD_FILE_RELATIVE', './uploads/');

define('DIST_IMG_URL', BASE_URL . '/public/dist/img');

Flight::set('app_version', 'v1.0.0');
Flight::set('base', '/dashboard');


require 'src/app/route.php';
require 'src/api/index.php';
require 'public/index.php';

Flight::map('notFound', function () {
    $request = Flight::request();
    $posicion = strpos($request->url, 'api');
    if ($posicion !== false) {
        Flight::json(['error' => 'Versión no válida'], 400);
    }
    Flight::render('_layout/404.php');
});



Flight::start();

?>

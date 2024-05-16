<?php
require 'library/lib/flight/flight/Flight.php';
// require 'lib/PHPExcel/PHPExcel.php';

$showError = 1;
ini_set('display_errors', $showError);
ini_set('display_startup_errors', $showError);
error_reporting(E_ALL);
// Flight::set('flight.log_errors', false);


session_start();
date_default_timezone_set('America/Lima');



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

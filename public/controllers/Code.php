<?php
require_once dirname(__FILE__) . '/../../src/models/GuestModel.php';

class Code
{
    public function index()
    {
		$guestModel = new GuestModel();
		$guest = array();
		$guest = $guestModel->getAllGuest();

		// echo "<pre>";
		// var_dump($guest);
		// echo "</pre>";

		// echo "Hi";
		// exit;
		$params['guest'] = $guest;
		Flight::set('flight.views.path', 'public/templates/code');
		Flight::render('index', $params, 'body_content');
		Flight::render('_layout/template');

    }

}

$oCode = new Code();
Flight::route('GET /code', array($oCode, 'index'));

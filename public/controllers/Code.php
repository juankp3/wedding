<?php
require_once dirname(__FILE__) . '/../../src/models/GuestModel.php';

class Code
{
    public function index()
    {
		$guestModel = new GuestModel();
		$guest = array();
		$guest = $guestModel->getAllGuest();
		// $aditionalGuest = $guestModel->getAlladitioalGuest();

		$totalGuest = $guestModel->getTotal();
		$totalConfirm = $guestModel->getTotalConfirm();
		$totalPending = $guestModel->getTotalPending();
		$totalCancelled = $guestModel->getTotalCancelled();


		$params['totals'] = array(
			'total' => $totalGuest['cantidad'],
			'confirm' => count($totalConfirm),
			'pending' => count($totalPending),
			'cancelled' => count($totalCancelled),
		);


		$params['group_guest'] = $guest;
		Flight::set('flight.views.path', 'public/templates/code');
		Flight::render('index', $params, 'body_content');
		Flight::render('_layout/template');

    }

}

$oCode = new Code();
Flight::route('GET /code', array($oCode, 'index'));

<?php
require_once dirname(__FILE__) . '/../../models/GuestModel.php';
class DashboardController extends FrontController
{
    public $user;

    public function __construct()
    {
        $this->name = 'dashboard';
        parent::__construct();
    }

    public function index()
    {
		$guestModel = new GuestModel();
		$totalGuest = $guestModel->getTotal();
		$totalConfirm = $guestModel->getTotalConfirm();
		$totalPending = $guestModel->getTotalPending();
		$totalCancelled = $guestModel->getTotalCancelled();


		$this->params['guestConfirm'] = array(
			'total' => $totalGuest['cantidad'],
			'confirm' => count($totalConfirm),
			'pending' => count($totalPending),
			'cancelled' => count($totalCancelled),
		);

        $this->params['title'] = 'Dashboard';
        Flight::render('dashboard/index', $this->params, 'body_content');
        Flight::render('_layout/template');
    }
}

$oDashboardController = new DashboardController();
Flight::route('GET|POST /dashboard', array($oDashboardController, 'index'));

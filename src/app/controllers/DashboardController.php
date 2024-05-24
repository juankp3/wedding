<?php

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

        $this->params['title'] = 'Dashboard';
        Flight::render('dashboard/index', $this->params, 'body_content');
        Flight::render('_layout/template');
    }
}

$oDashboardController = new DashboardController();
Flight::route('GET|POST /dashboard', array($oDashboardController, 'index'));

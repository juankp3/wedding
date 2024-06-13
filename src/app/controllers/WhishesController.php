<?php

require_once dirname(__FILE__).'/../../models/WishesModel.php';

class WishesController extends FrontController
{

    public function __construct()
    {
        $this->name = 'wishes';
        parent::__construct();
    }

    /**
     * Repository
     */
    public function index()
    {
		$wishesModel = new WishesModel();
        $rawdataWishes = $wishesModel->getWishes();

        $this->params['title'] = 'Buenos deseos';
        $this->params['data'] =  $rawdataWishes; //array();

        Flight::render('wishes/index', $this->params, 'body_content');
        Flight::render('_layout/template');
    }

}

$oWishesController = new WishesController();
Flight::route('GET|POST /dashboard/wishes', array($oWishesController, 'index'));


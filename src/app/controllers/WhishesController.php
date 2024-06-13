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
        $this->params['data'] =  $rawdataWishes;

        Flight::render('wishes/index', $this->params, 'body_content');
        Flight::render('_layout/template');
    }

    public function ajax()
    {
        $data = Flight::request()->data;
        $id = $data['id'];
        $active = $data['active'];

		$wishesModel = new WishesModel($id);
        $wishesModel->active = $active;
        $wishesModel->date_upd = date("Y-m-d H:i:s");
        $wishesModel->update();
        Flight::json($data);
    }

}

$oWishesController = new WishesController();
Flight::route('GET|POST /dashboard/wishes', array($oWishesController, 'index'));
Flight::route('GET|POST /dashboard/wishes/ajax', array($oWishesController, 'ajax'));


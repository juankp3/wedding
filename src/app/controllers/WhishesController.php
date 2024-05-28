<?php
require_once dirname(__FILE__).'/../../models/TableModel.php';
class WishesController extends FrontController
{

    public function __construct()
    {
        $this->name = 'table';
        parent::__construct();
    }

    /**
     * Repository
     */
    public function index()
    {

        // $tableModel = new TableModel();

        $this->params['title'] = 'Buenos deseos';
        $this->params['data'] = array();

        Flight::render('wishes/index', $this->params, 'body_content');
        Flight::render('_layout/template');
    }




}

$oWishesController = new WishesController();
Flight::route('GET|POST /dashboard/wishes', array($oWishesController, 'index'));


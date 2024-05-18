<?php
require_once dirname(__FILE__).'/../../models/TableModel.php';
class TableController extends FrontController
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

        $this->params['title'] = 'Mesas';
        $this->params['data'] = array();

        Flight::render('table/index', $this->params, 'body_content');
        Flight::render('_layout/template');
    }




}

$oTableController = new TableController();
Flight::route('GET|POST /dashboard/table', array($oTableController, 'index'));


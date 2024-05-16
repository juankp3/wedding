<?php
class ShopController extends FrontController implements Repository, UITableViewDataSource, UITableViewDelegate
{
    public function __construct()
    {
        $this->name = 'shop';
        parent::__construct();
    }

    /**
     * Repository
     */
    public function index()
    {
        $shoptModel = new ShopModel();
        $rawdataShops = $shoptModel->getShops();

        // UITableView
        $customShops = $this->datasource($rawdataShops);
        $shopTable = $this->tableView($customShops);

        $this->params['title'] = 'Tiendas';
        $this->params['data'] = $shopTable;
        $this->params['header'] = $this->willDisplayHeaderView();

        Flight::render('shop/index', $this->params, 'body_content');
        Flight::render('_layout/template');
    }

    public function create()
    {
        $this->params['title'] = 'Nueva Tienda';
        $this->params['form'] = $this->form();

        if (isset($_POST['name'])) {
            $shopModel = new ShopModel();
            $data = Flight::request()->data->getData();
            $this->params['data'] = $data;

            $shopModel->name = Flight::request()->data->name;
            $shopModel->ruc = Flight::request()->data->ruc;
            $shopModel->address = Flight::request()->data->address;
            $response = $shopModel->createShop();

            if (!empty($response['error']))
                $this->params['error'] = $response['error'];

            if ($response['success'])
                Flight::redirect('/dashboard/shop');
        }

        Flight::render('_partials/form/index', $this->params, 'body_content');
        Flight::render('_layout/template');
    }


    public function update($id)
    {
        $data = array();
        $this->params['title'] = 'Editar Tienda';
        $this->params['form'] = $this->form(self::EDIT);

        $shopModel = new ShopModel($id);
        $data = (array)$shopModel;

        if (isset($_POST['name'])) {
            $data = Flight::request()->data->getData();
            $shopModel->name = Flight::request()->data->name;
            $shopModel->ruc = Flight::request()->data->ruc;
            $shopModel->address = Flight::request()->data->address;
            $response = $shopModel->updateShop($id);

            if (!empty($response['error']))
                $this->params['error'] = $response['error'];

            if ($response['success'])
                Flight::redirect('/dashboard/shop');
        }

        $this->params['data'] = $data;

        Flight::render('_partials/form/index', $this->params, 'body_content');
        Flight::render('_layout/template');

    }

    public function delete($id)
    {
        $oPShopModel = new ShopModel($id);
        $oPShopModel->delete();
        Flight::redirect('/dashboard/shop');
    }

    public function form($viewForm = null)
    {
        $oPShopModel = new ShopModel();
        $form = array();
        $form[] = array(
            'label' => 'Nombre',
            'name' => 'name',
            'type' => 'text',
        );

        $form[] = array(
            'label' => 'RUC',
            'name' => 'ruc',
            'type' => 'text',
        );

        $form[] = array(
            'label' => 'Direccion',
            'name' => 'address',
            'type' => 'text',
        );

        return $form;
    }

    /**
     * UITableViewDataSource
     */
    public function datasource($rawdataShops)
    {
        return array_map(function($shop){
            $data = array(
                $shop['id_shop'],
                $shop['name'],
                $shop['ruc'],
                $shop['address'],
            );
            return $data;
        }, $rawdataShops);
    }

    public function tableView($shops)
    {
        $shopModel = new ShopModel();
        return $shopModel->getPagination($shops);
    }

    /**
     * UITableViewDelegate
     */
    public function willDisplayHeaderView()
    {
        return array(
            'id',
            'Tienda',
            'Ruc',
            'Direccion',
        );
    }

}

$oShopController = new ShopController();
Flight::route('GET|POST /dashboard/shop', array($oShopController, 'index'));
Flight::route('GET|POST /dashboard/shop/new', array($oShopController, 'create'));
Flight::route('GET|POST /dashboard/shop/edit/@id', array($oShopController, 'update'));
Flight::route('GET|POST /dashboard/shop/delete/@id', array($oShopController, 'delete'));

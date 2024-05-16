<?php
class OrderController extends FrontController implements Repository, UITableViewDataSource, UITableViewDelegate
{
    public function __construct()
    {
        $this->name = 'order';
        parent::__construct();
    }

    /**
     * Repository
     */
    public function index()
    {
        $orderModel = new OrderModel();
        $rawdataOrders = $orderModel->getOrders();

        // UITableView
        $customOrders = $this->datasource($rawdataOrders);
        $orderTable = $this->tableView($customOrders);

        $this->params['title'] = 'Pedidos';
        $this->params['data'] = $orderTable;
        $this->params['header'] = $this->willDisplayHeaderView();

        Flight::render('order/index', $this->params, 'body_content');
        Flight::render('_layout/template');
    }

    public function create()
    {/*
        $orderModel = new OrderModel();
        $this->params['title'] = 'Nuevo Pedido';

        if (isset($_POST['name'])) {
            $data = Flight::request()->data->getData();
            $orderModel->add($data);
            Flight::redirect('/dashboard/order');
        }

        Flight::render('order/add', $this->params, 'body_content');
        Flight::render('_layout/template');*/
    }

    public function update($id)
    {

    }

    public function delete($id)
    {/*
        $oOrderModel = new OrderModel($id);
        $oOrderModel->delete();
        Flight::redirect('/dashboard/order');*/
    }

    /**
     * UITableViewDataSource
     */
    public function datasource($rawdataOrder)
    {
        return array_map(function($order){
            $data = array(
                $order['id_order'],
                $order['total_paid'],
                $order['total_products'],
            );
            return $data;
        }, $rawdataOrder);
    }

    public function tableView($orders)
    {
        $orderModel = new OrderModel();
        return $orderModel->getPagination($orders);
    }

    public function form($viewForm = null)
    {

    }

    /**
      * UITableViewDelegate
      */
    public function willDisplayHeaderView()
    {
        return array(
            'id',
            'Precio Total',
            'Cantidad Prod'
        );
    }

}

$oOrdersController = new OrderController();

Flight::route('GET|POST /dashboard/order', array($oOrdersController, 'index'));
Flight::route('GET|POST /dashboard/order/new', array($oOrdersController, 'create'));


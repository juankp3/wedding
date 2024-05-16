<?php
class CustomerController extends FrontController implements Repository, UITableViewDataSource, UITableViewDelegate
{
    public function __construct()
    {
        $this->name = 'customer';
        parent::__construct();
    }

    /**
     * Repository
     */
    public function index()
    {
        $customerModel = new CustomerModel();
        $rawdataCustomers = $customerModel->getCustomers();

        // UITableView
        $customCustomers = $this->datasource($rawdataCustomers);
        $customerTable = $this->tableView($customCustomers);

        $this->params['title'] = 'Clientes';
        $this->params['data'] = $customerTable;
        $this->params['header'] = $this->willDisplayHeaderView();

        Flight::render('customer/index', $this->params, 'body_content');
        Flight::render('_layout/template');
    }

    public function create()
    {
        $this->params['title'] = 'Nuevo Cliente';

        if (isset($_POST['firstname'])) {
            $customerModel = new CustomerModel();
            $data = Flight::request()->data->getData();
            $this->params['data'] = $data;

            $customerModel->firstname = Flight::request()->data->firstname;
            $customerModel->lastname = Flight::request()->data->lastname;
            $customerModel->email = Flight::request()->data->email;
            $customerModel->dni = Flight::request()->data->dni;
            $response = $customerModel->createCustomer();

            if (!empty($response['error']))
                $this->params['error'] = $response['error'];

            if ($response['success'])
                Flight::redirect('/dashboard/customer');
        }

        Flight::render('customer/add', $this->params, 'body_content');
        Flight::render('_layout/template');
    }

    public function update($id)
    {

    }

    public function delete($id)
    {
        $oCustomerModel = new CustomerModel($id);
        $oCustomerModel->delete();
        Flight::redirect('/dashboard/customer');
    }

    public function form($viewForm = null)
    {

    }

    /**
     * UITableViewDataSource
     */
    public function datasource($rawdataCustomer)
    {
        return array_map(function($customer){
            $data = array(
                $customer['id_customer'],
                $customer['firstname'],
                $customer['lastname'],
                $customer['email'],
                $customer['dni'],
            );
            return $data;
        }, $rawdataCustomer);
    }

    public function tableView($customers)
    {
        $customerModel = new CustomerModel();
        return $customerModel->getPagination($customers);
    }

    /**
      * UITableViewDelegate
      */
    public function willDisplayHeaderView()
    {
        return array(
            'id',
            'Nombre',
            'Apellido',
            'Correo',
            'Dni'
        );
    }

}

$oCustomerController = new CustomerController();

Flight::route('GET|POST /dashboard/customer', array($oCustomerController, 'index'));
Flight::route('GET|POST /dashboard/customer/new', array($oCustomerController, 'create'));


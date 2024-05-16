<?php
class PaymentController extends FrontController implements Repository, UITableViewDataSource, UITableViewDelegate
{
    public function __construct()
    {
        $this->name = 'payment';
        parent::__construct();
    }

    /**
     * Repository
     */
    public function index()
    {
        $paymentModel = new PaymentModel();
        $rawdataPayments = $paymentModel->getPayments();

        // UITableView
        $customPayments = $this->datasource($rawdataPayments);
        $paymentTable = $this->tableView($customPayments);

        $this->params['title'] = 'Metodos de pago';
        $this->params['data'] = $paymentTable;
        $this->params['header'] = $this->willDisplayHeaderView();

        Flight::render('payment/index', $this->params, 'body_content');
        Flight::render('_layout/template');
    }

    public function create()
    {
        $this->params['title'] = 'Nuevo Metodo de Pago';
        $this->params['form'] = $this->form();

        if (isset($_POST['name'])) {
            $paymentModel = new PaymentModel();
            $data = Flight::request()->data->getData();
            $this->params['data'] = $data;

            $paymentModel->name = Flight::request()->data->name;
            $response = $paymentModel->createPayment();

            if (!empty($response['error']))
                $this->params['error'] = $response['error'];

            if ($response['success'])
                Flight::redirect('/dashboard/payment');
        }

        Flight::render('_partials/form/index', $this->params, 'body_content');
        Flight::render('_layout/template');
    }

    public function update($id)
    {
        $data = array();
        $this->params['title'] = 'Editar Metodo de Pago';
        $this->params['form'] = $this->form(self::EDIT);

        $paymentModel = new PaymentModel($id);
        $data = (array)$paymentModel;

        if (isset($_POST['name'])) {
            $data = Flight::request()->data->getData();
            $paymentModel->name = Flight::request()->data->name;
            $response = $paymentModel->updatePayment($id);

            if (!empty($response['error']))
                $this->params['error'] = $response['error'];

            if ($response['success'])
                Flight::redirect('/dashboard/payment');
        }

        $this->params['data'] = $data;

        Flight::render('_partials/form/index', $this->params, 'body_content');
        Flight::render('_layout/template');

    }

    public function delete($id)
    {
        $oPaymentModel = new PaymentModel($id);
        $oPaymentModel->delete();
        Flight::redirect('/dashboard/payment');
    }

    public function form($viewForm = null)
    {
        $oPPaymentModel = new PaymentModel();
        $form = array();
        $form[] = array(
            'label' => 'Nombre',
            'name' => 'name',
            'type' => 'text',
        );

        return $form;
    }

    /**
     * UITableViewDataSource
     */
    public function datasource($rawdataPayment)
    {
        return array_map(function($payment){
            $data = array(
                $payment['id_payment'],
                $payment['name'],
            );
            return $data;
        }, $rawdataPayment);
    }

    public function tableView($payments)
    {
        $paymentModel = new PaymentModel();
        return $paymentModel->getPagination($payments);
    }

    /**
      * UITableViewDelegate
      */
    public function willDisplayHeaderView()
    {
        return array(
            'id',
            'Metodo de pago'
        );
    }

}

$oPaymentController = new PaymentController();

Flight::route('GET|POST /dashboard/payment', array($oPaymentController, 'index'));
Flight::route('GET|POST /dashboard/payment/new', array($oPaymentController, 'create'));
Flight::route('GET|POST /dashboard/payment/edit/@id', array($oPaymentController, 'update'));
Flight::route('GET|POST /dashboard/payment/delete/@id', array($oPaymentController, 'delete'));

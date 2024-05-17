<?php
require_once dirname(__FILE__).'/../../models/TableModel.php';
class TableController extends FrontController implements Repository, UITableViewDataSource, UITableViewDelegate
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

        $tableModel = new TableModel();
        $rawdataTables = $tableModel->getTable();

        // UITableView
        $customTables = $this->datasource($rawdataTables);
        $tableTable = $this->tableView($customTables);

        $this->params['title'] = 'Mesas';
        $this->params['data'] = $tableTable;
        $this->params['header'] = $this->willDisplayHeaderView();

        Flight::render('table/index', $this->params, 'body_content');
        Flight::render('_layout/template');
    }

	public function create()
    {
        $this->params['title'] = 'Nuevo Usuario';
        $this->params['form'] = $this->form();

        if (isset($_POST['firstname'])) {
            $data = Flight::request()->data->getData();

            $guestModel = new UserModel();
            $guestModel->firstname = Flight::request()->data->firstname; // $data['firstname'];
            $guestModel->lastname = Flight::request()->data->lastname;
            $guestModel->email = Flight::request()->data->email;
            $guestModel->passwd = Flight::request()->data->passwd;
            $guestModel->type = Flight::request()->data->type;
            $guestModel->active = 1;
            $guestModel->deleted = 0;
            $response = $guestModel->createUser();

            $this->params['data'] = $data;

            if (!empty($response['error']))
                $this->params['error'] = $response['error'];

            if ($response['success'])
                Flight::redirect('/dashboard/user');
        }

        Flight::render('_partials/form/index', $this->params, 'body_content');
        Flight::render('_layout/template');
    }

    public function update($id)
    {
        $data = array();
        $this->params['title'] = 'Editar Usuario';
        $this->params['form'] = $this->form(self::EDIT);

        $guestModel = new UserModel($id);
        $data = (array)$guestModel;

        if (isset($_POST['firstname'])) {
            $data = Flight::request()->data->getData();
            $guestModel->firstname = Flight::request()->data->firstname; // $data['firstname'];
            $guestModel->lastname = Flight::request()->data->lastname;
            $guestModel->email = Flight::request()->data->email;
            $guestModel->passwd = Flight::request()->data->passwd;
            $guestModel->type = Flight::request()->data->type;
            $guestModel->active = 1;
            $guestModel->deleted = 0;
            $response = $guestModel->updateUser($id);

            if (!empty($response['error']))
                $this->params['error'] = $response['error'];

            if ($response['success'])
                Flight::redirect('/dashboard/user');
        }


        $this->params['data'] = $data;

        Flight::render('_partials/form/index', $this->params, 'body_content');
        Flight::render('_layout/template');

    }

    public function delete($id)
    {
        $oUserModel = new UserModel($id);
        $oUserModel->delete();
        Flight::redirect('/dashboard/user');
    }

    public function form($viewForm = null)
    {
        $oUserTypeModel = new UserTypeModel();
        $form = array();
        $form[] = array(
            'label' => 'Nombres',
            'name' => 'firstname',
            'type' => 'text',
        );

        $form[] = array(
            'label' => 'Apellidos',
            'name' => 'lastname',
            'type' => 'text',
        );

        $form[] = array(
            'label' => 'Email',
            'name' => 'email',
            'type' => 'email',
        );

        if ($viewForm != self::EDIT) {
            $form[] = array(
                'label' => 'Contraseña',
                'name' => 'passwd',
                'type' => 'password',
            );
        }

        $form[] = array(
            'label' => 'Tipo',
            'name' => 'type',
            'type' => 'select',
            'options' => $oUserTypeModel->getUserTypeModel(),
        );

        return $form;
    }

    /**
     * UITableViewDataSource
     */

    public function datasource($rawdataTables)
    {
        return array_map(function($table){
            $data = array(
                $table['id_tables'],
                $table['table_number'],
                $table['qyt_tickets'],
            );
            return $data;
        }, $rawdataTables);
    }

    public function tableView($tables)
    {
        $tableModel = new TableModel();
        return $tableModel->getPagination($tables);
    }

    /**
     * UITableViewDelegate
     */
    public function willDisplayHeaderView()
    {
        return array(
            'id',
            'Numero de mesa',
            'Cantidad de pases',
        );
    }
}

$oTableController = new TableController();
Flight::route('GET|POST /dashboard/table', array($oTableController, 'index'));
Flight::route('GET|POST /dashboard/table/new', array($oTableController, 'create'));
Flight::route('GET|POST /dashboard/table/edit/@id', array($oTableController, 'update'));
Flight::route('GET|POST /dashboard/table/delete/@id', array($oTableController, 'delete'));


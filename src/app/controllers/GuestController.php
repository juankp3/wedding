<?php
require_once dirname(__FILE__).'/../../models/GuestModel.php';
class GuestController extends FrontController implements Repository, UITableViewDataSource, UITableViewDelegate
{

    public function __construct()
    {
        $this->name = 'guest';
        parent::__construct();
    }

    /**
     * Repository
     */
    public function index()
    {

        $guestModel = new GuestModel();
        $rawdataGuests = $guestModel->getGuest();

        // UITableView
        $customGuests = $this->datasource($rawdataGuests);
        $userTable = $this->tableView($customGuests);

        $this->params['title'] = 'Usuarios';
        $this->params['data'] = $userTable;
        $this->params['header'] = $this->willDisplayHeaderView();

        Flight::render('user/index', $this->params, 'body_content');
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

    public function datasource($rawdataGuests)
    {
        return array_map(function($guest){
            $data = array(
                $guest['id_guest'],
                $guest['names'],
                $guest['qyt_tickets'],
                $guest['confirmation'],
                $guest['phone'],
                // $guest['active'],
            );
            return $data;
        }, $rawdataGuests);
    }

    public function tableView($users)
    {
        $guestModel = new UserModel();
        return $guestModel->getPagination($users);
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
            'Email',
            'Tipo',
            'Activo',
        );
    }
}

$oGuestController = new GuestController();
Flight::route('GET|POST /dashboard/guest', array($oGuestController, 'index'));
Flight::route('GET|POST /dashboard/guest/new', array($oGuestController, 'create'));
Flight::route('GET|POST /dashboard/guest/edit/@id', array($oGuestController, 'update'));
Flight::route('GET|POST /dashboard/guest/delete/@id', array($oGuestController, 'delete'));


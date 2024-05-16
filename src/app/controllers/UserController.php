<?php
class UserController extends FrontController implements Repository, UITableViewDataSource, UITableViewDelegate
{

    public function __construct()
    {
        $this->name = 'user';
        parent::__construct();
    }

    /**
     * Repository
     */
    public function index()
    {
        $userModel = new UserModel();
        $rawdataUsers = $userModel->getUsers();

        // UITableView
        $customUsers = $this->datasource($rawdataUsers);
        $userTable = $this->tableView($customUsers);

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

            $userModel = new UserModel();
            $userModel->firstname = Flight::request()->data->firstname; // $data['firstname'];
            $userModel->lastname = Flight::request()->data->lastname;
            $userModel->email = Flight::request()->data->email;
            $userModel->passwd = Flight::request()->data->passwd;
            $userModel->type = Flight::request()->data->type;
            $userModel->active = 1;
            $userModel->deleted = 0;
            $response = $userModel->createUser();

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

        $userModel = new UserModel($id);
        $data = (array)$userModel;

        if (isset($_POST['firstname'])) {
            $data = Flight::request()->data->getData();
            $userModel->firstname = Flight::request()->data->firstname; // $data['firstname'];
            $userModel->lastname = Flight::request()->data->lastname;
            $userModel->email = Flight::request()->data->email;
            $userModel->passwd = Flight::request()->data->passwd;
            $userModel->type = Flight::request()->data->type;
            $userModel->active = 1;
            $userModel->deleted = 0;
            $response = $userModel->updateUser($id);

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

    public function datasource($rawdataUsers)
    {
        return array_map(function($user){
            $data = array(
                $user['id_user'],
                $user['firstname'],
                $user['lastname'],
                $user['email'],
                $user['type'],
                $user['active'],
            );
            return $data;
        }, $rawdataUsers);
    }

    public function tableView($users)
    {
        $userModel = new UserModel();
        return $userModel->getPagination($users);
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

$oUserController = new UserController();
Flight::route('GET|POST /dashboard/user', array($oUserController, 'index'));
Flight::route('GET|POST /dashboard/user/new', array($oUserController, 'create'));
Flight::route('GET|POST /dashboard/user/edit/@id', array($oUserController, 'update'));
Flight::route('GET|POST /dashboard/user/delete/@id', array($oUserController, 'delete'));

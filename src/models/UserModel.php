<?php
require_once dirname(__FILE__) . '/Model.php';
require_once dirname(__FILE__) . '/UserTypeModel.php';

class UserModel extends Model
{
    public $id;
    public $firstname;
    public $lastname;
    public $email;
    public $passwd;
    public $type; // 'superadmin','admin','seller'
    public $active;
    public $deleted;
    public $date_add;
    public $date_upd;
    public $definition = array(
        'table' => 'user',
        'primary' => 'id_user',
        'fields' => array(
        ),
    );

    protected $table;

    public function __construct($id_user = null)
    {
        parent::__construct($id_user);
        $this->table = $this->definition['table'];
    }

    public function isLogin()
    {
        $query = "SELECT * FROM " . $this->table;
        $query.= " WHERE email='" . $this->email . "' and passwd='" . md5($this->passwd) . "'";

        $user = $this->getRow($query);
        if ($user) {
            $this->id = $user['id_user'];
            $this->firstname = $user['firstname'];
            $this->lastname = $user['lastname'];
            $this->type = $user['type'];
            $this->active = $user['active'];
        }

        return empty($user) ? false : true;
    }

    public function login()
    {
        $response = array();
        try {
            if (empty($this->isLogin())) {
                throw new Exception("usuario o contraseña incorrecta");
            }
            $user = $this->getDataById($this->id);
            unset($user['passwd']);
            $data['data'] = $user;
            $data['message'] = "Login correcto";
            $response = HttpResponse::success($data);

            return $response;

        } catch (Exception $e) {

            $data['message'] = $e->getMessage();
            $response = HttpResponse::error($data);

            return $response;
        }
    }

    public function getUsers($offset = null, $limit = null)
    {
        $table = $this->definition['table'];
        $query = "SELECT * from $table order by id_user desc";

        if (isset($offset) && isset($limit)) {
            $query.= " limit $offset, $limit";
        }

        return $this->executeS($query);
    }

    public function getUserByEmail($email)
    {
        $table = $this->definition['table'];
        $query = "SELECT * from $table WHERE email = '$email'";
        return $this->getRow($query);
    }

    public function add($data)
    {
        $cn = new Conexion();
        if ($cn->insert($this->definition['table'], $data)){
            return $this->getLastId($this);
        }

        return 0;
    }

    public function validateUser()
    {
        $error = array();
        if (empty($this->firstname))
            $error['firstname'] = "Ingrese nombre del usuario";

        if (empty($this->lastname))
            $error['lastname'] = "Ingrese nombre del apellido";

        if (empty($this->passwd))
            $error['passwd'] = "Ingrese nombre del password";

        $userTypeModel = new UserTypeModel();
        if (!$userTypeModel->validateUserType($this->type))
            $error['type'] = "Tipo de usuario no válido";


        if (!empty($this->getUserByEmail($this->email)))
            $error['email'] = "Este correo ya esta en uso";

        return $error;
    }

    public function createUser()
    {
        $response = array();
        try {
            $error = $this->validateUser();
            $this->passwd = md5($this->passwd);

            if(count($error) > 0) {
                $errorResponse['success'] = false;
                $errorResponse['error']['fields'] = $error;
                return $errorResponse;
            }

            if ($this->save()) {
                $id = $this->getLastId();
                $response['success'] = true;
                $response['data'] = $this->getDataById($id);
            }
            return $response;

        } catch (Exception $e) {
            $response['success'] = false;
            $response['error']['message'] = $e->getMessage();

            return $response;
        }
    }

    public function updateUser($id)
    {
        $response = array();
        try {
            $error = array();
            if (empty($this->firstname))
                $error['firstname'] = "Ingrese nombre del usuario";

            if (empty($this->lastname))
                $error['lastname'] = "Ingrese nombre del apellido";

            $userTypeModel = new UserTypeModel();
            if (!$userTypeModel->validateUserType($this->type))
                $error['type'] = "Tipo de usuario no válido";

            if(count($error) > 0) {
                $errorResponse['success'] = false;
                $errorResponse['error']['fields'] = $error;
                return $errorResponse;
            }

            if ($this->update()) {
                $id = $this->getLastId();
                $response['success'] = true;
                $response['data'] = $this->getDataById($id);
            }
            return $response;

        } catch (Exception $e) {
            $response['success'] = false;
            $response['error']['message'] = $e->getMessage();

            return $response;
        }
    }
}

<?php
require_once dirname(__FILE__) . '/Model.php';
require_once dirname(__FILE__) . '/UserTypeModel.php';

class CustomerModel extends Model
{
    public $id;
    public $firstname;
    public $lastname;
    public $email;
    public $dni;
    public $date_add;
    public $date_upd;
    public $definition = array(
        'table' => 'customer',
        'primary' => 'id_customer',
        'fields' => array(
        ),
    );

    protected $table;

    public function __construct($id_customer = null)
    {
        parent::__construct($id_customer);
        $this->table = $this->definition['table'];
    }

    public function getCustomers($offset = null, $limit = null)
    {
        $table = $this->definition['table'];
        $query = "SELECT * from $table order by id_customer desc";

        if (isset($offset) && isset($limit)) {
            $query.= " limit $offset, $limit";
        }

        return $this->executeS($query);
    }

    public function add($data)
    {
        $cn = new Conexion();
        if ($cn->insert($this->definition['table'], $data)){
            return $this->getLastId($this);
        }

        return 0;
    }

    public function getDataByIdCustomer($idCustomer)
    {
        $query = "SELECT * FROM ". $this->table . " WHERE id_customer = '$idCustomer'";
        return $this->getRow($query);
    }

    public function getCustomerByEmail($email)
    {
        $table = $this->definition['table'];
        $query = "SELECT * from $table WHERE email = '$email'";
        return $this->getRow($query);
    }

    public function validateCustomer()
    {
        $error = array();
        if (empty($this->firstname))
            $error['firstname'] = "Ingrese nombre del cliente";

        if (empty($this->lastname))
            $error['lastname'] = "Ingrese apellido del cliente";

        if (empty($this->email))
            $error['email'] = "Ingrese email del cliente";

        if (empty($this->dni))
            $error['dni'] = "Ingrese dni del cliente";

        if (!empty($this->getCustomerByEmail($this->email)))
            $error['email'] = "Este correo ya esta en uso";

        return $error;
    }

    public function createCustomer()
    {
        $response = array();
        try {
            $error = $this->validateCustomer();
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

}

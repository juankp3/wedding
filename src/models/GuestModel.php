<?php
require_once dirname(__FILE__) . '/Model.php';

class GuestModel extends Model
{
    public $id;
    public $id_event;
    public $names;
    public $qyt_tickets;
    public $confirmation;
    public $phone;
    public $qr;
    public $wsp_calltoaction;
    public $openinvitation_calltoaction;
    public $openinvitation_lastdate;
    public $deleted;
    public $date_add;
    public $date_upd;
    public $definition = array(
        'table' => 'guest',
        'primary' => 'id_guest',
        'fields' => array(
        ),
    );

    protected $table;

    public function __construct($id_guest = null)
    {
        parent::__construct($id_guest);
        $this->table = $this->definition['table'];
    }

    public function getGuest($offset = null, $limit = null)
    {
        $table = $this->definition['table'];
        $query = "SELECT * from $table order by id_guest desc";

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

    public function validateGuest()
    {
        $error = array();
        if (empty($this->firstname))
            $error['firstname'] = "Ingrese nombre del usuario";

        if (empty($this->lastname))
            $error['lastname'] = "Ingrese nombre del apellido";

        if (empty($this->passwd))
            $error['passwd'] = "Ingrese nombre del password";

        return $error;
    }

    public function createGuest()
    {
        $response = array();
        try {
            $error = $this->validateGuest();

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

    public function updateGuest($id)
    {
        $response = array();
        try {
            $error = array();
            if (empty($this->firstname))
                $error['firstname'] = "Ingrese nombre del usuario";

            if (empty($this->lastname))
                $error['lastname'] = "Ingrese nombre del apellido";

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

<?php
require_once dirname(__FILE__) . '/Model.php';

class TableModel extends Model
{
    public $id;
    public $id_event;
	public $id_guest;
    public $table_number;
    public $qyt_tickets;
    public $deleted;
    public $date_add;
    public $date_upd;
    public $definition = array(
        'table' => 'tables',
        'primary' => 'id_tables',
        'fields' => array(
        ),
    );

    protected $table;

    public function __construct($id_tables = null)
    {
        parent::__construct($id_tables);
        $this->table = $this->definition['table'];
    }

    public function getTable($offset = null, $limit = null)
    {
        $table = $this->definition['table'];
        $query = "SELECT * from $table order by id_tables desc";

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

    public function validateTable()
    {
        $error = array();
        if (empty($this->firstname))
            $error['table_number'] = "Ingrese el numero de mesa";

        if (empty($this->lastname))
            $error['qyt_tickets'] = "Ingrese la cantidad de pases";

        return $error;
    }

    public function createTable()
    {
        $response = array();
        try {
            $error = $this->validateTable();

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

    public function updateTable($id)
    {
        $response = array();
        try {
            $error = array();
            if (empty($this->table_number))
                $error['table_number'] = "Ingrese el numero de mesa";

            if (empty($this->qyt_tickets))
                $error['qyt_tickets'] = "Ingrese la cantidad de pases";

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

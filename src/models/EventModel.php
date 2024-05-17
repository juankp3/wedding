<?php
require_once dirname(__FILE__) . '/Model.php';

class EventModel extends Model
{
    public $id;
    public $id_user;
    public $name;
    public $description;
    public $category;
    public $template;
    public $msj_template;
    public $uri;
    public $json;
    public $qty_table;
    public $active;
    public $deleted;
    public $date_add;
    public $date_upd;

    public $definition = array(
        'table' => 'event',
        'primary' => 'id_event',
        'fields' => array(
        ),
    );

    protected $table;

    public function __construct($id_event = null)
    {
        parent::__construct($id_event);
        $this->table = $this->definition['table'];
    }

    public function getEvent($offset = null, $limit = null)
    {
        $table = $this->definition['table'];
        $query = "SELECT * from $table order by id_event desc";

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

    public function validateEvent()
    {
        $error = array();
        if (empty($this->name))
            $error['name'] = "Ingrese un nombre";

        if (empty($this->category))
            $error['category'] = "Ingrese una categoria";

        if (empty($this->template))
            $error['template'] = "Ingrese una plantilla";

        if (empty($this->id_user))
            $error['id_user'] = "Ingrese un usuario";

        return $error;
    }

    public function createEvent()
    {
        $response = array();
        try {
            $error = $this->validateEvent();

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

    public function updateEvent($id)
    {
        $response = array();
        try {
            $error = array();
			$error = $this->validateEvent();

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

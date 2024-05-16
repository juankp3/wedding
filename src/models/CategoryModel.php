<?php
require_once dirname(__FILE__) . '/Model.php';
require_once dirname(__FILE__) . '/UserTypeModel.php';

class CategoryModel extends Model
{
    public $id;
    public $name;
    public $description;
    public $date_add;
    public $date_upd;
    public $definition = array(
        'table' => 'category',
        'primary' => 'id_category',
        'fields' => array(
        ),
    );

    protected $table;

    public function __construct($id_category = null)
    {
        parent::__construct($id_category);
        $this->table = $this->definition['table'];
    }

    public function getCategories($offset = null, $limit = null)
    {
        $table = $this->definition['table'];
        $query = "SELECT * from $table order by id_category desc";

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

    public function getDataByIdCategory($idCategory)
    {
        $query = "SELECT * FROM ". $this->table . " WHERE id_category = '$idCategory'";
        return $this->getRow($query);
    }

    public function isCategoryExist()
    {
        $table = $this->definition['table'];
        $query = "SELECT * from $table WHERE name = '".$this->name."'";

        return ($this->executeS($query))? true : false;
    }

    public function validateCategory()
    {
        $error = array();
        if (empty($this->name))
            $error['name'] = "Ingrese nombre de la categoria";

        if (empty($this->description))
            $error['description'] = "Ingrese descripcion de la categoria";

        if ($this->isCategoryExist())
            $error['name'] = "El nombre de esta categoria ya fue ingresado";

        return $error;
    }

    public function createCategory()
    {
        $response = array();
        try {
            $error = $this->validateCategory();
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

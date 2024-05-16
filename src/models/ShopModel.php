<?php
require_once dirname(__FILE__) . '/Model.php';
require_once dirname(__FILE__) . '/UserTypeModel.php';

class ShopModel extends Model
{
    public $id;
    public $name;
    public $ruc;
    public $address;
    public $date_add;
    public $date_upd;
    public $definition = array(
        'table' => 'shop',
        'primary' => 'id_shop',
        'fields' => array(
        ),
    );

    protected $table;

    public function __construct($id_shop = null)
    {
        parent::__construct($id_shop);
        $this->table = $this->definition['table'];
    }

    public function getShops($offset = null, $limit = null)
    {
        $table = $this->definition['table'];
        $query = "SELECT * from $table order by id_shop desc";

        if (isset($offset) && isset($limit)) {
            $query.= " limit $offset, $limit";
        }

        return $this->executeS($query);
    }

    public function isStoreExist()
    {
        $table = $this->definition['table'];
        $query = "SELECT * from $table WHERE name = '".$this->name."'";

        return ($this->executeS($query))? true : false;
    }

    public function validateShop()
    {
        $error = array();
        if (empty($this->name))
            $error['name'] = "Ingrese nombre de la tienda";

        if (empty($this->ruc))
            $error['ruc'] = "Ingrese ruc";

        if (empty($this->address))
            $error['address'] = "Ingrese direccion";

        if ($this->isStoreExist())
            $error['name'] = "El nombre de esta tienda ya fue ingresado";

        return $error;
    }

    public function createShop()
    {
        $response = array();
        try {
            $error = $this->validateShop();
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

    public function updateShop($id)
    {
        $response = array();
        try {
            // $error = $this->validateShop();
            $error = array();
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

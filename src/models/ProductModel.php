<?php
require_once dirname(__FILE__) . '/Model.php';
require_once dirname(__FILE__) . '/UserTypeModel.php';

class ProductModel extends Model
{
    public $id;
    public $name;
    public $price;
    public $barcode;
    public $id_shop;
    //public $id_category;
    //public $active;
    public $date_add;
    public $date_upd;
    public $definition = array(
        'table' => 'product',
        'primary' => 'id_product',
        'fields' => array(
        ),
    );

    protected $table;

    public function __construct($id_product = null)
    {
        parent::__construct($id_product);
        $this->table = $this->definition['table'];
    }

    public function getProducts($offset = null, $limit = null)
    {
        $table = $this->definition['table'];
        $query = "SELECT * from $table order by id_product desc";

        if (isset($offset) && isset($limit)) {
            $query.= " limit $offset, $limit";
        }

        return $this->executeS($query);
    }



    public function getDataByBarcode($barcode)
    {
        $query = "SELECT * FROM ". $this->table . " WHERE barcode = '$barcode'";
        return $this->getRow($query);
    }

    public function isProductExist()
    {
        $table = $this->definition['table'];
        $query = "SELECT * from $table WHERE name = '".$this->name."'";

        return ($this->executeS($query))? true : false;
    }

    public function validateProduct()
    {
        $error = array();
        if (empty($this->name))
            $error['name'] = "Ingrese nombre del producto";

        if (empty($this->price))
            $error['price'] = "Ingrese el precio";

        if (empty($this->barcode))
            $error['barcode'] = "Ingrese el codigo de barra";

        /*if (empty($this->id_category))
            $error['id_category'] = "Ingrese la categoria del producto";

        if (empty($this->active))
            $error['active'] = "Ingrese si esta activado el producto";
        */
        if ($this->isProductExist())
            $error['name'] = "El nombre de este producto ya fue ingresado";

        return $error;
    }

    public function createProduct()
    {
        $response = array();
        try {
            $error = $this->validateProduct();
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

<?php
require_once dirname(__FILE__) . '/Model.php';
require_once dirname(__FILE__) . '/UserTypeModel.php';

class OrderModel extends Model
{
    public $id;
    public $id_cart;
    public $id_payment;
    public $id_shop;
    public $id_user;
    public $id_customer;
    public $total_paid;
    public $total_products;
    public $total_paid_tax_incl;
    public $total_paid_tax_excl;
    public $total_discount_tax_excl;
    public $total_discount_tax_incl;
    public $note;
    public $date_add;
    public $date_upd;
    public $definition = array(
        'table' => 'orders',
        'primary' => 'id_order',
        'fields' => array(
        ),
    );

    private $table;

    public function __construct($id_order = null)
    {
        parent::__construct($id_order);
        $this->table = $this->definition['table'];
    }

    public function getOrders($offset = null, $limit = null)
    {
        $table = $this->definition['table'];
        $query = "SELECT * from $table";

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

    public function getDataByIdOrder($idOrder)
    {
        $query = "SELECT * FROM ". $this->table . " WHERE id_order = '$idOrder'";
        return $this->getRow($query);
    }

}

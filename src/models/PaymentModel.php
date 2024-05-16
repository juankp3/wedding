<?php
require_once dirname(__FILE__) . '/Model.php';
require_once dirname(__FILE__) . '/UserTypeModel.php';

class PaymentModel extends Model
{
    public $id;
    public $name;
    public $date_add;
    public $date_upd;
    public $definition = array(
        'table' => 'payment',
        'primary' => 'id_payment',
        'fields' => array(
        ),
    );

    protected $table;

    public function __construct($id_payment = null)
    {
        parent::__construct($id_payment);
        $this->table = $this->definition['table'];
    }

    public function getPayments($offset = null, $limit = null)
    {
        $table = $this->definition['table'];
        $query = "SELECT * from $table order by id_payment desc";

        if (isset($offset) && isset($limit)) {
            $query.= " limit $offset, $limit";
        }

        return $this->executeS($query);
    }

    public function isPaymentExist()
    {
        $table = $this->definition['table'];
        $query = "SELECT * from $table WHERE name = '".$this->name."'";

        return ($this->executeS($query))? true : false;
    }

    public function validatePayment()
    {
        $error = array();
        if (empty($this->name))
            $error['name'] = "Ingrese nombre del metodo de pago";

        if ($this->isPaymentExist())
            $error['name'] = "El nombre de este metodo de pago ya fue ingresado";

        return $error;
    }

    public function createPayment()
    {
        $response = array();
        try {
            $error = $this->validatePayment();
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

    public function updatePayment($id)
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

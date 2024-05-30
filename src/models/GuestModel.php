<?php
require_once dirname(__FILE__) . '/Model.php';

class GuestModel extends Model
{
    public $id;
    public $id_event;
    public $id_guest_parent;
    public $name;
    public $qyt_tickets;
    public $confirmation;
    public $phone;
    public $token;
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

	public function getTotal()
	{
		$table = $this->definition['table'];
		$query = "select sum(qyt_tickets) as cantidad from $table where deleted = 0";

		return $this->executeRowQuery($query);
	}

	public function getTotalConfirm()
	{
		$table = $this->definition['table'];
		$query = "select * from $table where confirmation = 'confirmed' and deleted = 0";
		return $this->execute($query);
	}

	public function getTotalPending()
	{
		$table = $this->definition['table'];
		$query = "select * from $table where confirmation = 'pending' and deleted = 0";
		return $this->execute($query);
	}

	public function getTotalCancelled()
	{
		$table = $this->definition['table'];
		$query = "select * from $table where confirmation = 'cancelled' and deleted = 0";
		return $this->execute($query);
	}

    public function getGuest($offset = null, $limit = null)
    {
        $table = $this->definition['table'];
        $query = "SELECT * from $table
                  WHERE id_guest_parent = 0 AND deleted = 0
                  ORDER BY id_guest desc";

        if (isset($offset) && isset($limit)) {
            $query.= " limit $offset, $limit";
        }

        return $this->executeS($query);
    }

	public function getGuestByToken($token)
	{
		$table = $this->definition['table'];
		$query = "SELECT * from $table WHERE token = '$token'";
		return $this->getRow($query);
	}

    public function deleteGuestByParentId($guestParentId)
    {
        $table = $this->definition['table'];
        $query = "UPDATE $table SET deleted = 1
                  WHERE id_guest_parent =  $guestParentId ";

        return $this->executeNonQuery($query);
    }

    public function updateOpenInvitation($openinvitation, $token)
    {
        $table = $this->definition['table'];
        $query = "UPDATE $table SET openinvitation_calltoaction = $openinvitation , openinvitation_lastdate = now()
                WHERE token = '$token' ";

        return $this->executeNonQuery($query);
    }

    public function getGuestByParentId($guestParentId)
    {
        $table = $this->definition['table'];
        $query = "SELECT * from $table
                  WHERE id_guest_parent = $guestParentId AND deleted = 0
                  ORDER BY id_guest asc";

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
        if (empty($this->name))
            $error['name'] = "Ingrese nombre";

        // if (empty($this->qyt_tickets))
        //     $error['name'] = "Ingrese la cantidad de pases";

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
            $error = $this->validateGuest();

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

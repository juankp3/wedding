<?php
require_once dirname(__FILE__) . '/Model.php';

class WishesModel extends Model
{
    public $id;
    public $id_guest;
    public $message;
    public $active;
    public $deleted;
    public $date_add;
    public $date_upd;
    public $definition = array(
        'table' => 'wishes',
        'primary' => 'id_wishes',
        'fields' => array(
        ),
    );

	protected $table;

    public function __construct($id_wishes = null)
    {
        parent::__construct($id_wishes);
        $this->table = $this->definition['table'];
    }

	public function getWishes($offset = null, $limit = null)
	{
		$table = $this->definition['table'];
		$query = "SELECT w.id_wishes, w.id_guest, w.message, w.active, w.deleted,
				date_format(w.date_add, '%d/%m/%Y') as date_add , w.date_upd, g.name
				FROM $table w
				LEFT JOIN guest g on w.id_guest = g.id_guest
				WHERE w.deleted = 0
				ORDER BY id_wishes desc";

		if (isset($offset) && isset($limit)) {
			$query .= " limit $offset, $limit";
		}

		return $this->executeS($query);
	}


}

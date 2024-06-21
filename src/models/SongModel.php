<?php
require_once dirname(__FILE__) . '/Model.php';

class SongModel extends Model
{

	public $id;
    public $id_guest;
	public $id_songs;
	public $id_event;
    public $date_add;
    public $date_upd;
    public $definition = array(
        'table' => 'guest_songs',
        'primary' => 'id_guest_songs',
        'fields' => array(
        ),
    );

	protected $table;

    public function __construct($id_guest_songs = null)
    {
        parent::__construct($id_guest_songs);
        $this->table = $this->definition['table'];
    }

	public function getSongs($offset = null, $limit = null)
	{
		$table = $this->definition['table'];
		$query = 	"SELECT gs.* ,s.name as cancion , g.name as invitado
					FROM guest_songs gs
					LEFT JOIN guest g ON g.id_guest = gs.id_guest
					LEFT JOIN songs s ON gs.id_songs = s.id_songs
					WHERE gs.id_event = 1";

		if (isset($offset) && isset($limit)) {
			$query .= " limit $offset, $limit";
		}

		return $this->executeS($query);
	}

	public function getSuggestedSongsByEventId($eventId)
	{
		// $query = "SELECT s.id_songs, s.name, count(*) as 'cant'
		// 		FROM guest_songs gs
		// 		LEFT JOIN songs s ON gs.id_songs = s.id_songs
		// 		WHERE gs.id_event = $eventId
		// 		group by s.id_songs;";
		$query = "SELECT s.id_songs, s.name,
				(SELECT count(*)  from guest_songs gs
				WHERE gs.id_event = $eventId and gs.id_songs = s.id_songs) as 'cant'
				FROM songs s
				group by s.id_songs;";

		return $this->executeS($query);
	}

}

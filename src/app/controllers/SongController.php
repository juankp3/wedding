<?php

require_once dirname(__FILE__).'/../../models/SongModel.php';

class SongController extends FrontController
{

    public function __construct()
    {
        $this->name = 'songs';
        parent::__construct();
    }

    /**
     * Repository
     */
    public function index()
    {
		$songModel = new SongModel();
        $rawdata = $songModel->getSongs();

		$ids = array_column($rawdata, 'id_guest_songs');
		$rawdataSongs = array_combine($ids, $rawdata);

		// UITableView
        $customSongs = $this->datasource($rawdataSongs);
        $userTable = $this->tableView($customSongs);

		$this->params['title'] = 'Canciones Sugeridas';
        $this->params['raw'] = $rawdataSongs;
		$this->params['data'] = $userTable;
        $this->params['header'] = $this->willDisplayHeaderView();

        Flight::render('songs/index', $this->params, 'body_content');
        Flight::render('_layout/template');
    }

	public function datasource($rawdataSongs)
    {
        return array_map(function($songs){
            $data = array(
                $songs['id_guest_songs'],
                $songs['cancion'],
                $songs['invitado'],
            );
            return $data;
        }, $rawdataSongs);
    }

	public function tableView($songs)
    {
        $songModel = new SongModel();
        return $songModel->getPagination($songs);
    }

	/**
     * UITableViewDelegate
     */
    public function willDisplayHeaderView()
    {
        return array(
            'id',
            'Canciones',
            'Invitado',
        );
    }

}

$oSongController = new SongController();
Flight::route('GET|POST /dashboard/songs', array($oSongController, 'index'));



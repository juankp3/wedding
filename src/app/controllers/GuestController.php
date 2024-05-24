<?php
require_once dirname(__FILE__).'/../../models/GuestModel.php';
require_once dirname(__FILE__).'/../../models/EventModel.php';
class GuestController extends FrontController implements Repository, UITableViewDataSource, UITableViewDelegate
{

    public function __construct()
    {
        $this->name = 'guest';
        parent::__construct();
    }

    /**
     * Repository
     */
    public function index()
    {

        $guestModel = new GuestModel();
        $rawdataGuests = $guestModel->getGuest();

        // UITableView
        $customGuests = $this->datasource($rawdataGuests);
        $userTable = $this->tableView($customGuests);

        $this->params['title'] = 'Invitados';
        $this->params['data'] = $userTable;
        $this->params['header'] = $this->willDisplayHeaderView();

        Flight::render('guest/index', $this->params, 'body_content');
        Flight::render('_layout/template');
    }

	public function getIdEvent()
    {
		$id_user = $this->loggedInUser['id_user'];
		$eventModel = new EventModel();
		$event = $eventModel->getActiveEvent($id_user);
		$id_event = $event['id_event'];
		return $id_event;
	}

    public function create()
    {
        $this->params['title'] = 'Nuevo Invitado';
        $this->params['form'] = $this->form();

        if (isset($_POST['names'])) {
            $data = Flight::request()->data->getData();

			$guestModel = new GuestModel();
            $guestModel->names = Flight::request()->data->names; // $data['firstname'];
            $guestModel->qyt_tickets = Flight::request()->data->qyt_tickets;
            $guestModel->phone = Flight::request()->data->phone;
            $guestModel->deleted = 0;
            $guestModel->confirmation = 'pending';
            $guestModel->id_event = $this->getIdEvent();
            $response = $guestModel->createGuest();

            $this->params['data'] = $data;

            if (!empty($response['error']))
                $this->params['error'] = $response['error'];

            if ($response['success'])
                Flight::redirect('/dashboard/guest');
        }

        Flight::render('_partials/form/index', $this->params, 'body_content');
        Flight::render('_layout/template');
    }

    public function update($id)
    {
        $data = array();
        $this->params['title'] = 'Editar Usuario';
        $this->params['form'] = $this->form(self::EDIT);

        $guestModel = new GuestModel($id);
        $data = (array)$guestModel;

        if (isset($_POST['names'])) {
            $data = Flight::request()->data->getData();
			$guestModel->names = Flight::request()->data->names; // $data['firstname'];
            $guestModel->qyt_tickets = Flight::request()->data->qyt_tickets;
            $guestModel->phone = Flight::request()->data->phone;
            $guestModel->deleted = 0;
            $guestModel->id_event = $this->getIdEvent();
            $response = $guestModel->updateGuest($id);

            if (!empty($response['error']))
                $this->params['error'] = $response['error'];

            if ($response['success'])
                Flight::redirect('/dashboard/guest');
        }

        $this->params['data'] = $data;

        Flight::render('_partials/form/index', $this->params, 'body_content');
        Flight::render('_layout/template');
    }

    public function delete($id)
    {
		$guestModel = new GuestModel($id);
        $guestModel->delete();
        Flight::redirect('/dashboard/guest');
    }

    public function form($viewForm = null)
    {
        $form = array();
        $form[] = array(
            'label' => 'Nombre',
            'name' => 'names',
            'type' => 'text',
        );

        $form[] = array(
            'label' => 'Telefono',
            'name' => 'phone',
            'type' => 'text',
        );

        $form[] = array(
            'label' => 'Cantidad de pases',
            'name' => 'qyt_tickets',
            'type' => 'select',
            'options' => array(
				0 => 0,
				1 => 1,
				2 => 2,
				3 => 3,
				4 => 4,
				5 => 5,
			),
        );

        return $form;
    }

    /**
     * UITableViewDataSource
     */

    public function datasource($rawdataGuests)
    {
        return array_map(function($guest){
            $data = array(
                $guest['id_guest'],
                $guest['names'],
                $guest['qyt_tickets'],
                $guest['confirmation'],
                $guest['phone'],
                // $guest['active'],
            );
            return $data;
        }, $rawdataGuests);
    }

    public function tableView($users)
    {
        $guestModel = new UserModel();
        return $guestModel->getPagination($users);
    }

    /**
     * UITableViewDelegate
     */
    public function willDisplayHeaderView()
    {
        return array(
            'id',
            'Nombre',
            'Cantidad',
            'Estado',
            'Telefono',
            // 'Activo',
        );
    }
}

$oGuestController = new GuestController();
Flight::route('GET|POST /dashboard/guest', array($oGuestController, 'index'));
Flight::route('GET|POST /dashboard/guest/new', array($oGuestController, 'create'));
Flight::route('GET|POST /dashboard/guest/edit/@id', array($oGuestController, 'update'));
Flight::route('GET|POST /dashboard/guest/delete/@id', array($oGuestController, 'delete'));

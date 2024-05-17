<?php
require_once dirname(__FILE__).'/../../models/EventModel.php';
class EventController extends FrontController implements Repository, UITableViewDataSource, UITableViewDelegate
{

    public function __construct()
    {
        $this->name = 'event';
        parent::__construct();
    }

    /**
     * Repository
     */
    public function index()
    {

		$eventModel = new EventModel();
        $rawdataGuests = $eventModel->getEvent();

        // UITableView
        $customGuests = $this->datasource($rawdataGuests);
        $eventTable = $this->tableView($customGuests);

        $this->params['title'] = 'Eventos';
        $this->params['data'] = $eventTable;
        $this->params['header'] = $this->willDisplayHeaderView();

        Flight::render('event/index', $this->params, 'body_content');
        Flight::render('_layout/template');
    }

    public function create()
    {
        $this->params['title'] = 'Nuevo Evento';
        $this->params['form'] = $this->form();

        if (isset($_POST['name'])) {
            $data = Flight::request()->data->getData();

            $eventModel = new EventModel();
            $eventModel->id_user = Flight::request()->data->id_user;
            $eventModel->name = Flight::request()->data->name; // $data['firstname'];
            $eventModel->description = Flight::request()->data->description;
            $eventModel->category = Flight::request()->data->category;
            $eventModel->template = Flight::request()->data->template;
            $eventModel->msj_template = Flight::request()->data->msj_template;
            $eventModel->uri = Flight::request()->data->uri;
            $eventModel->json = json_encode([]);
            $eventModel->qty_table = Flight::request()->data->qty_table;
            $eventModel->active = 1;
            $eventModel->deleted = 0;
            $response = $eventModel->createEvent();

            $this->params['data'] = $data;

            if (!empty($response['error']))
                $this->params['error'] = $response['error'];

            if ($response['success'])
                Flight::redirect('/dashboard/event');
        }

        Flight::render('_partials/form/index', $this->params, 'body_content');
        Flight::render('_layout/template');
    }

    public function update($id)
    {
        $data = array();
        $this->params['title'] = 'Editar Evento';
        $this->params['form'] = $this->form(self::EDIT);

		$eventModel = new EventModel($id);
        $data = (array)$eventModel;

        if (isset($_POST['name'])) {
            $data = Flight::request()->data->getData();
			$data['active'] = Flight::request()->data->active ? 1 : 0;

			$eventModel->id_user = Flight::request()->data->id_user;
            $eventModel->name = Flight::request()->data->name; // $data['firstname'];
            $eventModel->description = Flight::request()->data->description;
            $eventModel->category = Flight::request()->data->category;
            $eventModel->template = Flight::request()->data->template;
            $eventModel->msj_template = Flight::request()->data->msj_template;
            $eventModel->uri = Flight::request()->data->uri;
            $eventModel->json = json_encode([]);
            $eventModel->qty_table = Flight::request()->data->qty_table;
            $eventModel->active = Flight::request()->data->active ? 1 : 0;
            $eventModel->deleted = 0;
            $response = $eventModel->updateEvent($id);

            if (!empty($response['error']))
                $this->params['error'] = $response['error'];

            if ($response['success'])
                Flight::redirect('/dashboard/event');
        }


        $this->params['data'] = $data;

        Flight::render('_partials/form/index', $this->params, 'body_content');
        Flight::render('_layout/template');

    }

    public function delete($id)
    {
		$eventModel = new EventModel($id);
        $eventModel->delete();
        Flight::redirect('/dashboard/event');
    }

    public function form($viewForm = null)
    {
        $form = array();
        $form[] = array(
            'label' => 'Nombre',
            'name' => 'name',
            'type' => 'text',
        );

        $form[] = array(
            'label' => 'Descripción',
            'name' => 'description',
            'type' => 'text',
        );

        $form[] = array(
            'label' => 'Categoria',
            'name' => 'category',
            'type' => 'select',
            'options' => array(
				'boda' => 'Boda',
				'cumpleaños' => 'Cumpleaños',
				'quinceañero' => 'Quinceañero',
				'entierro' => 'Entierro',
			),
        );

		$form[] = array(
            'label' => 'Plantilla',
            'name' => 'template',
            'type' => 'select',
            'options' => array(
				'terracota' => 'Terracota',
			),
        );

		$form[] = array(
            'label' => 'Mensaje para los invitados',
            'name' => 'msj_template',
            'type' => 'text',
        );

		$form[] = array(
            'label' => 'Uri',
            'name' => 'uri',
            'type' => 'text',
        );

		$form[] = array(
            'label' => 'Cantidad de mesas',
            'name' => 'qty_table',
            'type' => 'select',
            'options' => array_combine(range(0, 20), range(0, 20)),
        );

		$userModel = new UserModel();
		$users = $userModel->getUsersByType(UserTypeModel::ADMIN);
		$result = array_reduce($users, function($carry, $user) {
			$carry[$user['id_user']] = $user['firstname'] . ' ' . $user['lastname'];
			return $carry;
		}, []);

		$form[] = array(
            'label' => 'Usuario',
            'name' => 'id_user',
            'type' => 'select',
            'options' => $result
        );

		$form[] = array(
            'label' => 'Estado',
            'name' => 'active',
            'type' => 'checkbox',
            'summary' => 'a If you are available for hire outside of the current situation, you can encourage others to hire you.',
            'options' => true
        );

        return $form;
    }

    /**
     * UITableViewDataSource
     */

    public function datasource($rawdataGuests)
    {
        return array_map(function($event){
            $data = array(
                $event['id_event'],
                $event['name'],
                $event['category'],
                $event['template'],
                $event['uri'],
                $event['qty_table'],
                $event['active'],
                // $event['active'],
            );
            return $data;
        }, $rawdataGuests);
    }

    public function tableView($events)
    {
        $eventModel = new UserModel();
        return $eventModel->getPagination($events);
    }

    /**
     * UITableViewDelegate
     */
    public function willDisplayHeaderView()
    {
        return array(
            'id',
            'Nombre',
            'Categoria',
            'Plantilla',
            'Uri',
            'Cant. Mesas',
            'Estado',
        );
    }
}

$oEventController = new EventController();
Flight::route('GET|POST /dashboard/event', array($oEventController, 'index'));
Flight::route('GET|POST /dashboard/event/new', array($oEventController, 'create'));
Flight::route('GET|POST /dashboard/event/edit/@id', array($oEventController, 'update'));
Flight::route('GET|POST /dashboard/event/delete/@id', array($oEventController, 'delete'));


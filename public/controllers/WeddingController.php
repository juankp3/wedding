<?php
require_once dirname(__FILE__) . '/../../src/models/GuestModel.php';
require_once dirname(__FILE__) . '/../../src/models/EventModel.php';
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

class WeddingController
{
    public function index()
    {

    }

	public function ajax()
    {
		$data = Flight::request()->data;

		if ($data['type'] == 'confirm'){
			return $this->confirm();
		}

		if ($data['type'] == 'cancel'){
			return $this->cancel();
		}

    }

	public function cancel()
	{
		$data = Flight::request()->data;
		Flight::json($data);
	}

    public function confirm()
    {
		$data = Flight::request()->data;
		$token = $data['token'];
		$url = BASE_URL . "/code?token=$token";

		foreach($data['result'] as $guest) {
			$guestModel = new GuestModel($guest['id']);
			$guestModel->confirmation = ($guest['status'] == 1) ? 'confirmed' : 'cancelled';
			$guestModel->date_upd = date("Y-m-d H:i:s");
			$guestModel->update();
		}

		$writer = new PngWriter();
		$qrCode = QrCode::create($url)
				->setSize(300);
		$result = $writer->write($qrCode);
		$result->saveToFile(APP_UPLOAD_FILE_RELATIVE . "/$token.png");

		$response['token'] = $token;

		Flight::json($response);
    }

	function renderTemplate($templatePath, $data = [])
	{
		extract($data);
		ob_start();
		include $templatePath;
		$content = ob_get_clean();
		return $content;
	}

    public function terracota()
    {
		$guestModel = new GuestModel();
		$params = array();
		$paramsUrl = Flight::request()->query->getData();

		$params['showQR'] = false;
		$guest = array();
		if (!empty($paramsUrl['token'])) {
			$params = $this->getDataGuest($paramsUrl['token']);
			$guest = $params['guest'];
		}
		// $params['title'] = 'Angelica y Luis';
		$params['og'] = $this->OpenGraphByGuest($guest);

		if (empty($paramsUrl['preview']) && !empty($paramsUrl['token'])) {
			$openinvitation = $params['guest']['openinvitation_calltoaction'] + 1;
			$guestModel->updateOpenInvitation($openinvitation, $paramsUrl['token']);
		}

        Flight::set('flight.views.path', 'public/templates/wedding/terracota');
        Flight::render('index', $params, 'body_content');
        Flight::render('_layout/template');
    }


	public function OpenGraphByGuest($guest = array())
	{
		$eventId = !empty($guest['id_event']) ? $guest['id_event'] : 1;
		$eventModel = new EventModel($eventId);

		$message = $eventModel->msj_template;
		$link = $_ENV['BASE_URL'] . "/boda/angelica-y-luis" . (!empty($guest['token']) ? '?token=' . $guest['token'] : '');
		$variables = array(
			'name' => !empty($guest['name']) ? $guest['name'] : '',
			'link' => $link
		);

		$response['title'] = $eventModel->name;
		$response['url'] = $link;
		$response['description'] = $this->replacePlaceholders($message, $variables);
		$response['image'] = DIST_IMG_URL . '/terracota/al/novios.png';

		return $response;
	}

	public function replacePlaceholders($message, $variables)
	{
		return preg_replace_callback('/\{(\w+)\}/', function ($matches) use ($variables) {
			return $variables[$matches[1]] ?? $matches[0];
		}, $message);
	}

	public function getDataGuest($token)
	{
		$params['showQR'] = true;
		$guestModel = new GuestModel();
		if (!empty($token)) {
			$params['token'] = $token;
			$params['guest']  = $guestModel->getGuestByToken($token);
			$params['guest']['items'] = $guestModel->getAditionalGuestById($params['guest']['id_guest']);

			$params['showQR'] = ($params['guest']['confirmation'] != 'cancelled') ? true : false;
			foreach ($params['guest']['items'] as $g) {
				if ($g['confirmation'] != 'cancelled') {
					$showQR = true;
					$params['showQR'] = true;
				}
			}
		}

		return $params;
	}

}

$oWeddingController = new WeddingController();
Flight::route('GET /boda', array($oWeddingController, 'index'));
Flight::route('POST /ajax', array($oWeddingController, 'ajax'));
Flight::route('GET /boda/angelica-y-luis', array($oWeddingController, 'terracota'));
Flight::route('GET /boda/ladislao-y-luis', array($oWeddingController, 'rouse'));

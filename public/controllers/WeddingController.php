<?php
require_once dirname(__FILE__) . '/../../src/models/GuestModel.php';
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Writer\ValidationException;

class WeddingController
{
    public function index()
    {

    }

    public function ajax()
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

		$token = '';
		$paramsUrl = Flight::request()->query->getData();

		$params = $this->getDataGuest($paramsUrl['token']);
		$params['title'] = 'Angelica y Luis';
		// echo "<pre>";
		// var_dump($data);
		// echo "</pre>";
		// exit;

		// $showQR = true;
		// if (!empty($paramsUrl['token'])) {
		// 	$token = $paramsUrl['token'];
		// 	$params['token'] = $paramsUrl['token'];
		// 	$guest = $guestModel->getGuestByToken($params['token']);
		// 	$guest['items'] = $guestModel->getAditionalGuestById($guest['id_guest']);

		// 	$showQR = ($guest['confirmation'] != 'cancelled') ? true : false;
		// 	foreach ($guest['items'] as $g) {
		// 		if ($g['confirmation'] != 'cancelled') {
		// 			$showQR = true;
		// 		}
		// 	}
		// }

		if (empty($paramsUrl['preview']) && !empty($paramsUrl['token'])) {
			$openinvitation = $params['guest']['openinvitation_calltoaction'] + 1;
			$guestModel->updateOpenInvitation($openinvitation, $token);
		}

		// $params['token'] = $token;
		// $params['showQR'] = $showQR;
		// $params['guest'] = !empty($guest) ? $guest : array();
		// $params['name'] = !empty($guest['name']) ? $guest['name'] : '';

        Flight::set('flight.views.path', 'public/templates/wedding/terracota');
        Flight::render('index', $params, 'body_content');
        Flight::render('_layout/template');
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


	public function qr(){

		$writer = new PngWriter();
		$qrCode = QrCode::create('Holaaa mundo')
				->setSize(300);
			// ->setEncoding(new Encoding('UTF-8'))
			// ->setErrorCorrectionLevel(ErrorCorrectionLevel::Low)
			// ->setMargin(10)
			// ->setRoundBlockSizeMode(RoundBlockSizeMode::Margin)
			// ->setForegroundColor(new Color(0, 0, 0))
			// ->setBackgroundColor(new Color(255, 255, 255));

		$result = $writer->write($qrCode);

		// Directly output the QR code
		// header('Content-Type: '.$result->getMimeType());
		// echo $result->getString();

		// Save it to a file
		//echo APP_UPLOAD_FILE; exit;
		$result->saveToFile(APP_UPLOAD_FILE_RELATIVE.'/qrcode.png');
		//define('APP_UPLOAD_FILE', BASE_URL . '/uploads/');
		//define('APP_UPLOAD_FILE_RELATIVE', './uploads/');
/*
		// Generate a data URI to include image data inline (i.e. inside an <img> tag)
		$dataUri = $result->getDataUri();*/

    /*
		// Create generic logo
		$logo = Logo::create(__DIR__.'/assets/img/qr.png')
			->setResizeToWidth(50)
			->setPunchoutBackground(true)
		;*/

		// Create generic label
		//$label = Label::create('Label')->setTextColor(new Color(255, 0, 0));

		//$result = $writer->write($qrCode, $logo, $label);

		// Validate the result
		//$writer->validateResult($result, 'Life is too short to be generating QR codes');

		echo 'aqui va el qr';
		exit;

	}


}

$oWeddingController = new WeddingController();
Flight::route('GET /boda', array($oWeddingController, 'index'));
Flight::route('POST /ajax', array($oWeddingController, 'ajax'));
Flight::route('GET /boda/angelica-y-luis', array($oWeddingController, 'terracota'));
Flight::route('GET /boda/ladislao-y-luis', array($oWeddingController, 'rouse'));
Flight::route('GET /boda/qr', array($oWeddingController, 'qr'));

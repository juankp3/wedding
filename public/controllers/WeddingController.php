<?php

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

    public function terracota()
    {
        $params['title'] = 'Angelica y Luis';

        Flight::set('flight.views.path', 'public/templates/wedding/terracota');
        Flight::render('index', $params, 'body_content');
        Flight::render('_layout/template');
    }


	public function qr(){

		$writer = new PngWriter();

		// Create QR code
		$qrCode = QrCode::create('Este es el texto del qr 1')
			->setEncoding(new Encoding('UTF-8'))
			->setErrorCorrectionLevel(ErrorCorrectionLevel::Low)
			->setSize(300)
			->setMargin(10)
			->setRoundBlockSizeMode(RoundBlockSizeMode::Margin)
			->setForegroundColor(new Color(0, 0, 0))
			->setBackgroundColor(new Color(255, 255, 255));

		$result = $writer->write($qrCode);

		// Directly output the QR code
		header('Content-Type: '.$result->getMimeType());
		echo $result->getString();

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
Flight::route('GET /boda/angelica-y-luis', array($oWeddingController, 'terracota'));
Flight::route('GET /boda/ladislao-y-luis', array($oWeddingController, 'rouse'));
Flight::route('GET /boda/qr', array($oWeddingController, 'qr'));

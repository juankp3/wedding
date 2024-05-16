<?php
class WeddingController 
{
    public function index()
    {

    }

    public function terracota()
    {
        $this->params['title'] = 'Usuarios';

        Flight::set('flight.views.path', 'public/templates/wedding/terracota');
        Flight::render('index', $this->params, 'body_content');
        Flight::render('_layout/template');
    }

    public function rouse()
    {
        $this->params['title'] = 'Usuarios';

        Flight::set('flight.views.path', 'public/templates/wedding/rouse');
        Flight::render('index', $this->params, 'body_content');
        Flight::render('_layout/template');
    }
    

}

$oWeddingController = new WeddingController();
Flight::route('GET /boda', array($oWeddingController, 'index'));
Flight::route('GET /boda/angelica-y-luis', array($oWeddingController, 'terracota'));
Flight::route('GET /boda/ladislao-y-luis', array($oWeddingController, 'rouse'));

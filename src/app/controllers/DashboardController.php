<?php

class DashboardController extends FrontController
{
    public $user;

    public function __construct()
    {
        $this->name = 'dashboard';
        parent::__construct();
    }

    public function index()
    {
        $oFileModel = new FileModel();

        $this->params['title'] = 'Dashboard';

        Flight::render('dashboard/index', $this->params, 'body_content');
        Flight::render('_layout/template');
    }

    public function index_old()
    {
        parent::index();
        $params = array();
        $oFileModel = new FileModel();

        $params['title'] = 'Dashboard';
        $params['user'] = $this->user;
        // echo "<pre>";
        // var_dump($params['user']);
        // echo "</pre>";exit;
        $params['active'] = FrontController::getMenu('user');
        $upload = array();

        if (isset($_POST['typeXML'])) {
            $upload = $this->uploadFile(array('csv','pdf','png','jpg','jpeg'));
            if (!$upload['error']){
                $oFileModel->name = $upload['file']['name'];
                $oFileModel->fullname = $upload['file']['fullname'];
                $oFileModel->size = $upload['file']['size'];
                $oFileModel->type = $upload['file']['type'];
                $oFileModel->deleted = 0;
                $oFileModel->id_user = $this->user['id_user'];
                $oFileModel->save();
            }
        }
        $params['upload'] = $upload;
        $params['files'] = array(); //$oFileModel->getFiles();

        Flight::render('dashboard/index', $params, 'body_content');
        Flight::render('_layout/template');
    }

    public function edit($id)
    {
        $oFileModel = new FileModel($id);
        $oShopModel = new ShopModel();
        $oFileShopModel = new FileShopModel();

        $params['title'] = 'Dashboard';
        $params['user'] = $this->user;
        $params['active'] = array();
        // $params['active'] = FrontController::getMenu('files');
        $params['data'] = (array)$oFileModel;
        $values = $oFileShopModel->getShopByFileId($id);
        $params['shops'] = $oShopModel->getShops($values);

        if (isset($_POST['submitFiles'])) {
            $data = Flight::request()->data->getData();
            $upload = $this->uploadFile(array('csv', 'pdf', 'png', 'jpg', 'jpeg'));
            if (!$upload['error']) {
                $oFileModel->name = $upload['file']['name'];
                $oFileModel->fullname = $upload['file']['fullname'];
                $oFileModel->size = $upload['file']['size'];
                $oFileModel->type = $upload['file']['type'];
                $oFileModel->update();
            }

            $oFileModel->deleteShops();
            foreach($data['shops'] as $shop) {
                $oFileShopModel->id_file = $id;
                $oFileShopModel->id_shop = $shop;
                $oFileShopModel->save();
            }

            Flight::redirect('/dashboard/file');
        }

        Flight::render('dashboard/edit', $params, 'body_content');
        Flight::render('_layout/template');

    }

    public function delete($id)
    {
        $oFileModel = new FileModel($id);
        $oFileModel->delete();
        Flight::redirect('/dashboard/file');
    }

}

$oDashboardController = new DashboardController();
Flight::route('GET|POST /dashboard', array($oDashboardController, 'index'));
// Flight::route('GET|POST /dashboard/file', array($oDashboardController, 'index'));
// Flight::route('GET|POST /dashboard/file/edit/@id', array($oDashboardController, 'edit'));
// Flight::route('GET|POST /dashboard/file/delete/@id', array($oDashboardController, 'delete'));

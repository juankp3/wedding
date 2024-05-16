<?php
require_once dirname(__FILE__) . '/../../models/UserModel.php';
require_once dirname(__FILE__) . '/../../models/ShopModel.php';
require_once dirname(__FILE__) . '/../../models/CategoryModel.php';
require_once dirname(__FILE__) . '/../../models/CustomerModel.php';
require_once dirname(__FILE__) . '/../../models/PaymentModel.php';
require_once dirname(__FILE__) . '/../../models/OrderModel.php';
require_once dirname(__FILE__) . '/../../models/FileModel.php';
require_once dirname(__FILE__) . '/../../../library/helper/Tools.php';

class LoginController
{
    public function index()
    {
        $data = Flight::request()->data->getData();
        if(isset($_POST['email']))
            $this->_login($data['email'], $data['passwd']);

        Flight::render('login/index');
    }

    public function start()
    {
        $user = new UserModel();
        $email = 'juankp3@gmail.com';
        $data = $user->getUserByEmail($email);


        if (empty($data['email'])) {
            $user->firstname = 'Juan';
            $user->lastname = 'Kuga';
            $user->email = 'juankp3@gmail.com';
            $user->passwd = md5('computadora');
            $user->type = 'superadmin';
            $user->active = 1;
            $user->deleted = 0;
            $res = $user->save();
            echo "<pre>";
            var_dump($res);
            echo "</pre>";
        }
        exit;
    }

    public function tienda()
    {
        $shopModel = new ShopModel();
        $params['shopId'] = '';
        $params['shops'] = $shopModel->getShops();
        $params['files'] = array();
        if (isset($_POST['shop'])) {
            $params['shopId'] = $_POST['shop'];
            $params['files'] = $shopModel->getFilesByShopId($params['shopId']);
        }
        Flight::render('login/tienda', $params);
    }

    public function download($id)
    {
        $oFileModel = new FileModel($id);
        Tools::download($oFileModel->fullname);
    }

    public function logout()
    {
        session_destroy();
        Flight::redirect('./');
    }

    public function _login($email, $passwd)
    {
        $oUserModel = new UserModel();
        $oUserModel->email = $email;
        $oUserModel->passwd = $passwd;
        $response = $oUserModel->login();

        if ($response['success']){
            $_SESSION['loggedInUser'] = $response['data'];
            Flight::redirect('/dashboard');
        }
    }
}

$oLoginController = new LoginController();
Flight::route('GET|POST /', array($oLoginController, 'index'));
Flight::route('GET /logout', array($oLoginController, 'logout'));
Flight::route('GET|POST /tienda', array($oLoginController, 'tienda'));
Flight::route('GET|POST /start', array($oLoginController, 'start'));
Flight::route('GET /file/download/@id', array($oLoginController, 'download'));

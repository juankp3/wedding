<?php
require_once dirname(__FILE__).'/../../lib/Ripcord/ripcord.php';
require_once dirname(__FILE__).'/../../app/config/settings.php';

class Odoo
{
	public static $isTest = false;
    public static $url = null;
    public static  $db = null;
    public static  $user = null;
    public static  $pwd = null;

	public static function setConfiguration($country) {

        switch ($country) {
            case 'PE':
                Odoo::$url = API_ODOO_URL_PE;
                Odoo::$db = API_ODOO_DATABASE_PE;
                Odoo::$user = API_ODOO_USER_PE;
                Odoo::$pwd = API_ODOO_PWD_PE;
                Odoo::$isTest = false;
                break;
            case 'CL':
                Odoo::$url = API_ODOO_URL_CL;
                Odoo::$db = API_ODOO_DATABASE_CL;
                Odoo::$user = API_ODOO_USER_CL;
                Odoo::$pwd = API_ODOO_PWD_CL;
                Odoo::$isTest = false;
                break;

            default:
                # code...
                break;
        }
	}

    public static function authenticate()
    {
		// Odoo::setConfiguration();
        $common = ripcord::client(Odoo::$url ."/xmlrpc/2/common");
        $uid = $common->authenticate(Odoo::$db, Odoo::$user, Odoo::$pwd, array()); // Captura el id del usuario

        return $uid;
    }

    public static function execute($model, $method, $where = array(), $filter = array())
    {
        $result = array();

        try {
			$uid = Odoo::authenticate();
            $models = ripcord::client(Odoo::$url . "/xmlrpc/2/object");
            $result['data'] = $models->execute_kw(Odoo::$db, $uid, Odoo::$pwd, $model, $method, $where, $filter);
            $result['hasError'] = false;
            $result['url'] = Odoo::$url;

        } catch (\Throwable $th) {
            $result['url'] = Odoo::$url;
            $result['hasError'] = true;
            $result['error'] = $th;
        }

        return $result;
    }

}

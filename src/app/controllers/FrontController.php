<?php
require_once dirname(__FILE__).'/../../interfaces/Repository.php';
require_once dirname(__FILE__).'/../../interfaces/UITableView.php';
require_once dirname(__FILE__).'/../../models/Menu.php';
require_once dirname(__FILE__).'/../../models/UserModel.php';
// require_once dirname(__FILE__).'/../../models/PermissionsModel.php';

class FrontController
{
    public $template;
    public $template_content;
    public $stylesheetManager;

    public $loggedInUser = null;
    public $params;
    public $name;

    public function __construct()
    {
        $request = Flight::request();

        if(!empty($_SESSION['loggedInUser'])) {
            $this->loggedInUser = $_SESSION['loggedInUser'];
            $this->params['permissions'] = $this->getPermissions($this->loggedInUser['type']);
            $this->params['active'] = FrontController::getMenu($this->name);
            $this->params['current_page'] = $this->getCurrentPage();
        }

        // if (empty($_SESSION['loggedInUser']) && $request->url <> '/'){
        //     Flight::redirect('/');
        // } elseif(!empty($_SESSION['loggedInUser'])) {
        //     $this->loggedInUser = $_SESSION['loggedInUser'];
        // }
    }

    public function getCurrentPage()
    {
        $wordsToRemove = ['new', 'edit', 'delete'];
        $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $currentURL = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $currentURLWithoutParams = strtok($currentURL, '?');

        $parsedUrl = parse_url($currentURLWithoutParams);
        $path = isset($parsedUrl['path']) ? $parsedUrl['path'] : '';
        $path = preg_replace('/\d+/', '', $path);

        if (substr($path, -1) === '/') {
            $path = substr($path, 0, -1); // Eliminar el último carácter
        }

        foreach ($wordsToRemove as $word) {
            $path = str_replace('/' . $word, '', $path);
        }

        $newUrl = $parsedUrl['scheme'] . '://' . $parsedUrl['host'] . (isset($parsedUrl['port']) ? ':' . $parsedUrl['port'] : '') . $path;

        return $newUrl;
    }


    public function index()
    {
        // Flight::render($this->template. '/template', array('media' => $this->setMedia()));
    }

    public static function isLogin()
    {
        return !empty($_SESSION['loggedInUser'])?true:false;
    }


    public static function authenticatedUser()
    {
        $loggedInUser = $_SESSION['loggedInUser'];
        $loggedInUser['fullnamne'] = $_SESSION['loggedInUser']['firstname'] . ' '. $_SESSION['loggedInUser']['lastname'];
        return $loggedInUser;
    }

    public function setMedia()
    {
        $css_path = '/views/assets/css/';
        $js_path = '';

        $this->registerStylesheet('theme-main', $css_path.'login.css?v=1', ['media' => 'all', 'priority' => 50]);
        $this->registerStylesheet('theme-main', $css_path.'test.css?v=1', ['media' => 'all', 'priority' => 50]);

        return $this->stylesheetManager;
    }

    public function registerStylesheet($relativePath, $params = array())
    {
        if (!is_array($params)) {
            $params = array();
        }

        $default_params = [
            'media' => 'all',
            'inline' => false,
            'server' => 'local',
        ];
        $params = array_merge($default_params, $params);

        $this->stylesheetManager.= '    <link rel="stylesheet" type="text/css" href="/views/assets/css/login.css?v=1">'. "\n";

    }

    function array2csv(array &$array)
    {
        if (count($array) == 0) {
            return null;
        }
        ob_start();
        $df = fopen("php://output", 'w');
        foreach ($array as $row) {
            fputcsv($df, $row);
        }
        fclose($df);
        return ob_get_clean();
    }

    public static function detectDelimiter($csvFile)
    {
        $filename = APP_UPLOAD_FILE.$csvFile;
        $delimiters = array( ',' => 0, ';' => 0, "\t" => 0, '|' => 0, );
        $firstLine = ''; $handle = fopen($filename, 'r');
        if ($handle) { $firstLine = fgets($handle); fclose($handle); }

        if ($firstLine) {
            foreach ($delimiters as $delimiter => &$count) {
                $count = count(str_getcsv($firstLine, $delimiter));
            }

            return array_search(max($delimiters), $delimiters);
        } else {
            return key($delimiters);
        }
    }

    public function uploadFile($extensions = array())
    {
        $dir_subida = APP_UPLOAD_FILE_RELATIVE;
        $time = date("d-m-Y") . "-" . time();
        $filename = $_FILES['fileToUpload']['name'];
        $fullname = $time . '__' . basename($filename);
        $fichero_subido = $dir_subida . $fullname;
        $typeXML = Flight::request()->data->typeXML;

        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

        if(!in_array($ext, $extensions)){
            $allExtensions = implode(',', $extensions);
            $response['error'] = 'Solo se aceptan archivos con extensiones '.strtoupper($allExtensions);
            $response['error_message'] = $response['error'];
            return $response;
        }

        if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $fichero_subido)) {
            $response['error'] = false;
            $response['file'] = array(
                'name' => $filename,
                'fullname' => $fullname,
                'size' => $_FILES['fileToUpload']['size'],
                'type' => $ext,
                'typeXML' => $typeXML,
            );
        } else {
            $response['error'] = $_FILES['fileToUpload']['error'];
            $response['error_message'] = "El archivo cargado excede el tamaño máximo definido en la directiva php.ini. Si la configuración del servidor lo permite, puedes añadir una directiva en el archivo .htaccess.";
        }

        return $response;
    }

    public static function getMenu($pageId = null)
    {
        $menuModel = new Menu();
        $menu = $menuModel->getMenu();

        if (!is_null($pageId)){
            foreach($menu as $key => $item) {
                foreach($item['items'] as $k => $link) {
                    if ($k == $pageId) {
                        return $link;
                    }
                }
            }
        }

        return $menu;
    }

    public function getPermissions($userType) {
        $permissions = array();
        switch ($userType) {
            case UserTypeModel::SUPERADMIN:
                $permissions['create'] = 1;
                $permissions['modify'] = 1;
                $permissions['delete'] = 1;
                $permissions['view'] = 1;
                break;

            case UserTypeModel::ADMIN:
                $permissions['create'] = 1;
                $permissions['modify'] = 1;
                $permissions['delete'] = 1;
                $permissions['view'] = 1;
                break;

            case UserTypeModel::SELLER:
                $permissions['create'] = 0;
                $permissions['modify'] = 0;
                $permissions['delete'] = 0;
                $permissions['view'] = 1;
                break;

            default:
                $permissions['create'] = 0;
                $permissions['modify'] = 0;
                $permissions['delete'] = 0;
                $permissions['view'] = 0;
                break;
        }

        return $permissions;
    }
}

<?php
// require_once dirname(__FILE__).'/Conexion.php';
require_once dirname(__FILE__) . '/Model.php';


class FileModel extends Model
{
    public $id;
    public $id_user;
    public $name;
    public $fullname;
    public $type;
    public $size;
    public $deleted;
    public $date_add;
    public $date_upd;

    public $definition = array(
        'table' => 'fy_file',
        'primary' => 'id_file',
        'fields' => array(
        ),
    );

    public function __construct($id_file = null)
    {
        parent::__construct($id_file);
    }

    public function getFiles()
    {
        $cn = new Conexion();
        $query = "SELECT f.*,GROUP_CONCAT(s.name) as shops_name FROM fy_file f ";
        $query.= "LEFT JOIN fy_file_shop fs ON f.id_file = fs.id_file ";
        $query.= "LEFT JOIN fy_shop s ON s.id_shop = fs.id_shop ";
        $query.= "GROUP BY f.id_file";
        $res = $cn->executeS($query);
        $data = array_map(function($file){
            $file['size_name'] = $this->formatBytes($file['size']);
            return $file;
        }, $res);
        return $data;
    }

    public function formatBytes($size, $precision = 2)
    {
        $base = log($size, 1024);
        $suffixes = array('B', 'KB', 'MB', 'GB', 'TB');

        return round(pow(1024, $base - floor($base)), $precision) . ' ' . $suffixes[floor($base)];
    }

    public function add($data)
    {
        $cn = new Conexion();
        return $cn->insert('fy_file', $data);
    }

    public function deleteShops()
    {
        $this->delete('fy_file_shop');
    }
}
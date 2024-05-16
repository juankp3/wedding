<?php
require_once dirname(__FILE__) . '/Model.php';

class FileShopModel extends Model
{
    public $id;
    public $id_file;
    public $id_shop;
    public $date_add;
    public $date_upd;

    public $definition = array(
        'table' => 'fy_file_shop',
        'primary' => 'id_file_shop',
        'fields' => array(
        ),
    );

    public function __construct($fy_file_shop = null)
    {
        parent::__construct($fy_file_shop);
    }

    public function getShopByFileId($id_file)
    {
        $cn = new Conexion();
        $query = "SELECT id_shop from ".$this->definition['table'];
        $query.= " WHERE id_file=".$id_file.";";
        $data = array();
        $res = $cn->executeS($query);
        foreach($res as $item){
            $data[$item['id_shop']] = $item['id_shop'];
        }
        return $data;
    }
}
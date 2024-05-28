<?php
require_once dirname(__FILE__).'/Conexion.php';
require_once dirname(__FILE__).'/../helpers/HttpResponse.php';

class Model
{
    public $id;
    public $definition;
    public $date_add;
    public $date_upd;

    public function __construct($id = null)
    {
        if(!empty($id)) {
            $cn = new Conexion();
            $fields = array_keys(Model::getDefinition($this));
            $data = $this->getDataById($id);
            if($data) {
                $this->id = $id;
                foreach($fields as $field)
                {
                    $this->{$field} = !empty($data[$field])?$data[$field]:'';
                }
            }

        } else {
            $this->date_add = date("Y-m-d H:i:s");
            $this->date_upd = date("Y-m-d H:i:s");
        }
    }

    public function getDataById($id)
    {
        $cn = new Conexion();
        $table = Model::getTable($this);
        $primary = Model::getPrimary($this);

        $query = "SELECT * FROM $table WHERE $primary = $id";
        return $cn->getRow($query, $table);
    }

    public function getLastId()
    {
        $cn = new Conexion();
        $table = Model::getTable($this);
        $primary = Model::getPrimary($this);
        $query = "SELECT $primary FROM $table WHERE $primary ORDER BY $primary desc LIMIT 0, 1";
        $data = $cn->getRow($query, $table);
        return $data[$primary];
    }

    public static function getDefinition($class, $field = null)
    {
        unset($class->table);
        $class = (array)$class;
        unset($class['id']);
        unset($class['definition']);
        return $class;
    }

    public static function getTable($class)
    {
        $class = (array)$class;
        return $class['definition']['table'];
    }

    public static function getPrimary($class)
    {
        $class = (array)$class;
        return $class['definition']['primary'];
    }

    public function executeS($query)
    {
        $cn = new Conexion();
        $table = Model::getTable($this);
        return $cn->executeS($query, $table);
    }

    public function execute($query)
    {
        $cn = new Conexion();
        $table = Model::getTable($this);
        return $cn->executeS($query, $table);
    }

    public function executeNonQuery($query)
    {
        $cn = new Conexion();
        return $cn->executeNonQuery($query);
    }

    public function getRow($query)
    {
        $cn = new Conexion();
        $table = Model::getTable($this);
        return $cn->getRow($query, $table);
    }

    public function update()
    {
        $cn = new Conexion();
        $table = Model::getTable($this);
        $fields = Model::getDefinition($this);
        $primary = Model::getPrimary($this);

        return $cn->update(
            $table,
            $fields,
            array(
                $primary => $this->id
            )
        );
    }

    public function save()
    {
        $cn = new Conexion();
        $table = Model::getTable($this);
        $fields = Model::getDefinition($this);

        return $cn->save($table, $fields);
    }

    public function delete($table = null, $primary = null)
    {
        $cn = new Conexion();
        if (empty($table)) {
            $table = Model::getTable($this);
        }

        if (empty($primary)) {
            $primary = Model::getPrimary($this);
        }

        $fields = Model::getDefinition($this);
        return $cn->delete($table, array(
            $primary => $this->id
        ));
    }

    public function getPagination(array $dataArray)
    {
        $itemsPerPage = 4;
        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

        $startIndex = ($currentPage - 1) * $itemsPerPage;
        $currentPageRecords = array_slice($dataArray, $startIndex, $itemsPerPage);
        $totalPages = ceil(count($dataArray) / $itemsPerPage);
        return [
            'records' => $currentPageRecords,
            'totalPages' => $totalPages,
            'currentPage' => $currentPage,
        ];
    }
}

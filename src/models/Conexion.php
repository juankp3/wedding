<?php
class Conexion
{
    private $_CON;

    public function __construct()
    {
        $conex = array($_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASS'], $_ENV['DB_NAME']);
        $this->_CON =  mysqli_connect($conex[0], $conex[1], $conex[2], $conex[3]);
    }

    public function insert($table, $data)
    {
        $query = "INSERT INTO $table (";
        $query.= implode(', ', array_keys($data)).", date_add, date_upd) VALUES ('";
        $query.= implode("', '", array_values($data))."', '".date("Y-m-d H:i:s")."', '".date("Y-m-d H:i:s")."');";

        if (DEBUG) {
            echo "<pre>";
            var_dump($query);
            echo "</pre>";
        }

        return mysqli_query($this->_CON, $query);
    }

    public function save($table, $data)
    {
        $query = "INSERT INTO $table (";
        $query.= implode(', ', array_keys($data)).") VALUES ('";
        $query.= implode("', '", array_values($data))."');";

        if (DEBUG) {
            echo "<pre>";
            var_dump($query);
            echo "</pre>";
        }

        return mysqli_query($this->_CON, $query);
    }

    public function update($table, $data, $where)
    {
        $query = "UPDATE $table SET ";
        unset($data['date_add']);
        foreach($data as $key => $value) {
			if(empty($value) && !is_numeric($value))
				continue;

			if (is_numeric($value)){
				$query.= $key."=$value, ";
			} else {
				$query.= $key."='$value', ";
			}
        }

        $query = substr($query, 0, -2);
        $query.= ' WHERE ';
        foreach ($where as $k => $v) {
            if (!empty($v)) {
                $query .= $k . "='$v', ";
            }
        }

        $query = substr($query, 0, -2).';';

        if (DEBUG) {
            echo "<pre>";
            var_dump($query);
            echo "</pre>";
        }

        return mysqli_query($this->_CON, $query);
    }

    public function describe($table){
        $describe = array_reduce($this->execute("DESCRIBE $table"),
            function($acumulador, $valorActual){
                $acumulador[$valorActual['Field']] = $valorActual['Type'];
                return $acumulador;
            }, []
        );

        return $describe;
    }

    public function executeS($query, $table)
    {
        $describe = $this->describe($table);
        $data = [];
        foreach($this->execute($query) as $key => $fields) {
            foreach($fields as $k => $v) {

				if (!empty($describe[$k]))
					$type = $describe[$k];

                $dato[$k] = $v;
                if (strstr($type, 'int')) {
                    $dato[$k] = (int)$v;
                }

                if (strstr($type, 'decimal')) {
                    $dato[$k] = (float)$v;
                }

            }
            $data[] = $dato;
        }

        if (DEBUG) {
            echo "<pre>";
            var_dump($query);
            echo "</pre>";
        }

        return $data;
    }

    public function execute($query)
    {
        $result = mysqli_query($this->_CON, $query);
        $data = array();
        while ($d = mysqli_fetch_assoc($result)) {
            $data[] = $d;
        }
        return $data;
    }

    public function getRow($query, $table)
    {
        $data = [];
        $describe = $this->describe($table);
        $fields = mysqli_fetch_assoc(mysqli_query($this->_CON, $query));
        if ($fields) {
            foreach($fields as $k => $v) {
                $type = $describe[$k];

                $data[$k] = $v;
                if (strstr($type, 'int')) {
                    $data[$k] = (int)$v;
                }

                if (strstr($type, 'decimal')) {
                    $data[$k] = (float)$v;
                }
            }
        }

        return $data;
    }

    public function delete($table, $where)
    {
        $query = "DELETE FROM  $table ";
        $query .= ' WHERE ';
        foreach ($where as $k => $v) {
            if (!empty($v)) {
                $query .= $k . "='$v', ";
            }
        }
        $query = substr($query, 0, -2) . ';';

        if (DEBUG) {
            echo "<pre>";
            var_dump($query);
            echo "</pre>";
        }

        return mysqli_query($this->_CON, $query);
    }
}

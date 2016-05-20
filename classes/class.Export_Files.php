<?php

class Export_Files
{
    private $mysqli, $table_name;

    public function __construct($table_name)
    {
        conDB2::getInstance();
        $db = conDB2::$db;
        $this->mysqli = $db;

        $this->table_name = $table_name;
    }

    public function find()
    {
        $sql = 'SELECT * FROM `' . $this->table_name . '`';
        $result = $this->mysqli->query($sql);
        if (!$result) die($this->mysqli->error);
        $result = $result->fetch_all(MYSQLI_ASSOC);
        return $result;
    }

    public function fields()
    {
        $sql = 'SHOW FIELDS FROM `' . $this->table_name . '`';
        $result = $this->mysqli->query($sql);
        if (!$result) die($this->mysqli->error);
        $result = $result->fetch_all(MYSQLI_ASSOC);
        $fields = array();
        foreach ($result as $item) {
            $fields[] = $item['Field'];
        }
        return $fields;
    }
}
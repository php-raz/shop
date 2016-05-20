<?php

class Orders2
{
    private  $mysqli;

    public function __construct(){
        conDB2::getInstance();
        $db = conDB2::$db;
        $this->mysqli = $db;
    }

    public function create($id_user)
    {
        $sql = 'INSERT INTO `orders`(`id`, `id_user`, `date_order`, `status`)
            VALUES (NULL,"' . $id_user . '" ,"' . date("Y-m-d") . '","' . rand(1, 3) . '")';
        $result = $this->mysqli->query($sql);
        if (!$result) die($this->mysqli->error);
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM `orders` WHERE id = "' . $id . '"';
        $result = $this->mysqli->query($sql);
        if (!$result) {
            die($this->mysqli->error);
        } else {
            return '<h3>Запись успешно удалена!</h3>';
        }
    }

    public function update($id, $status)
    {
        $sql = 'UPDATE `orders` SET status = "' . $status . '", date_order = "' . date("Y-m-d") . '"
         WHERE id = "' . $id . '"';
        $result = $this->mysqli->query($sql);
        if (!$result) die($this->mysqli->error);
    }

    public function find()
    {
        $sql = "SELECT * FROM `orders`";
        $result = $this->mysqli->query($sql);
        if (!$result) die($this->mysqli->error);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function findBy($arr = array())
    {
        $sql = '';
        foreach ($arr as $key => $value) {
            $sql .= 'SELECT * FROM `orders` WHERE ' . $key . ' = "' . $value . '"';
        }
        $result = $this->mysqli->query($sql);
        if (!$result) die($this->mysqli->error);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function findOne($id)
    {
        $sql = 'SELECT * FROM `orders` WHERE id = "' . $id . '"';
        $result = $this->mysqli->query($sql);
        if (!$result) die($this->mysqli->error);
        return $result->fetch_row();

    }
}
<?php

class OrderContent2
{
    private $mysqli;

    public function __construct(){
        conDB2::getInstance();
        $db = conDB2::$db;
        $this->mysqli = $db;
    }

    public function create($id_order, $id_product, $price, $count)
    {
        $sql = 'INSERT INTO `ordercontent`(`id`, `id_order`, `id_product`, `price`, `count`) VALUES
                      (NULL,"' . $id_order . '" ,"' . $id_product . '","' . ($price * $count) . '","' . $count . '" )';
        $result = $this->mysqli->query($sql);
        if (!$result) die($this->mysqli->error);
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM `ordercontent` WHERE id = "' . $id . '"';
        $result = $this->mysqli->query($sql);
        if (!$result) {
            die($this->mysqli->error);
        } else {
            return '<h3>Запись успешно удалена!</h3>';
        }
    }

    public function update($id, $count)
    {
        $id_product = $this->findOne($id);
        $prod = new Products2();
        $data = $prod->findOne($id_product[2]);
        $sql = 'UPDATE `ordercontent` SET price = "' . ($data[5] * $count) . '", count = "' . $count . '"
         WHERE id = "' . $id . '"';
        $result = $this->mysqli->query($sql);
        if (!$result) die($this->mysqli->error);
    }

    public function find()
    {
        $sql = "SELECT * FROM `ordercontent`";
        $result = $this->mysqli->query($sql);
        if (!$result) die($this->mysqli->error);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function findBy($arr = array())
    {
        $sql = '';
        foreach ($arr as $key => $value) {
            $sql .= 'SELECT * FROM `ordercontent` WHERE ' . $key . ' = "' . $value . '"';
        }
        $result = $this->mysqli->query($sql);
        if (!$result) die($this->mysqli->error);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function findOne($id)
    {
        $sql = 'SELECT * FROM `ordercontent` WHERE id = "' . $id . '"';
        $result = $this->mysqli->query($sql);
        if (!$result) die($this->mysqli->error);
        return $result->fetch_row();

    }
}
<?php

class Products2
{
   // private $id, $id_catalog, $title, $mark, $count, $price, $description, $image, $status,
    private  $mysqli;

    public function __construct(){
        conDB2::getInstance();
        $db = conDB2::$db;
        $this->mysqli = $db;
    }

    public function create($id_catalog, $title, $mark, $count, $price, $desc, $image)
    {
        $sql = 'INSERT INTO `products`(`id`, `id_catalog`, `title`, `mark`, `count`, `price`, `description`, `image`, `status`)
              VALUES (NULL,"' . $id_catalog . '" ,"' . $title . '","' . $mark . '" ,
                "' . $count . '" ,"' . $price . '" ,"' . $desc . '","' . $image . '"  ,"1")';
        $result = $this->mysqli->query($sql);
        if (!$result) die($this->mysqli->error);
        return '<h3>Товар "' . $title . '" создан</h3>';
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM `products` WHERE id = "' . $id . '"';
        $result = $this->mysqli->query($sql);
        if (!$result) {
            die($this->mysqli->error);
        } else {
            return '<h3>Запись успешно удалена!</h3>';
        }
    }

    public function update($id, $title, $mark, $count, $price, $desc, $image)
    {
        $sql = 'UPDATE `products` SET title = "' . $title . '", mark = "' . $mark . '",
        count = "' . $count . '", price = "' . $price . '",
        description = "' . $desc . '", image = "' . $image . '"
       WHERE id = "' . $id . '"';
        $result = $this->mysqli->query($sql);
        if (!$result) die($this->mysqli->error);
        echo '<h3>Товар "' . $title . '" обновлен</h3>';

    }

    public function find()
    {
        $sql = "SELECT * FROM `products`";
        $result = $this->mysqli->query($sql);
        if (!$result) die($this->mysqli->error);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function findBy($arr = array())
    {
        $sql = '';
        foreach ($arr as $key => $value) {
            $sql .= 'SELECT * FROM `products` WHERE ' . $key . ' = "' . $value . '"';
        }
        $result = $this->mysqli->query($sql);
        if (!$result) die($this->mysqli->error);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function findOne($id)
    {
        $sql = 'SELECT * FROM `products` WHERE id = "' . $id . '"';
        $result = $this->mysqli->query($sql);
        if (!$result) die($this->mysqli->error);
        return $result->fetch_row();

    }
}


<?php

class Category2
{
    private $id, $title, $status = 1, $mysqli;

    public function __construct()
    {
        conDB2::getInstance();
        $db = conDB2::$db;
        $this->mysqli = $db;
    }

    public function create($title)
    {
        $this->title = $title;
        $sql = 'INSERT INTO `category`(`id`, `title`, `status`) VALUES
                      (NULL,"' . $this->title . '" ,"' . $this->status . '")';
        $result = $this->mysqli->query($sql);
        if (!$result) die($this->mysqli->mysqlierror);
        return '<h3>Категория "' . $this->title . '" создана</h3>';
    }

    public function delete($id)
    {
        $this->id = $id;
        $sql = 'DELETE FROM `category` WHERE id = "' . $this->id . '"';
        $result = $this->mysqli->query($sql);
        if (!$result) {
            die($this->mysqli->error);
        } else {
            return '<h3>Запись успешно удалена!</h3>';
        }
    }

    public function update($name, $id)
    {
        $sql_ins = 'UPDATE `category` SET title = "' . $name . '"
       WHERE id = "' . $id . '"';
        $result = $this->mysqli->query($sql_ins);
        if (!$result) die($this->mysqli->error);
        echo '<h2>Категория "' . $name . '" обновлена</h2>';
    }

    public function find()
    {
        $sql = 'SELECT * FROM `category`';
        $result = $this->mysqli->query($sql);
        if (!$result) die($this->mysqli->error);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function findBy($arr = array())
    {
        $sql = '';
        foreach ($arr as $key => $value) {
            $sql .= 'SELECT * FROM `category` WHERE ' . $key . ' = "' . $value . '"';
        }
        $result = $this->mysqli->query($sql);
        if (!$result) die($this->mysqli->error);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function findOne($id)
    {
        $sql = 'SELECT * FROM `category` WHERE id = "' . $id . '"';
        $result = $this->mysqli->query($sql);
        if (!$result) die($this->mysqli->error);
        $data = $result->fetch_row();
        return $data[1];
    }
}
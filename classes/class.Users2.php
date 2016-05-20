<?php

class Users2
{
    private $mysqli;

    public function __construct()
    {
        conDB2::getInstance();
        $db = conDB2::$db;
        $this->mysqli = $db;
    }

    public function create($name, $lastname, $birthday, $email, $pass)
    {
        $sql = 'INSERT INTO `users` SET id = "NULL", name = "' . $name . '", lastname = "' . $lastname . '",
        birthday = "' . $birthday . '", email = "' . $email . '", password = "' . $pass . '",
        is_active = "1", reg_date = "' . date("Y-m-d") . '", last_update = "' . date("Y-m-d") . '", status = "1"';
        $result = $this->mysqli->query($sql);
        if (!$result) die($this->mysqli->error);
        echo '<h3>Пользователь "' . $name . ' ' . $lastname . '" добавлен</h3>';
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM `users` WHERE id = "' . $id . '"';
        $result = $this->mysqli->query($sql);
        if (!$result) {
            die($this->mysqli->error);
        } else {
            return '<h3>Запись успешно удалена!</h3>';
        }
    }

    public function update($id, $name, $lastname, $birthday, $email, $pass)
    {
        $sql = 'UPDATE `users` SET name = "' . $name . '", lastname = "' . $lastname . '",
        birthday = "' . $birthday . '", email = "' . $email . '", password = "' . $pass . '",
        last_update = "' . date("Y-m-d") . '" WHERE id = "' . $id . '"';
        $result = $this->mysqli->query($sql);
        if (!$result) die($this->mysqli->error);
        echo '<h3>Пользователь "' . $name . '" обновлен</h3>';

    }

    public function find()
    {
        $sql = "SELECT * FROM `users`";
        $result = $this->mysqli->query($sql);
        if (!$result) die($this->mysqli->error);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function findBy($arr = array())
    {
        $sql = '';
        foreach ($arr as $key => $value) {
            $sql .= 'SELECT * FROM `users` WHERE ' . $key . ' = "' . $value . '"';
        }
        $result = $this->mysqli->query($sql);
        if (!$result) die($this->mysqli->error);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function findOne($id)
    {
        $sql = 'SELECT * FROM `users` WHERE id = "' . $id . '"';
        $result = $this->mysqli->query($sql);
        if (!$result) die($this->mysqli->error);
        return $result->fetch_row();

    }
}
//
//Array(
//    [0] => Array(
//        [id] => 36
//        [name] => Магомед
//        [lastname] => Сиражудинов
//        [birthday] => 2016 - 03 - 10
//        [email] => php_raz@mail . ru
//        [password] => 123
//        [is_active] => 1
//        [reg_date] => 2016 - 03 - 12
//        [last_update] => 2016 - 03 - 12
//        [status] => 1
//        )
//)
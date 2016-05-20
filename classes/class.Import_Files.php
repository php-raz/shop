<?php

class Import_Files
{
    private $mysqli, $table_name;

    public function __construct($table_name)
    {
        conDB2::getInstance();
        $db = conDB2::$db;
        $this->mysqli = $db;

        $this->table_name = $table_name;
    }

    public function insert($param, $update = false)
    {
        if ($param != null) {
            $key = array_keys($param);
            $value = array_values($param);
            if ($update) {
                for ($i = 0; $i < count($key); $i++) {
                    if ($value[$i] != '') {
                        $sql = 'UPDATE `' . $this->table_name . '` SET `' . $key[$i] . '` = "' . $value[$i] . '"
                    WHERE id = "' . $param['id'] . '"';
                    }
                    $result = $this->mysqli->query($sql);
                    if (!$result) die($this->mysqli->error);
                }
            } else {
                for ($i = 0; $i < count($key); $i++) {
                    if ($value[$i] != '') {
                        if ($i == 0) {
                            $sql = 'INSERT  INTO `' . $this->table_name . '` SET `' . $key[$i] . '` = "' . $value[$i] . '"';
                        } else {
                            $sql = 'UPDATE `' . $this->table_name . '` SET `' . $key[$i] . '` = "' . $value[$i] . '"
                    WHERE id = "' . $param['id'] . '"';
                        }
                    }
                    $result = $this->mysqli->query($sql);
                    if (!$result) die($this->mysqli->error);
                }
            }
        }
    }

    public function validate($param)
    {
        switch ($this->table_name) {
            case 'category':
                $count = count($param);
                if (!empty($param[0])) {
                    $param['id'] = filter_var($param[0], FILTER_VALIDATE_INT);
                } else {
                    $param['id'] = NULL;
                }
                if (!empty($param[1])) {
                    $param['title'] = filter_var($param[1], FILTER_SANITIZE_STRING);
                } else {
                    $param['title'] = NULL;
                }
                if (!empty($param[2])) {
                    $param['status'] = filter_var($param[2], FILTER_VALIDATE_INT);
                } else {
                    $param['status'] = NULL;
                }
                for ($i = 0; $i < $count; $i++) {
                    unset($param[$i]);
                }
                if (in_array(false, $param)) {
                    return NULL;
                } else {
                    return $param;
                }
                break;
            case 'ordercontent':
                $count = count($param);
                if (!empty($param[0])) {
                    $param['id'] = filter_var($param[0], FILTER_VALIDATE_INT);
                } else {
                    $param['id'] = NULL;
                }
                if (!empty($param[1])) {
                    $param['id_order'] = filter_var($param[1], FILTER_VALIDATE_INT);
                } else {
                    $param['id_order'] = NULL;
                }
                if (!empty($param[2])) {
                    $param['id_product'] = filter_var($param[2], FILTER_VALIDATE_INT);
                } else {
                    $param['id_product'] = NULL;
                }
                if (!empty($param[3])) {
                    $param['price'] = filter_var($param[3], FILTER_VALIDATE_INT);
                } else {
                    $param['price'] = NULL;
                }
                if (!empty($param[4])) {
                    $param['count'] = filter_var($param[4], FILTER_VALIDATE_INT);
                } else {
                    $param['count'] = NULL;
                }
                for ($i = 0; $i < $count; $i++) {
                    unset($param[$i]);
                }
                if (in_array(false, $param)) {
                    return NULL;
                } else {
                    return $param;
                }
                break;
            case 'orders':
                $count = count($param);
                if (!empty($param[0])) {
                    $param['id'] = filter_var($param[0], FILTER_VALIDATE_INT);
                } else {
                    $param['id'] = NULL;
                }
                if (!empty($param[1])) {
                    $param['id_user'] = filter_var($param[1], FILTER_VALIDATE_INT);
                } else {
                    $param['id_user'] = NULL;
                }
                if (!empty($param[2])) {
                    $param['date_order'] = filter_var($param[2], FILTER_VALIDATE_FLOAT);
                } else {
                    $param['date_order'] = NULL;
                }
                if (!empty($param[3])) {
                    $param['status'] = filter_var($param[3], FILTER_VALIDATE_INT);
                } else {
                    $param['status'] = NULL;
                }
                for ($i = 0; $i < $count; $i++) {
                    unset($param[$i]);
                }
                if (in_array(false, $param)) {
                    return NULL;
                } else {
                    return $param;
                }
                break;
            case 'products':
                $count = count($param);
                if (!empty($param[0])) {
                    $param['id'] = filter_var($param[0], FILTER_VALIDATE_INT);
                } else {
                    $param['id'] = NULL;
                }
                if (!empty($param[1])) {
                    $param['id_catalog'] = filter_var($param[1], FILTER_VALIDATE_INT);
                } else {
                    $param['id_catalog'] = NULL;
                }
                if (!empty($param[2])) {
                    $param['title'] = filter_var($param[2], FILTER_SANITIZE_STRING);
                } else {
                    $param['title'] = NULL;
                }
                if (!empty($param[3])) {
                    $param['mark'] = filter_var($param[3], FILTER_SANITIZE_STRING);
                } else {
                    $param['mark'] = NULL;
                }
                if (!empty($param[4])) {
                    $param['count'] = filter_var($param[4], FILTER_VALIDATE_INT);
                } else {
                    $param['count'] = NULL;
                }
                if (!empty($param[5])) {
                    $param['price'] = filter_var($param[5], FILTER_VALIDATE_INT);
                } else {
                    $param['price'] = NULL;
                }
                if (!empty($param[6])) {
                    $param['description'] = filter_var($param[6], FILTER_SANITIZE_STRING);
                } else {
                    $param['description'] = NULL;
                }
                if (!empty($param[7])) {
                    $param['img'] = filter_var($param[7], FILTER_SANITIZE_STRING);
                } else {
                    $param['img'] = NULL;
                }
                if (!empty($param[8])) {
                    $param['status'] = filter_var($param[8], FILTER_VALIDATE_INT);
                } else {
                    $param['status'] = NULL;
                }
                for ($i = 0; $i < $count; $i++) {
                    unset($param[$i]);
                }
                if (in_array(false, $param)) {
                    return NULL;
                } else {
                    return $param;
                }
                break;
            case 'users':
                $count = count($param);
                if (!empty($param[0])) {
                    $param['id'] = filter_var($param[0], FILTER_VALIDATE_INT);
                } else {
                    $param['id'] = NULL;
                }
                if (!empty($param[1])) {
                    $param['name'] = filter_var($param[1], FILTER_SANITIZE_STRING);
                } else {
                    $param['name'] = NULL;
                }
                if (!empty($param[2])) {
                    $param['lastname'] = filter_var($param[2], FILTER_SANITIZE_STRING);
                } else {
                    $param['lastname'] = NULL;
                }
                if (!empty($param[3])) {
                    $param['birthday'] = filter_var($param[3], FILTER_VALIDATE_FLOAT);
                } else {
                    $param['birthday'] = NULL;
                }
                if (!empty($param[4])) {
                    $param['email'] = filter_var($param[4], FILTER_VALIDATE_EMAIL);
                } else {
                    $param['email'] = NULL;
                }
                if (!empty($param[5])) {
                    $param['password'] = filter_var($param[5], FILTER_SANITIZE_STRING);
                } else {
                    $param['password'] = NULL;
                }
                if (!empty($param[6])) {
                    $param['is_active'] = filter_var($param[6], FILTER_VALIDATE_INT);
                } else {
                    $param['is_active'] = NULL;
                }
                if (!empty($param[7])) {
                    $param['reg_date'] = filter_var($param[7], FILTER_VALIDATE_FLOAT);
                } else {
                    $param['reg_date'] = NULL;
                }
                if (!empty($param[8])) {
                    $param['last_update'] = filter_var($param[8], FILTER_VALIDATE_FLOAT);
                } else {
                    $param['last_update'] = NULL;
                }
                if (!empty($param[9])) {
                    $param['status'] = filter_var($param[9], FILTER_VALIDATE_INT);
                } else {
                    $param['last_update'] = NULL;
                }
                for ($i = 0; $i < $count; $i++) {
                    unset($param[$i]);
                }
                if (in_array(false, $param)) {
                    return NULL;
                } else {
                    return $param;
                }
                break;
        }
    }

    public function id_row()
    {
        $sql = 'SELECT * FROM `' . $this->table_name . '`';
        $result = $this->mysqli->query($sql);
        if (!$result) die($this->mysqli->error);
        $result = $result->fetch_all(MYSQLI_ASSOC);

        $id = array();
        foreach ($result as $item) {
            $id[] = $item['id'];
        }
        return $id;
    }
}
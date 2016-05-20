<?php

class DBase2
{
    private $mysqli;

    public function __construct()
    {
        conDB2::getInstance();
        $db = conDB2::$db;
        $this->mysqli = $db;
    }

    public function show_all_table()
    {
        $sql = 'SHOW TABLES FROM i_magazin';
        $result = $this->mysqli->query($sql);
        if (!$result) die($this->mysqli->error);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function count_row_table($table)
    {
        $sq = 'SELECT COUNT(*) FROM `' . $table.'`';
        $res = $this->mysqli->query($sq);
        if (!$res) die($this->mysqli->error);
        return $res->fetch_row();
    }

    public function show_order($id)
    {
        $sql = 'SELECT ordercontent.id_product, ordercontent.price, ordercontent.count,
        orders.date_order, products.title, products.mark FROM `ordercontent`, `orders`, `products`
        WHERE orders.id_user = "' . $id . '" AND ordercontent.id_order = orders.id
        AND ordercontent.id_product = products.id';
        $result = $this->mysqli->query($sql);
        if (!$result) die($this->mysqli->error);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function id_or_pr_prod($id_user, $id_prod)
    {
        $sql = 'SELECT orders.id, products.price FROM `orders`, `products`
        WHERE orders.id_user = "' . $id_user . '" AND products.id = "' . $id_prod . '"';
        $result = $this->mysqli->query($sql);
        if (!$result) die($this->mysqli->error);
        return $result->fetch_array(MYSQLI_ASSOC);
    }
}
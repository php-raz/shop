<?php

final class conDB2
{
    public static $db;

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    public static function getInstance()
    {
        $mysqli = @new mysqli('localhost', 'root', '', 'i_magazin');
        if (mysqli_connect_errno()) {
            die(mysqli_connect_error());
        }
        self::$db = $mysqli;
    }
}
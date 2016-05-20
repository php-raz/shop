<?php
session_start();
require_once '../ini.php';
require_once '../header_crud.php';
if (!empty($_SESSION['s_name']) && isset($_SESSION['s_name'])) {

    if (!empty($_GET['delete']) && isset($_GET['delete'])) {
        $id = filter_input(INPUT_GET, 'delete', FILTER_SANITIZE_NUMBER_INT);
        $prod = new Products2();
        echo $prod->delete($id);
    }
} else {
    echo '<h3>Что бы удалить запись Вы должны <a  href="../users/create.php?filename=reg">зарегистрироваться</a></h3>';
}
require_once '../footer_crud.php';
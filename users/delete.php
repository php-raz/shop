<?php
session_start();

if (!empty($_GET['delete']) && isset($_GET['delete'])) {
    if (!empty($_SESSION['s_name']) && isset($_SESSION['s_name'])) {

        session_destroy();
        setcookie(session_name(), '');
        header("HTTP/1.1 307 Temporary Redirect");
        header("Location: ../index.php");

        require_once '../ini.php';
        require_once '../header_crud.php';

        $id = filter_input(INPUT_GET, 'delete', FILTER_SANITIZE_NUMBER_INT);
        $user = new Users2();
        echo $user->delete($id);

    }
} elseif (!empty($_GET['exit']) && isset($_GET['exit'])) {
    session_destroy();
    setcookie(session_name(), '');

    header("HTTP/1.1 307 Temporary Redirect");
    header("Location: ../index.php");
} else {
    require_once '../header_crud.php';
    echo '<h3>Что бы удалить запись Вы должны <a  href="hp?filename=reg">зарегистрироваться</a></h3>';
}
require_once '../footer_crud.php';
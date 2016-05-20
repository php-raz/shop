<?php
session_start();
require_once '../ini.php';
require_once '../header_crud.php';

if (!empty($_SESSION['s_name']) && isset($_SESSION['s_name'])) {

    if (!$_POST['create_cat']) {
        echo '<h3>Создать категорию</h3>';
        echo '<form action="" method="post">
                <div class="form-group">
                    <label for="exampleInputCat">Название категории:</label>
                    <input type="text" name="name_cat" required class="form-control" id="exampleInputCat" placeholder="Название категории">
                </div>
                <div class="form-group ">
                    <input type="submit" value="Создать" name="create_cat" class="btn btn-success pull-right">
                </div>
              </form>';
    } else {
        $title = filter_input(INPUT_POST, 'name_cat', FILTER_SANITIZE_STRING);
        $cat = new Category2();
        echo $cat->create($title);
    }
} else {
    echo '<h3>Что бы создать запись Вы должны <a  href="../users/create.php?filename=reg">зарегистрироваться</a></h3>';
}

require_once '../footer_crud.php';
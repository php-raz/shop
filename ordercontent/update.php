<?php
session_start();
require_once '../ini.php';
require_once '../header_crud.php';

$id = filter_input(INPUT_GET, 'edit', FILTER_SANITIZE_NUMBER_INT);
$ord_con = new OrderContent2();
$data = $ord_con->findOne($id);

if (!$_POST['edit_ord_con']) {
    echo '<h3>Редактирование состава заказа</h3>';
    echo '<form action="" method="post">
                <div class="form-group">
                    <label for="numb_prod">Кол-во товара</label>
                    <input type="number" name="numb_prod" value="' . $data[4] . '" required class="form-control" id="numb_prod" placeholder="Кол-во товара">
                </div>
                <div class="form-group ">
                    <input type="submit" value="Сохранить" name="edit_ord_con" class="btn btn-success pull-right">
                </div>
              </form>';
} else {
    $count = filter_input(INPUT_POST, 'numb_prod', FILTER_SANITIZE_NUMBER_INT);
    $ord_con->update($id, $count);
}


require_once '../footer_crud.php';
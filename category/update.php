<?php
session_start();
require_once '../ini.php';
require_once '../header_crud.php';

$cat_name = filter_input(INPUT_POST, 'cat_name', FILTER_SANITIZE_STRING);
$id = filter_input(INPUT_GET, 'edit', FILTER_SANITIZE_NUMBER_INT);
$cat = new Category2();
if (!$_POST['edit_cat']) {
    echo '<h3>Редактирование категории</h3>';
    echo '<form action="" method="post">
                <div class="form-group">
                    <label for="name_cat">Название категории</label>
                    <input type="text" name="cat_name" value="' . $cat->findOne($id) . '" required class="form-control" id="name_cat" placeholder="Название категории">
                </div>
                <div class="form-group ">
                    <input type="submit" value="Редактировать" name="edit_cat" class="btn btn-success pull-right">
                </div>
              </form>';
} else {
    $cat->update($cat_name, $id);
}

require_once '../footer_crud.php';
<?php
session_start();
require_once '../ini.php';
require_once '../header_crud.php';

$id = filter_input(INPUT_GET, 'edit', FILTER_SANITIZE_NUMBER_INT);
$prod = new Products2();
$data = $prod->findOne($id);

if (!empty($_SESSION['s_name']) && isset($_SESSION['s_name'])) {
    if (!$_POST['edit_prod']) {
        echo '<h3>Редактирование товара</h3>';
        echo '<form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name_prod">Название товара</label>
                    <input type="text" name="name_prod" required class="form-control" value="' . $data[2] . '" id="name_prod" placeholder="Название товара">
                </div>
                <div class="form-group">
                    <label for="mark_prod">Марака товара</label>
                    <input type="text" name="mark_prod" value="' . $data[3] . '" required class="form-control" id="mark_prod" placeholder="Марака товара">
                </div>
                <div class="form-group">
                    <label for="count_prod">Кол-во товара</label>
                    <input type="number" name="count_prod" value="' . $data[4] . '" required class="form-control" id="count_prod" placeholder="Кол-во товара">
                </div>
                <div class="form-group">
                    <label for="price_prod">Цена</label>
                    <input type="number" name="price_prod" value="' . $data[5] . '" required class="form-control" id="price_prod" placeholder="Цена">
                </div>
                <div class="form-group">
                    <label for="desc_prod">Описание</label>
                    <textarea name="desc_prod" cols="100" rows="10" class="form-control" id="desc_prod">' . $data[6] . '</textarea>
                </div>
                <div class="form-group">
                    <label for="img_prod">Изменить картинку</label>
                    <input type="file" name="img_prod" required class="form-control" id="img_prod" placeholder="Загрузить картинку">
                </div>
                <div class="form-group ">
                    <input type="submit" value="Редактировать" name="edit_prod" class="btn btn-success pull-right">
                </div>
              </form>';
    } else {

        $file = $_FILES['img_prod'];
        if (isset($file) && !empty($file)) {
            if ($file['size'] <= 2000000 && $file['size'] > 0) {
                $file_name = '../img/' . $file['name'];
                move_uploaded_file($file['tmp_name'], $file_name);
            } else {
                echo '<h2>Размер файла превышает максимально допустимый размер(2 мб).Загрузите другой файл. </h2>';
                exit;
            }
        }
        $title = filter_input(INPUT_POST, 'name_prod', FILTER_SANITIZE_STRING);
        $mark = filter_input(INPUT_POST, 'mark_prod', FILTER_SANITIZE_STRING);
        $count = filter_input(INPUT_POST, 'count_prod', FILTER_SANITIZE_NUMBER_INT);
        $price = filter_input(INPUT_POST, 'price_prod', FILTER_SANITIZE_NUMBER_INT);
        $desc = filter_input(INPUT_POST, 'desc_prod', FILTER_SANITIZE_STRING);
        $image = $file_name;

        $prod->update($id, $title, $mark, $count, $price, $desc, $image);
    }
} else {
    echo '<h3>Что бы создать запись Вы должны <a  href="../users/create.php?filename=reg">зарегистрироваться</a></h3>';
}
require_once '../footer_crud.php';
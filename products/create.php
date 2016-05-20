<?php
session_start();
require_once '../ini.php';
require_once '../header_crud.php';

if (!empty($_SESSION['s_name']) && isset($_SESSION['s_name'])) {
    if (!$_POST['create_prod']) {
        echo '<h3>Создать товар</h3>';

        // Список категорий
        $cat = new Category2();
        $data = $cat->find();

        echo '<form action="" method="post" enctype="multipart/form-data">';
        if (count($data)) {
            $result = '';
            foreach ($data as $k => $row) {
                $result .= '<option value="' . $row['title'] . '">' . $row['title'] . '</option>';
            }
            echo '<div class="form-group">
                <label for="cat_prod">Категория товара:</label>
                <select name="cat_prod" class="form-control" id="cat_prod">';
            echo $result;
            echo '</select></div>';
        }
        echo '  <div class="form-group">
                    <label for="name_prod">Название товара:</label>
                    <input type="text" name="name_prod" class="form-control" id="name_prod" placeholder="Название товара">
                </div>
                <div class="form-group">
                    <label for="mark_prod">Марка товара:</label>
                    <input type="text" name="mark_prod" class="form-control" id="mark_prod" placeholder="Марка товара"></p>
                </div>
                <div class="form-group">
                    <label for="count_prod">Кол-во товара:</label>
                    <input type="number" name="count_prod" class="form-control" id="count_prod" placeholder="Кол-во товара">
                </div>
                <div class="form-group">
                    <label for="price_prod">Цена:</label>
                    <input type="number" name="price_prod" class="form-control" id="price_prod" placeholder="Цена"></p>
                </div>
                <div class="form-group">
                    <label for="desc_prod">Описание:</label>
                    <textarea name="desc_prod" cols="80" rows="10" class="form-control" id="desc_prod" placeholder="Описание"></textarea><br>
                </div>
                <div class="form-group">
                    <label for="img_prod">Загрузить картинку</label>
                    <input type="file" name="img_prod" required class="form-control" id="img_prod" placeholder="Загрузить картинку">
                </div>
                <div class="form-group">
                    <input type="submit" value="Создать" name="create_prod" class="btn btn-success pull-right">
                </div>
              </form>';
    } else {

        $file = $_FILES['img_prod'];
        if (isset($file) && !empty($file)) {
            if ($file['size'] <= 2000000 && $file['size'] > 0) {
                $file_name = '../img/' . $file['name'];
                move_uploaded_file($file['tmp_name'], $file_name);
            } else {
                echo '<h4>Размер файла превышает максимально допустимый размер(2 мб).Загрузите другой файл. </h4>';
                exit;
            }
        }

        // Id категории
        $cat_prod = filter_input(INPUT_POST, 'cat_prod', FILTER_SANITIZE_STRING);
        $arr = array('title' => $cat_prod);
        $cat = new Category2();
        $data = $cat->findBy($arr);

        $id_catalog = $data[0]['id'];
        $title = filter_input(INPUT_POST, 'name_prod', FILTER_SANITIZE_STRING);
        $mark = filter_input(INPUT_POST, 'mark_prod', FILTER_SANITIZE_STRING);
        $count = filter_input(INPUT_POST, 'count_prod', FILTER_SANITIZE_NUMBER_INT);
        $price = filter_input(INPUT_POST, 'price_prod', FILTER_SANITIZE_NUMBER_INT);
        $desc = filter_input(INPUT_POST, 'desc_prod', FILTER_SANITIZE_STRING);
        $image = $file_name;

        $prod = new Products2();
        echo $prod->create($id_catalog, $title, $mark, $count, $price, $desc, $image);
    }
} else {
    echo '<h3>Что бы создать запись Вы должны <a  href="../users/create.php?filename=reg">зарегистрироваться</a></h3>';
}
require_once '../footer_crud.php';
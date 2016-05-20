<?php
require_once '../ini.php';
require_once '../header_prod.php';

$prod_id = filter_input(INPUT_GET, 'prod', FILTER_SANITIZE_NUMBER_INT);
$arr = array('id' => $prod_id);
$prod = new Products2();
$data = $prod->findBy($arr);

if (count($data)) {

    echo '<img src = "' . $data[0]['image'] . ' " class="img">';

    $result = '';
    $result .= '<table class="table table-striped img_t">
                    <tbody>';
    $i = 1;
    foreach ($data as $k => $row) {
        $result .= '<tr><th>Название</th><td>' . $row['title'] . '</td></tr>';
        $result .= '<tr><th>Марка</th><td>' . $row['mark'] . '</td></tr>';
        $result .= '<tr><th>Кол-во</th><td>' . $row['count'] . '</td></tr>';
        $result .= '<tr><th>Цена</th><td>' . $row['price'] . '</td></tr>';
        $result .= '<tr><th>Описание</th><td>' . $row['description'] . '</td></tr>';
        $result .= '<tr><th>Статус</th><td>' . $row['status'] . '</td></tr>';
        $result .= '<td><a href="update.php?edit=' . $row['id'] . '">Редактировать</a></td>';
        $result .= '<td><a href="delete.php?delete=' . $row['id'] . '">Удалить</a></td>';
    }
    $result .= '</tbody></table>';
    echo $result;
    if (!empty($_SESSION['s_name']) && isset($_SESSION['s_name'])) {
        echo '<form action="" method="post" id="kolvo_prod_form">
                <div class="form-group">
                    <label for="kolvo_prod">Количество:</label>
                    <input type="number" name="kolvo_prod" class="form-control" id="kolvo_prod" value="1" placeholder="Количество">
                    <input type="hidden" name="id_prod" class="form-control" value="' . $data[0]['id'] . '">
                </div>
                <div class="form-group">
                    <input type="submit" value="Купить" name="kypit" class="btn btn-success pull-right">
                </div>
              </form>';
    } else {
        echo 'Вы должны <a  href="../users/create.php?filename=reg">зарегистрироваться</a>, что бы купить товар';
    }
    if ($_POST['kypit']) {
        $id_user = (int)$_SESSION['id'];
        $id_prod = filter_input(INPUT_POST, 'id_prod', FILTER_SANITIZE_NUMBER_INT);
        $count = filter_input(INPUT_POST, 'kolvo_prod', FILTER_SANITIZE_NUMBER_INT);
        $order = new Orders2();
        $order->create($id_user);

        $iopp = new DBase2();
        $data = $iopp->id_or_pr_prod($id_user, $id_prod);
        $id_order = $data['id'];
        $price = $data['price'];

        $ord_con = new OrderContent2();
        $ord_con->create($id_order, $id_prod, $price, $count);
    }

} else {
    echo '<h3>Товара нет в наличии</h3>';
}

require_once '../footer_crud.php';
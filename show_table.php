<?php
session_start();
require_once 'ini.php';
require_once 'header.php';

$table = filter_input(INPUT_GET, 'table', FILTER_SANITIZE_STRING);

if (isset($table) && !empty($table)) {
    show_table($table);
}

function show_table($table)
{
    $result = '';
    $result .= '<table class="table table-striped">';
    switch ($table) {
        case 'category':
            $cat = new Category2();
            $data = $cat->find();
            $result .= '<h3>Записи в таблице \'category\'</h3><br>';
            $result .= '<thead><tr><th>Ид</th><th>Категория</th><th>Статус</th>
                            <th>Редактировать</th><th>Удалить</th></tr></thead>';
            break;
        case 'ordercontent':
            $ordercontent = new OrderContent2();
            $data = $ordercontent->find();
            $result .= '<h3>Записи в таблице \'ordercontent\'</h3><br>';
            $result .= '<thead><tr><th>Ид</th><th>Ид заказа</th><th>Ид товара</th>
                            <th>Цена</th><th>Кол-во</th><th>Редактировать</th><th>Удалить</th></tr></thead>';
            break;
        case 'orders':
            $orders = new Orders2();
            $data = $orders->find();
            $result .= '<h3>Записи в таблице \'orders\'</h3><br>';
            $result .= '<thead><tr><th>Ид</th><th>Ид пользователя</th><th>Дата оформ.</th>
                            <th>Статус</th><th>Редактировать</th><th>Удалить</th></tr></thead>';
            break;
        case 'products':
            $prod = new Products2();
            $data = $prod->find();
            $result .= '<h3>Записи в таблице \'products\'</h3><br>';
            $result .= '<thead><tr><th>Ид</th><th>Категория</th><th>Название</th><th>Марка</th><th>Кол-во на складе</th>
                               <th>Цена</th><th>Описание</th><th>Статус</th>
                               <th>Редактировать</th><th>Удалить</th></tr></thead>';
            break;
        case 'users':
            $user = new Users2();
            $data = $user->find();
            $result .= '<h3>Записи в таблице \'users\'</h3><br>';
            $result .= '<thead><tr><th>Ид</th><th>Имя</th><th>Фамилия</th><th>Дата рождения</th><th>Email</th>
                               <th>Активирован</th><th>Дата регистрации</th>
                               <th>Дата редактирования</th><th>Статус</th>
                               <th>Редактировать</th><th>Удалить</th></tr></thead>';
            break;
    }
    $result .= '<tbody>';
    foreach ($data as $k => $row) {
        $result .= '<tr>';
        foreach ($row as $key => $val) {
            if ($table == 'products' && $key == 'image') {
                continue;
            }
            if ($table == 'users' && $key == 'password') {
                continue;
            }
            if ($table == 'products' && $key == 'description') {
                $st = substr($val, 0, 200);
                $st .= '...<a href="products/read.php?prod=' . $row['id'] . '">далее</a>';
                $result .= '<td>' . $st . '</td>';
            } else {
                $result .= '<td>' . $val . '</td>';
            }
        }
        $result .= '<td><a href="' . $table . '/update.php?edit=' . $row['id'] . '">Редактировать</a></td>';
        $result .= '<td><a href="' . $table . '/delete.php?delete=' . $row['id'] . '">Удалить</a></td>';
        $result .= '</tr>';
    }
    $result .= '</tbody></table>';
    echo $result;
}

require_once 'footer.php';
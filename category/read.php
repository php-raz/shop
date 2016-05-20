<?php
session_start();
require_once '../ini.php';
require_once '../header_crud.php';


$category = filter_input(INPUT_GET, 'category', FILTER_SANITIZE_STRING);

if (isset($category) && !empty($category)) {

    $prod = new Products2();
    $arr = array('id_catalog' => $category);
    $data = $prod->findBy($arr);

    if (count($data)) {
        $result = '';
        $result .= '<table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="row">№</th>
                            <th>Название</th>
                            <th>Марка</th>
                            <th>Кол-во</th>
                            <th>Цена</th>
                            <th>Описание</th>
                            <th>Статус</th>
                            <th>Редактировать</th>
                            <th>Удалить</th>
                        </tr>
                    </thead>
                    <tbody>';
        $i = 1;
        foreach ($data as $k => $row) {
            $result .= '<tr>';
            $result .= '<td>' . $i . '</td>';
            $result .= '<td>' . $row['title'] . '</td>';
            $result .= '<td>' . $row['mark'] . '</td>';
            $result .= '<td>' . $row['count'] . '</td>';
            $result .= '<td>' . $row['price'] . '</td>';

            $st = substr($row['description'], 0, 200);
            $st .= '...<a href="../products/read.php?prod=' . $row['id'] . '">далее</a>';

            $result .= '<td>' . $st . '</td>';
            $result .= '<td>' . $row['status'] . '</td>';
            $result .= '<td><a href="../products/update.php?edit=' . $row['id'] . '&table=products">Редактировать</a></td>';
            $result .= '<td><a href="../products/delete.php?delete=' . $row['id'] . '&table=products">Удалить</a></td>';
            $result .= '</tr>';
            $i++;
        }
        $result .= '</tbody></table>';

        echo $result;
    } else {
        echo '<h3>Товара нет в наличии</h3>';
    }
}

require_once '../footer_crud.php';
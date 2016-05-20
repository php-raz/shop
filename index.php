<?php
session_start();
require_once 'header.php';
require_once 'ini.php';
echo '<h3>Категории товаров</h3><br>';

$cat = new Category2;
$data = $cat->find();

if (count($data)) {
    $result = '';
    $result .= '<table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="row">№</th>
                            <th>Категория</th>
                            <th>Кол-во товара</th>
                        </tr>
                    </thead>
                    <tbody>';
    $i = 1;
    $prod = new Products2();
    foreach ($data as $k => $row) {
        $arr = array('id_catalog' => $row['id']);
        $dat = $prod->findBy($arr);
        $dat = count($dat);
        $result .= '<tr><td>' . $i . '</td>';
        $result .= '<td><a href="category/read.php?category=' . $row['id'] . '">' . $row['title'] . '</a></td>';
        $result .= '<td>' . $dat . '</td></tr>';
        $i++;
    }
    $result .= '</tbody></table>';
    echo $result;
}


require_once 'footer.php';
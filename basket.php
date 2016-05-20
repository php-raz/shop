<?php
session_start();
require_once 'ini.php';
require_once 'header.php';

$id = (int)$_SESSION['id'];
$order = new DBase2();
$data = $order->show_order($id);

if (isset($data) && !empty($data)) {
    echo '<h3>Корзина</h3><br>';
    echo '<h4>Ваши заказы</h4>';
    $result = '';
    $result .= '<table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="row">№</th>
                            <th>Название</th>
                            <th>Марка</th>
                            <th>Дата заказа</th>
                            <th>Цена</th>
                            <th>Количество</th>
                            <th>Сумма</th>
                        </tr>
                    </thead>
                    <tbody>';
    $i = 1;
    $total = 0;
    foreach ($data as $k => $row) {
        $result .= '<tr><td>' . $i . '</td>';
        $result .= '<td><a href="product.php?prod=' . $row['id_product'] . '">' . $row['title'] . '</a></td>';
        $result .= '
<td>' . $row['mark'] . '</td>
<td>' . $row['date_order'] . '</td>
<td>' . ($row['price'] / $row['count']) . '</td>
<td>' . $row['count'] . '</td>
<td>' . $row['price'] . '</td>
        </tr>';
        $i++;
        $total += $row['price'];
    }
    $result .= '<tr><th colspan="6">Итого</th><td>' . $total . '</td></tr></tbody></table>';
    echo $result;
} else {
    echo '<h3>Ваша корзина пуста!</h3>';
}
require_once 'footer.php';
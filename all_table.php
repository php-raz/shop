<?php
session_start();
require_once 'ini.php';
require_once 'header.php';
echo '<h3>Список таблиц в БД</h3><br>';

$table = new DBase2();
$data = $table->show_all_table();

if (count($data)) {
    $result = '';
    $result .= '<table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="row">№</th>
                            <th>Таблица</th>
                            <th>Кол-во записей</th>
                        </tr>
                    </thead>
                    <tbody>';
    $i = 1;
    foreach ($data as $k => $row) {
        foreach ($row as $key => $val) {
            $result .= '<tr><td>' . $i . '</td>';
            $result .= '<td><a href="show_table.php?table=' . $val . '">' . $val . '</a></td>';

            $dat = $table->count_row_table($val);

            $result .= '<td><a href="show_table.php?table=' . $val . '">' . $dat[0] . '</a></td></tr>';
            $i++;
        }
        $result .= '</tr>';
    }
    $result .= '</tbody></table>';
    echo $result;
}
require_once 'footer.php';
<?php
session_start();
require_once '../../ini.php';

$table_name = $_POST['imp_tab_name'];
$file_dir = $_SESSION['$file_path'];

$imp = new Import_Files($table_name);
$id = $imp->id_row();


$csv = array_map('str_getcsv', file($file_dir));

function charset2($value)
{
    return iconv('cp1251', 'UTF-8', $value);
}

foreach ($csv as $key => $value) {
    $param = array_map('charset2', $value);

    if (is_int((int)$value[0])) {
        $param = $imp->validate($param);
        if (in_array($value[0], $id)) {
            $imp->insert($param, $update = true);
        } else {
            $imp->insert($param);
        }
    }
}
unlink($file_dir);
header("HTTP/1.1 307 Temporary Redirect");
header('Location: ../../show_table.php?table=' . $table_name);
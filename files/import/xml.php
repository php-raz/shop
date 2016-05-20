<?php
session_start();
require_once '../../ini.php';

$table_name = $_POST['imp_tab_name'];
$file_dir = $_SESSION['$file_path'];

$sxe = simplexml_load_file($file_dir);

$json = json_encode($sxe);
$array = json_decode($json, TRUE);

$imp = new Import_Files($table_name);
$id = $imp->id_row();

foreach ($array['row'] as $key => $value) {
    $value = array_values($value);
    if (is_int((int)$value[0])) {
        $param = $imp->validate($value);
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
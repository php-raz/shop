<?php
session_start();
require_once '../../ini.php';

$table_name = $_POST['imp_tab_name'];
$file_dir = $_SESSION['$file_path'];

$file = file_get_contents($file_dir);
$array = json_decode($file, TRUE);

$imp = new Import_Files($table_name);
$id = $imp->id_row();

foreach ($array['category']['items'] as $key => $value) {
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
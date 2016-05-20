<?php
session_start();
require_once '../../ini.php';

$table_name = $_POST['exp_tab_name'];
$exp = new Export_Files($table_name);
$result = $exp->find();

$file_name = 'export.csv';
$file = fopen($file_name, "w");

$fields = $exp->fields();

function charset($value)
{
    return iconv('UTF-8', 'cp1251', $value);
}

fputcsv($file, $fields, ",");
if ($result) {
    foreach ($result as $value) {
        $ar = array_map('charset', $value);
        fputcsv($file, $ar, ",");
    }
}
fclose($file);

header('Content-type: application/csv');
header("Content-Disposition: inline; filename=" . $file_name);
readfile($file_name);
unlink($file_name);
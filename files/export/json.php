<?php
session_start();
require_once '../../ini.php';

$table_name = $_POST['exp_tab_name'];
$exp = new Export_Files($table_name);
$result = $exp->find();

$file_name = 'export.json';
$file = fopen($file_name, "w");

if ($result) {
    $jsonString = '{"' . $table_name . '":{"count": ' . count($result) . ',';
    $jsonString .= '"items":' . json_encode($result, JSON_UNESCAPED_UNICODE);
    $jsonString .= '}}';
    fwrite($file, $jsonString);
}
fclose($file);
header('Content-type: application/txt');
header("Content-Disposition: inline; filename=" . $file_name);
readfile($file_name);
unlink($file_name);
<?php
session_start();
require_once '../../ini.php';

$table_name = $_POST['exp_tab_name'];
$exp = new Export_Files($table_name);
$result = $exp->find();

$string = "<?xml version='1.0' encoding='UTF-8'?>
<$table_name>
</$table_name>";

$sxe = new SimpleXMLElement($string);

if ($result) {
    foreach ($result as $value) {
        $row = $sxe->addChild('row');
        foreach ($value as $key => $item)
            $row->addChild("$key","$item");
    }
}
$file_name = 'export.xml';
$sxe->asXML($file_name);

header('Content-type: application/txt');
header("Content-Disposition: inline; filename=" . $file_name);
readfile($file_name);
unlink($file_name);
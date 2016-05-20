<?php
session_start();
require_once 'ini.php';


if (!empty($_SESSION['s_name']) && isset($_SESSION['s_name'])) {

    if (!empty($_GET['files'])) {
        if (empty($_POST['files'])) {
            require_once 'header.php';
            $files = $_GET['files'];
            $tab = new DBase2();
            $data = $tab->show_all_table();

            $tab_name = '';
            foreach ($data as $k => $row) {
                foreach ($row as $key => $val) {
                    $tab_name .= '<option value="' . $val . '">' . $val . '</option>';
                }
            }

            switch ($files) {

                case 'import':
                    echo '<h3>Импорт таблицы</h3>';
                    echo '<form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="imp_tab_name">Таблицы</label>
                            <select name="imp_tab_name" class="form-control" id="imp_tab_name">';
                    echo $tab_name;
                    echo '</select>
                        </div>
                        <div class="form-group">
                            <input type="file" name="file">
                        </div>
                        <div class="form-group ">
                            <input type="hidden" value="' . $files . '" name="hidden">
                            <input type="submit" value="Импортировать" name="files[]" class="btn btn-success pull-right">
                        </div>
                      </form>';
                    break;

                case 'export':
                    echo '<h3>Экспорт таблицы</h3>';
                    echo '<form action="" method="post">
                        <div class="form-group">
                            <label for="exp_tab_name">Таблицы</label>
                            <select name="exp_tab_name" class="form-control" id="exp_tab_name">';
                    echo $tab_name;
                    echo '</select>
                        </div>
                        <div class="form-group">
                            <label for="exp_file_type">Формат экспорируемого файла</label>
                            <select name="exp_file_type" class="form-control" id="exp_file_type">
                                <option value="csv">csv</option>
                                <option value="xml">xml</option>
                                <option value="json">json</option>
                             </select>
                        </div>
                        <div class="form-group ">
                            <input type="hidden" value="' . $files . '" name="hidden">
                            <input type="submit" value="Экспортировать" name="files[]" class="btn btn-success pull-right">
                        </div>
                      </form>';
                    break;
            }
            require_once 'footer.php';
        } else {
            switch ($_POST['hidden']) {

                case 'import':
                    $file = $_FILES['file'];
                    $file_name = $file['name'];
                    move_uploaded_file($file['tmp_name'], $file_name);
                    $file_path = str_replace('\\', '/', dirname(__FILE__)) . '/' . $file_name;

                    function file_type($file_name)
                    {
                        $s = '';
                        $len = strlen($file_name);
                        for ($i = $len - 1; $i !== 0; $i--) {
                            if ($file_name[$i] !== '.') {
                                $s .= $file_name [$i];
                            } else {
                                return strrev($s);
                            }
                        }
                    }
                    $type = file_type($file_name);
                    $_SESSION['$file_path'] = $file_path;
                    header("HTTP/1.1 307 Temporary Redirect");
                    header('Location: files/import/' . $type . '.php');
                    break;

                case 'export':
                    header("HTTP/1.1 307 Temporary Redirect");
                    header('Location: files/export/' . $_POST['exp_file_type'] . '.php');
                    break;
            }
        }
    }
}


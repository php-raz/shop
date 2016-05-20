<?php
session_start();
require_once '../ini.php';
require_once '../header_crud.php';

$id = (int)$_SESSION['id'];
$user = new Users2();
$data = $user->findOne($id);

echo '<h3>Личный кабинет</h3>';
echo '<table class="table table-striped">
      <tbody>
        <tr>
            <th>Ваше имя:</th>
            <td>' . $data[1] . '</td>
        </tr>
        <tr>
            <th>Ваша фамилия:</th>
            <td>' . $data[2] . '</td>
        </tr>
        <tr>
            <th>Дата рождения:</th>
            <td>' . $data[3] . '</td>
        </tr>
        <tr>
            <th>Email:</th>
            <td>' . $data[4] . '</td>
        </tr>
        <tr>
            <th>Пароль:</th>
            <td>' . $data[5] . '</td>
        </tr>
        <tr>
            <th>Дата регистрации:</th>
            <td>' . $data[7] . '</td>
        </tr>
        <tr>
            <th>Дата редактирования:</th>
            <td>' . $data[8] . '</td>
        </tr>
    </tbody></table>';

echo '<a href="delete.php?exit=' . $_SESSION['id'] . '">Выйти</a>
<a href="update.php?edit=' . $_SESSION['id'] . '">Редактировать</a>
<a href="delete.php?delete=' . $_SESSION['id'] . '">Удалить</a>';

require_once '../footer_crud.php';
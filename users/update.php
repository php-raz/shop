<?php
session_start();
require_once '../ini.php';
require_once '../header_crud.php';

$id = filter_input(INPUT_GET, 'edit', FILTER_SANITIZE_NUMBER_INT);
$user = new Users2();
$data = $user->findOne($id);

if (!$_POST['edit_user']) {
    echo '<h3>Редактирование данных пользователя</h3>';
    echo '<form action="" method="post">
                <div class="form-group">
                    <label for="name_user">Имя</label>
                    <input type="text" name="name_user" value="' . $data[1] . '" required class="form-control" id="name_user" placeholder="Имя">
                </div>
                <div class="form-group">
                    <label for="lastname_user">Фамилия</label>
                    <input type="text" name="lastname_user" value="' . $data[2] . '" required class="form-control" id="lastname_user" placeholder="Фамилия">
                </div>
                <div class="form-group">
                    <label for="birth_user">Дата рождения</label>
                    <input type="date" name="birth_user" value="' . $data[3] . '" required class="form-control" id="birth_user" placeholder="Дата рождения">
                </div>
                <div class="form-group">
                    <label for="email_user">Email</label>
                    <input type="email" name="email_user" value="' . $data[4] . '" required class="form-control" id="email_user" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="pass_user">Пароль</label>
                    <input type="password" name="pass_user" value="" required class="form-control" id="pass_user" placeholder="Пароль">
                </div>
                <div class="form-group ">
                    <input type="submit" value="Сохранить" name="edit_user" class="btn btn-success pull-right">
                </div>
              </form>';
} else {
    $name = filter_input(INPUT_POST, 'name_user', FILTER_SANITIZE_STRING);
    $lastname = filter_input(INPUT_POST, 'lastname_user', FILTER_SANITIZE_STRING);
    $birthday = filter_input(INPUT_POST, 'birth_user', FILTER_SANITIZE_NUMBER_FLOAT);
    $email = filter_input(INPUT_POST, 'email_user', FILTER_SANITIZE_EMAIL);
    $pass = crypt($_POST['pass_user']);
    $user->update($id, $name, $lastname, $birthday, $email, $pass);
}


require_once '../footer_crud.php';
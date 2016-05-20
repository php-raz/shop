<?php
session_start();
require_once '../ini.php';
require_once '../header_crud.php';

if (!empty($_POST['registr']) && isset($_POST['registr'])) {

    $name = filter_input(INPUT_POST, 'name_user', FILTER_SANITIZE_STRING);
    $lastname = filter_input(INPUT_POST, 'surname_user', FILTER_SANITIZE_STRING);
    $birthday = filter_input(INPUT_POST, 'birth_user', FILTER_SANITIZE_NUMBER_FLOAT);
    $email = filter_input(INPUT_POST, 'email_user', FILTER_SANITIZE_EMAIL);
    $pass = crypt($_POST['pass_user']);

    $user = new Users2();
    $user->create($name, $lastname, $birthday, $email, $pass);

    $arr = array('email' => $email);
    $data = $user->findBy($arr);

    $_SESSION['id'] = $data[0]['id'];
    $_SESSION['s_name'] = $name;
} elseif (!empty($_POST['enter']) && isset($_POST['enter'])) {

    $email = filter_input(INPUT_POST, 'email_us', FILTER_SANITIZE_EMAIL);
    $pass = crypt($_POST['pass_us']);
    $user = new Users2();
    $arr = array('email' => $email);
    $data = $user->findBy($arr);

    $_SESSION['id'] = $data[0]['id'];
    $_SESSION['s_name'] = $data[0]['name'];
    echo '<h3>Вы успешно вошли!</h3>';
} else {
    echo '<h3 id="reg">Войти </h3>
            <form id="test-form" action="" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail">Email</label>
                        <input type="email" name="email_us" required class="form-control" id="exampleInputEmail" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">Пароль</label>
                        <input type="password" name="pass_us" required class="form-control" id="exampleInputPassword" placeholder="Пароль">
                    </div>
                    <div class="form-group ">
                        <input type="submit" value="Войти" name="enter" class="btn btn-success pull-right">
                    </div>
                </form><br><br><hr>';

    echo '<h3 id="reg">Зарегистрироваться </h3>
            <form id="test-form" action="" method="post">
                    <div class="form-group">
                        <label for="exampleInputName">Имя</label>
                        <input type="text" name="name_user" required class="form-control" id="exampleInputName" placeholder="Имя">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputSurname">Фамилия</label>
                        <input type="text" name="surname_user" required class="form-control" id="exampleInputSurname" placeholder="Фамилия">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputBirth">Дата рождения</label>
                        <input type="date" name="birth_user" required class="form-control" id="exampleInputBirth" placeholder="Дата рождения">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Email</label>
                        <input type="email" name="email_user" required class="form-control" id="exampleInputEmail" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">Пароль</label>
                        <input type="password" name="pass_user" required class="form-control" id="exampleInputPassword" placeholder="Пароль">
                    </div>
                    <div class="form-group ">
                        <input type="submit" value="Зарегистрироваться" name="registr" class="btn btn-success pull-right">
                    </div>
                </form>';
}
require_once '../footer.php';
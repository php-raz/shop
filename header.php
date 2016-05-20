<?php
session_start();

echo '<html lang="ru-RU">
<head>
    <meta charset="UTF-8">';
if (!empty($_POST['registr']) && isset($_POST['registr'])) {
    echo '<meta http-equiv="refresh" content="2;URL=users/read.php">';
}
if (!empty($_GET['delete']) && isset($_GET['delete']) && !empty($_GET['table']) && isset($_GET['table'])) {
    echo '<meta http-equiv="refresh" content="2;URL=index.php">';
}
echo '<title>Document</title>
    <meta name="viewport" content="width=1130">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/modernizr-custom.js"></script>
</head>
<body>
<div class="wrapper">
    <nav class="navbar navbar-default">
        <div class="container">
            <a href="index.php" class="navbar-brand">
                E-shop
            </a>
            <ul class="nav navbar-nav pull-right">
                <li class="active">
                    <a href="index.php">Категории</a>
                </li>
                <li>
                    <a href="all_table.php">Таблицы</a>
                </li>
                <li>
                    <a  href="basket.php">Корзина</a>
                </li>
                <li>
                    <a href="#" data-toggle="dropdown">
                        Создать
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href = "category/create.php?create=cat">Создать категорию</a>
                        </li>
                        <li>
                            <a href = "products/create.php?create=prod">Создать товар</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <div class="content-wrapper">
        <div class="container">
            <div class="sidebar col-md-2">
                <ul class="nav nav-pills nav-stacked">
                    <li role="presentation">';

if (!empty($_SESSION['s_name']) && isset($_SESSION['s_name'])) {
    echo '  Здравствуйте, ' . $_SESSION['s_name'] . '<br><a  href="users/read.php">Кабинет</a>';
    echo '<a href="load.php?files=import">Импорт</a>';
    echo '<a href="load.php?files=export">Экспорт</a>';
} else {
    echo '<a  href="users/create.php">Войти</a>';
}
echo '              </li >
                    <li role = "presentation" ><a href = "index.php" > Категории</a ></li >
                    <li role = "presentation" ><a href = "all_table.php" > Таблицы</a ></li >
                </ul >
            </div >
            <div class="content col-md-10" > ';
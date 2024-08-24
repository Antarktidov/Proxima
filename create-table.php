<?php
require_once 'components/get-ip.php';
$ip = get_ip();
if ($ip == '::1' || $ip == '127.0.0.1') {
    ?>
    <!DOCTYPE html>
    <html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Проксима | Главная</title>
        <link rel="stylesheet" href="styles/reset.css">
        <link rel="stylesheet" href="styles/common.css">
        <!--<link rel="stylesheet" href="styles/adaptive.css">-->

        <link rel="stylesheet" href="styles/admin-dashboard.css">
        <meta name="viewport" content="width=1170">
    </head>
    <body>
        <?php require_once 'components/admin-top-nav.php';?>
        <main class="admin-dashboard-main">
    <?php
    
    require_once 'components/db-data.php';

    // Create connection
    $conn = new mysqli($servername, $username, $password);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    // Create database
    $sql = "CREATE DATABASE $dbname";
    if ($conn->query($sql) === TRUE) {
    ?><p class="empty-table-message">База данных создана успешно!</p><?php
    } else {
    echo "Error creating database: " . $conn->error;
    ?><p class="empty-table-message">Произошла ошибка при созданиибазы данных: " . <?=$conn->error;?></p><?php
    }

    $conn->close();


    // Create connection
    $conn2 = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    // sql to create table
    $sql = "CREATE TABLE students (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    city VARCHAR(30) NOT NULL,
    citizenship VARCHAR(30) NOT NULL,
    firstname VARCHAR(30) NOT NULL,
    patronymic VARCHAR(30),
    surname VARCHAR(30) NOT NULL,
    phoneNumber VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    choicedstudyes VARCHAR(30) NOT NULL
);";

    if ($conn2->query($sql) == TRUE) {
    ?><p class="empty-table-message">Таблица создана успешно!</p><?php
    } else {
        ?><p class="empty-table-message">Произошла ошибка при создании таблицы: " . <?=$conn2->error;?></p><?php
    }

    $conn2->close();

    ?>
    </main>
    <?php require_once 'components/footer.php';?>
    </body>
    </html>
    <?php
    
} else {
    require_once 'components/403.php';
}
?>
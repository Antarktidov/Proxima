<?php
require_once 'components/get-ip.php';
$ip = get_ip();
if ($ip == '::1' || $ip == '127.0.0.1') {
    echo 'Добро пожаловать!';
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "proxima_students";

    // Create connection
    $conn = new mysqli($servername, $username, $password);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    // Create database
    $sql = "CREATE DATABASE $dbname";
    if ($conn->query($sql) === TRUE) {
    echo "База данных создана успешно!<br>";
    } else {
    echo "Error creating database: " . $conn->error;
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
    echo "Таблица создана успешно!<br>";
    } else {
    echo "Error creating table: " . $conn->error;
    }

    $conn2->close();
    
} else {
    require_once 'components/403.php';
}
?>
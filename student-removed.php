<?php
require_once 'components/get-ip.php';
require_once 'components/test-input.php';
require_once 'components/php_log.php';
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
        <main class="student-removed-main">
        <?php $id =  test_input($_POST["removable-student-id"]);

        php_log ("id: " . $id);

        require_once 'components/db-data.php';
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

        // sql to delete a record
        $sql = "DELETE FROM students WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
        ?>
        <h2 class="successfully-h2">СТУДЕНТ УСПЕШНО УДАЛЁН!</h2>
        <?php
        } else {
        echo "Error deleting record: " . $conn->error;
        }

        $conn->close();
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
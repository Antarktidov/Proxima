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
        <script src="scripts/theme-toggler.js" defer></script>
        <meta name="viewport" content="width=1170">
    </head>
    <body class="theme-light">
        <?php require_once 'components/admin-top-nav.php';?>
        <main class="admin-dashboard-main">
        <h2 class="students-list-h2">СПИСОК СТУДЕНТОВ</h2>
        <?php require_once 'components/db-data.php';

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM students";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            ?>
            <table class="students-table">
            <tr>
                <th>id</th><th>Город</th><th>Гражданство</th><th>Имя</th>
                <th>Фамилия</th><th>Отчество</th><th>Телефон</th><th>e-mail</th>
                <th>Предметы</th><th></th>
            </tr>
            <tbody>
            <?php
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["id"]. "</td><td>" . $row["city"]. "</td><td>" . $row["citizenship"]. "</td><td>" . 
            $row["firstname"]. "</td><td>" . $row["surname"]. "</td><td>" . $row["patronymic"].
            "</td><td>" . $row["phoneNumber"]. "</td><td>" . $row["email"].  "</td><td>" . $row["choicedstudyes"]. "</td>";?>
            <td class="remove-student-td">
            <form action="student-removed.php" method="POST">
                <button type="submit" class="remove-student-btn">УДАЛИТЬ СТУДЕНТА</button>
                <input class="invisible" type="text" name="removable-student-id" value="<?=$row["id"];?>">
            </form>
            </td>
            </tr>
        <?php    
            }
        ?>
            </tbody>
            </table>
            <?php
        } else {
        ?><p class="empty-table-message">Таблица БД пуста</p><?php
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
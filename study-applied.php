<?php
require_once 'components/test-input.php';
require_once 'components/php_log.php';
  $choicedstudyes = test_input($_POST["choicedstudyes"]);
  php_log($choicedstudyes);

  $choicedstudyesArr = (explode(',', $choicedstudyes));

  $city =  test_input($_POST["city"]);
  $citizenship = test_input($_POST["citizenship"]);

  $name = test_input($_POST["name"]);
  $surname = test_input($_POST["surname"]);

  if (null != test_input($_POST["patronymic"])) {
    $patronymic = $_POST["patronymic"];
  } else {
    $patronymic = '';
  }

  $phoneNumber = test_input($_POST["phone-number"]);

  if (null != test_input($_POST["e-mail"])) {
    $email = test_input($_POST["e-mail"]);
  } else {
    $email = '';
  }


  //Э, чё!
  /*echo '<br>';
  echo 'Город:' . $city . '<br>';
  echo 'Гражданство:' . $citizenship . '<br>';
  echo '<br>';

  echo 'Имя:' . $name . '<br>';
  echo 'Фамилия:' . $surname . '<br>';
  echo 'Отчество:' . $patronymic . '<br>';
  echo '<br>';

  echo 'Номер телефона:' . $phoneNumber . '<br>';
  echo 'e-mail:' . $email . '<br>';*/

  //Через какие-то sql-инекции
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "proxima_students";
  //Запрос 0
  $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

  $sql = "SELECT id FROM students";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
  // output data of each row
    while($row = $result->fetch_assoc()) {
      $last_id = $row["id"];
    }
  } else {
    php_log("0 results");
  }
  $conn->close();
  
  $next_id = $last_id + 1;

  //Запрос 1
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
}

  //SELECT id FROM `students`

  $sql = "INSERT INTO students (id, city, citizenship, firstname, surname, patronymic, phoneNumber, email, choicedstudyes)
  VALUES ('$next_id', '$city', '$citizenship', '$name', '$surname', '$patronymic', '$phoneNumber', '$email', '$choicedstudyes')";

  if (mysqli_query($conn, $sql)) {
    php_log("New record created successfully");
  } else {
    php_log("Error: " . $sql . "<br>" . mysqli_error($conn));
  }

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Проксима | Заявка на обучение</title>
    <?php require_once 'components/default-css-imports.php';?>
    <link rel="stylesheet" href="styles/study-applied.css">
    <script src="scripts/study-application.js" defer></script>
</head>
<body>
    <?php require_once 'components/top-nav.php';?>
    <main class="applied-main">
      <h2 class="congratulations-h2">ПОЗДРАВЛЯЕМ!</h2>
      <p class="successfully-p">Ваша заявка успешно принята!</p>
    </main>
    <?php require_once 'components/footer.php';?>
</body>
</html>
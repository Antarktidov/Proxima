<?php
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  $choicedStudies = test_input($_POST["choicedStudies"]);
  echo $choicedStudies;

  $choicedStudiesArr = (explode(',', $choicedStudies));

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
  echo "0 results";
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

  $sql = "INSERT INTO students (id, city, citizenship, firstname, surname, patronymic, phoneNumber, email, choicedStudies)
  VALUES ('$next_id', '$city', '$citizenship', '$name', '$surname', '$patronymic', '$phoneNumber', '$email', '$choicedStudies')";

  if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

mysqli_close($conn);
?>
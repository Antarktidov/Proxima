<?php
require_once 'data/studies-list.php';

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Проксима | Заявка на обучение</title>
    <?php require_once 'components/default-css-imports.php';?>
    <link rel="stylesheet" href="styles/studi-application.css">
    <script src="scripts/studi-application.js" defer></script>
</head>
<body>
    <?php require_once 'components/top-nav.php';?>
    <main class="studi-application">
        <h2 class="studi-application-h2">ЗАЯВКА НА ОБУЧЕНИЕ</h2>
        <form class="rendered-form" action="studi-applied.php" method="POST">
            <div class="rendered-form-city-and-sitizenship rendered-form-block">
                <div class="rendered-form-sub-block">
                    <label class="">Город</label>
                    <select class="" name="city" id="" required>
                        <option value="Санкт-Петербург">Санкт-Петербург</option>
                        <option value="Москва">Москва</option>
                        <option value="Владивосток">Владивосток</option>
                        <option value="Пермь">Пермь</option>
                        <option value="Омск">Омск</option>
                    </select>
                </div>
                <div class="rendered-form-sub-block">
                    <label for="" class="">Гражданство</label>
                    <select class="" name="citizenship" id="" required>
                        <option value="Россия">Россия</option>
                        <option value="США">США</option>
                        <option value="Казахстан">Казахстан</option>
                        <option value="Другое">Другое</option>
                    </select>
                </div>
            </div>
            <div class="rendered-form-block">
                <div class="rendered-form-sub-block">
                    <label for="" class="">Имя</label>
                    <input type="text" class="" name="name" access="" id="" required>
                </div>
                <div class="rendered-form-sub-block">
                    <label for="" class="">Фамилия</label>
                    <input type="text" class="" name="surname" access="" id="" required>
                </div>
                <div class="rendered-form-sub-block">
                    <label for="" class="">Отчество</label>
                    <input type="text" class="" name="patronymic" access="">
                </div>
            </div>
            <div class="rendered-form-block">
                <div class="rendered-form-sub-block">
                    <label for="" class="">номер телефона</label>
                    <input type="tel" class="" name="phone-number" required>
                </div>
                <div class="rendered-form-sub-block">
                    <label for="" class="">e-mail (необязательно)</label>
                    <input type="e-mail" class="" name="e-mail">
                </div>
            </div>
            <div class="rendered-form-studies-block">
            <label class="studi-application-studies-label">Предметы</label>
            <?php $choicedStudies = test_input($_POST["choicedStudies"]);
            $choicedStudiesArr = (explode(',', $choicedStudies));
            
            $choicedStudiesArrCount = count($choicedStudiesArr);

            switch ($choicedStudiesArrCount) {
                case 1:
                  $studiesCase = 'предмет';
                  break;
                case 2:
                case 3:
                case 4:
                  $studiesCase = 'предмета';
                  break;
                case 5:
                  $studiesCase = 'предметов';
                  break;
                default:
                  $studiesCase = '';
                  break;
              }
            ?>
            <span class="studi-application-studies-label-text">Вы выбрали <span class="studies-number"><?=$choicedStudiesArrCount?></span> <span class="studies-case"><?=$studiesCase;?></span>:</span>
            <div class="studi-application-studies-container">
            <?php for ($i = 0; $i < count($studies_list); $i++) {
                for ($j = 0; $j < count($studies_list[$i]["list"]); $j++) {

                    for ($k = 0; $k < count($choicedStudiesArr); $k++) {
                        if ($choicedStudiesArr[$k] == $studies_list[$i]["list"][$j]["id"]) {
                            ?>
                            <div class="studi-application-studies-name-container" data-studi-id="<?=$studies_list[$i]["list"][$j]["id"];?>">
                                <?=$studies_list[$i]["list"][$j]["studi-name"];?>
                                <span class="studi-application-studies-name-cross">x</span>
                            </div>
                            <?php
                        }
                    }
                }
            }
            ?>
            </div>
            <input class="invisible choiced-studiestext-input" value="<?=$choicedStudies;?>" type="text" name="choicedStudies" required>
            </div>
            <div class="">
                <input name="" access="false" id="" value="option-1" type="checkbox" required>
                <label for="">Я прочитал(а) договор об обучении и согласен/согласна с ним</label>
            </div>
            <div class="">
                <button type="submit" class="studi-application-button" name="" disabled="disabled">ПОДАТЬ ЗАЯВКУ НА ОБУЧЕНИЕ</button>
            </div>
        </form>
    </main>
    <?php require_once 'components/footer.php';?>
</body>
</html>
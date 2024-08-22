<?php
require_once 'data/studyes-list.php';
require_once 'components/test-input.php';
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Проксима | Заявка на обучение</title>
    <?php require_once 'components/default-css-imports.php';?>
    <link rel="stylesheet" href="styles/study-application.css">
    <script src="scripts/study-application.js" defer></script>
</head>
<body>
    <?php require_once 'components/top-nav.php';?>
    <main class="study-application">
        <h2 class="study-application-h2">ЗАЯВКА НА ОБУЧЕНИЕ</h2>
        <form class="rendered-form" action="study-applied.php" method="POST">
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
            <div class="rendered-form-studyes-block">
            <label class="study-application-studyes-label">Предметы</label>
            <?php $choicedstudyes = test_input($_POST["choicedstudyes"]);
            $choicedstudyesArr = (explode(',', $choicedstudyes));
            
            $choicedstudyesArrCount = count($choicedstudyesArr);

            switch ($choicedstudyesArrCount) {
                case 1:
                  $studyesCase = 'предмет';
                  break;
                case 2:
                case 3:
                case 4:
                  $studyesCase = 'предмета';
                  break;
                case 5:
                  $studyesCase = 'предметов';
                  break;
                default:
                  $studyesCase = '';
                  break;
              }
            ?>
            <span class="study-application-studyes-label-text">Вы выбрали <span class="studyes-number"><?=$choicedstudyesArrCount?></span> <span class="studyes-case"><?=$studyesCase;?></span>:</span>
            <div class="study-application-studyes-container">
            <?php for ($i = 0; $i < count($studyes_list); $i++) {
                for ($j = 0; $j < count($studyes_list[$i]["list"]); $j++) {

                    for ($k = 0; $k < count($choicedstudyesArr); $k++) {
                        if ($choicedstudyesArr[$k] == $studyes_list[$i]["list"][$j]["id"]) {
                            ?>
                            <div class="study-application-studyes-name-container" data-study-id="<?=$studyes_list[$i]["list"][$j]["id"];?>">
                                <?=$studyes_list[$i]["list"][$j]["study-name"];?>
                                <span class="study-application-studyes-name-cross">x</span>
                            </div>
                            <?php
                        }
                    }
                }
            }
            ?>
            </div>
            <input class="invisible choiced-studyestext-input" value="<?=$choicedstudyes;?>" type="text" name="choicedstudyes" required>
            </div>
            <div class="">
                <input name="" access="false" id="" value="option-1" type="checkbox" required>
                <label for="">Я прочитал(а) <a class="dogovor-link" href="<?=$standart_path;?>/dogovor.php">договор об обучении</a> и согласен/согласна с ним</label>
            </div>
            <div class="">
                <button type="submit" class="study-application-button" name="" disabled="disabled">ПОДАТЬ ЗАЯВКУ НА ОБУЧЕНИЕ</button>
            </div>
        </form>
    </main>
    <?php require_once 'components/footer.php';?>
</body>
</html>
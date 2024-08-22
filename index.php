<?php require_once 'data/studyes-list.php';?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Проксима | Главная</title>
    <?php require_once 'components/default-css-imports.php';?>
    <link rel="stylesheet" href="styles/mainpage.css">
    <link rel="stylesheet" href="styles/study-choice-modal.css">
    <script src="scripts/mainpage.js" defer></script>
</head>
<body>
<?php require_once 'components/top-nav.php';?>
            <div class="about">
                <p class="p-about">Образовательный центр «Проксима» предоставляет вам второе обучение, но не для диплома, а для души. Здесь вы можете освоить различные IT, творческие специальности и прикоснуться к тайнам мироздания. Мы проводим занятия не в онлайне, а в живую, пока только в пяти городах России</p>
            </div>
            <main class="our-studyes">
                <h2 class="our-studyes-h2">НАШИ ЗАНЯТИЯ</h2>
                <div class="our-studyes-block">
                    <?php
                    $studyes_list_len = count($studyes_list);
                    for ($x = 0; $x < $studyes_list_len; $x++) {
                    ?>
                    <h3 class="our-studyes-h3"><?=$studyes_list[$x]["name"];?></h2>
                    <div class="our-studyes-sub-block">
                        <?php
                            for ($j = 0; $j < count($studyes_list[$x]["list"])/*2*/; $j++) {
                        ?>
                        <div class="study-container">
                            <img src="images/<?=$studyes_list[$x]["list"][$j]["image"];?>"
                            class="study-img"
                            alt="<?=$studyes_list[$x]["list"][$j]["alt"];?>">
                            <div class="study-sub-container">
                                <h4 class="study-name"><?=$studyes_list[$x]["list"][$j]["study-name"];?></h4>
                                <p class="study-description"><?=$studyes_list[$x]["list"][$j]["study-description"];?></p>
                                <div class="study-sub-sub-container">
                                    <!--<a class="study-link study-link-hollow" href="#">ПРЕПОДАВАЕЛИ - Legacu</a>-->
                                    <form action="teachers.php" method="POST">
                                        <button class="study-link study-link-hollow" type="submit" class="">ПРЕПОДАВАЕЛИ</button>
                                        <input class="invisible" type="text" name="teacher-studyes" value="<?=$studyes_list[$x]["list"][$j]["id"];?>">
                                    </form>
                                    <a class="study-link study-link-hollow" href="#">ПРОГРАММА ОБУЧЕНИЯ</a>
                                    <button class="study-button study-link-filled" value="<?=$studyes_list[$x]["list"][$j]["id"];?>">ДОБАВИТЬ ПРЕДМЕТ</button>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                    ?>
                    </div>
                    <?php
                    } ?>
                </div>
            </main>
            <?php require_once 'components/footer.php';?>
            <div class="study-choice-modal invisible">
                <div class="study-choice-on">
                    <span class="study-choice-text">Выбрано предметов</span>
                    <span class="study-choice-number">
                        <span class="study-choice-counter">0</span>/5
                    </span>
                </div>
                <div class="study-choice-progress-bar">
                    <span class="study-choice-progress-bar-filled"></span>
                </div>
                <form action="study-application.php" method="POST">
                <button type="submit" class="study-choice-further-button">ДАЛЕЕ</button>
                <input class="invisible choiced-studyestext-input" type="text" name="choicedstudyes">
                </form>
            </div>
</body>
</html>
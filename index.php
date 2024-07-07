<?php require_once 'data/studies-list.php';?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Проксима | Главная</title>
    <?php require_once 'components/default-css-imports.php';?>
    <link rel="stylesheet" href="styles/mainpage.css">
    <link rel="stylesheet" href="styles/studi-choice-modal.css">
    <script src="scripts/mainpage.js" defer></script>
</head>
<body>
<?php require_once 'components/top-nav.php';?>
            <div class="about">
                <p class="p-about">Образовательный центр «Проксима» предоставляет вам второе обучение, но не для диплома, а для души. Здесь вы можете освоить различные IT, творческие специальности и прикоснуться к тайнам мироздания. Мы проводим занятия не в онлайне, а в живую, пока только в пяти городах России</p>
            </div>
            <main class="our-studies">
                <h2 class="our-studies-h2">НАШИ ЗАНЯТИЯ</h2>
                <div class="our-studies-block">
                    <?php
                    $studies_list_len = count($studies_list);
                    for ($x = 0; $x < $studies_list_len; $x++) {
                    ?>
                    <h3 class="our-studies-h3"><?=$studies_list[$x]["name"];?></h2>
                    <div class="our-studies-sub-block">
                        <?php
                            for ($j = 0; $j < count($studies_list[$x]["list"])/*2*/; $j++) {
                        ?>
                        <div class="studi-container">
                            <img src="images/<?=$studies_list[$x]["list"][$j]["image"];?>"
                            class="studi-img"
                            alt="<?=$studies_list[$x]["list"][$j]["alt"];?>">
                            <div class="studi-sub-container">
                                <h4 class="studi-name"><?=$studies_list[$x]["list"][$j]["studi-name"];?></h4>
                                <p class="studi-description"><?=$studies_list[$x]["list"][$j]["studi-description"];?></p>
                                <div class="studi-sub-sub-container">
                                    <a class="studi-link studi-link-hollow" href="#">ПРЕПОДАВАЕЛИ</a>
                                    <a class="studi-link studi-link-hollow" href="#">ПРОГРАММА ОБУЧЕНИЯ</a>
                                    <button class="studi-button studi-link-filled" value="<?=$studies_list[$x]["list"][$j]["id"];?>">ДОБАВИТЬ ПРЕДМЕТ</button>
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
            <div class="studi-choice-modal invisible">
                <div class="studi-choice-on">
                    <span class="studi-choice-text">Выбрано предметов</span>
                    <span class="studi-choice-number">
                        <span class="studi-choice-counter">0</span>/5
                    </span>
                </div>
                <div class="studi-choice-progress-bar">
                    <span class="studi-choice-progress-bar-filled"></span>
                </div>
                <form action="studi-application.php" method="POST">
                <button type="submit" class="studi-choice-further-button">ДАЛЕЕ</button>
                <input class="invisible choiced-studiestext-input" type="text" name="choicedStudies">
                </form>
            </div>
</body>
</html>
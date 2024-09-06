<?php require_once 'data/studyes-list.php';?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Проксима | Главная</title>
    <?php require_once 'components/default-css-imports.php';?>
    <link rel="stylesheet" href="styles/blog.css">
</head>
<body  class="theme-light">
<?php require_once 'components/top-nav.php';?>
    <h2 class="blog-list-title-h2">НАШ БЛОГ</h2>
    <?php
        for ($i = 0; $i < 4; $i++) {
            ?>
            <div class="blog-item">
                <div class="blog-sub-item">
                    <h3 class="blog-item-title">Основы лайков и репостов</h3>
                    <p class="blog-item-text">Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация листов Letraset с образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum. Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. </p>
                </div>
                <img class="blog-item-image"
                src="blog-images/Like dog.png">
            </div>
            <?php
        }
    ?>
<?php require_once 'components/footer.php';?>
</body>
</html>
<?php require_once 'data/teachers-list.php';
require_once 'components/test-input.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Проксима | Преподаватели</title>
    <?php require_once 'components/default-css-imports.php';?>
    <link rel="stylesheet" href="styles/teachers.css">
    <style class="teacher-city-styles" type="text/css">
    </style>
    <style class="teacher-studyes-styles" type="text/css">
        <?php $teacherstudyes = test_input($_POST["teacher-studyes"]);?>
        .teacher-card:not([data-teacher-studyes*="<?=$teacherstudyes;?>"]) {
            display: none;
        }
    </style>
    <script src="scripts/teachers.js" defer></script>
</head>
<body>
<?php require_once 'components/top-nav.php';?>
<main class="teachers-main">
<h2 class="teachers-h2">НАШИ ПРЕПОДАВАТЕЛИ</h2>
<h3 class="filters-h">Фильтры</h3>
<form class="rendered-form">
            <div class="rendered-form-block">
                <div class="rendered-form-sub-block">
                <label class="">Город</label>
                    <select class="city-options"  name="city" id="">
                        <option value="all">Все</option>
                        <option value="Санкт-Петербург">Санкт-Петербург</option>
                        <option value="Москва">Москва</option>
                        <option value="Владивосток">Владивосток</option>
                        <option value="Пермь">Пермь</option>
                        <option value="Омск">Омск</option>
                    </select>
                </div>
                <div class="rendered-form-sub-block">
                <label>Кафедра</label>
                <select class="study-options" name="city" id="">
                    <option value="all">Все</option>
                    <option value="js-study">Кафедра JavaScript-разработки</option>
                    <option value="programers-mindset">Кафедра мышления программиста</option>
                    <option value="unity-study">Кафедра Unity-разработки</option>
                    <option value="oop-study">Кафедра объектно-ориентированного программирования</option>
                    <option value="physics-study">Кафедра физики</option>
                    <option value="uiux-study">Кафедра UI/UX дизайна</option>
                    <option value="motion-study">Кафедра моушен-дизайна</option>
                    <option value="marketing-study">Кафедра маркетинга</option>
                    <option value="management-study">Кафедра менеджмента</option>
                    <option value="philopsophy-study">Кафедра философии</option>
                    <option value="quantum-study">Кафедра квантовой физики</option>
                    <option value="3d-study">Кафедра 3D-художников</option>
                    <option value="2d-study">Кафедра 2D-художников</option>
                </select>
                </div>
            </div>
</form>
<div class="teachers-block">            
<?php for ($i = 0; $i < count($teachers_list); $i++) {
    ?>
    <div class="teacher-card" data-teacher-city="<?=$teachers_list[$i]["city"];?>"
    data-teacher-studyes="<?php for ($j = 0; $j < count($teachers_list[$i]["studyes"]); $j++) {
        echo $teachers_list[$i]["studyes"][$j];
        if (count($teachers_list[$i]["studyes"]) - 1 != $j) {
            echo ' ';
        }
    }
    ?>">
        <img class="teacher-photo" src="images/<?=$teachers_list[$i]["image"];?>">
        <h4 class="teacher-name"><?=$teachers_list[$i]["name"];?></h4>
        <p class="teacher-studyes">
            <?php for ($j = 0; $j < count($teachers_list[$i]["studyes-names"]); $j++) {
                echo $teachers_list[$i]["studyes-names"][$j];
                if (count($teachers_list[$i]["studyes-names"]) - 1 != $j) {
                    echo ', ';
                }
            }
            ?>
        </p>
        <span class="teacher-city"><?=$teachers_list[$i]["city"];?></span>
    </div>
    <?php
}
?>
</div>

</main>
<?php require_once 'components/footer.php';?>
</body>
</html>
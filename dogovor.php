<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Проксима | Договор об обучении</title>
    <?php require_once 'components/default-css-imports.php';?>
    <link rel="stylesheet" href="styles/dogovor.css">
</head>
<body class="theme-light">
<?php require_once 'components/top-nav.php';?>
<main class="dogovor-main">
    <h2 class="dogovor-h2">ДОГОВОР ОБ ОБУЧЕНИИ</h2>
    <p class="dogovor-text">
    <?php
        $dogovor = fopen("documents/dogovor.txt", "r") or die("Unable to open file!");
        echo fread($dogovor,filesize("documents/dogovor.txt"));
        fclose($dogovor);
    ?>
    </p>
</main>
<?php require_once 'components/footer.php';?>
</body>
</html>
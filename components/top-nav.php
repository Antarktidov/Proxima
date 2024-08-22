<?php $standart_path = '/Proxima';?>
<nav class="nav-main">
        <span class="nav-main-top">
            <span class="logo-and-name">
                <img src="images/Logo.png"
                class="company-logo"
                alt="Лого">
                <h1 class="company-name">Проксима</h1>
                </span>
                <nav class="sub-nav">
                    <a class="nav-link" href="<?=$standart_path;?>">Главная</a>
                    <a class="nav-link" href="<?=$standart_path;?>/teachers.php">Преподаватели</a>
                    <a class="nav-link" href="<?=$standart_path;?>/dogovor.php">Договор об обучении</a>
                </nav>
                <img src="images/hambureger-menu.png"
                class="hambureger-menu-cross"
                width="39"
                height="29"
                alt="Лого">
        </span>
</nav>
<nav class="sub-nav-mobile invisible">
                <a class="nav-link" href="<?=$standart_path;?>">Главная</a>
                <a class="nav-link" href="#">Преподаватели</a>
                <a class="nav-link" href="#">Договор об обучении</a>
            </nav>
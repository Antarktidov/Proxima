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
                    <a class="nav-link" href="<?=$standart_path;?>/blog.php">Блог</a>
                </nav>
                <!--<div class="top-desktop-icons">-->
                    <img src="images/hambureger-menu.png"
                    class="hambureger-menu-cross"
                    width="39"
                    height="29"
                    alt="Лого">
                    <img src="images/MoonThemeToggler.png"
                    class="theme-toggler"
                    width="56"
                    height="61"
                    alt="Переключатель тем">
                <!--</div>-->
        </span>
</nav>
<nav class="sub-nav-mobile invisible">
                    <a class="nav-link" href="<?=$standart_path;?>">Главная</a>
                    <a class="nav-link" href="<?=$standart_path;?>/teachers.php">Преподаватели</a>
                    <a class="nav-link" href="<?=$standart_path;?>/dogovor.php">Договор об обучении</a>
                    <a class="nav-link" href="<?=$standart_path;?>/blog.php">Блог</a>
                    <span class="theme-toggler-mobile nav-link">
                        <a class="theme-toggler-nav-link" href="#">Тёмная тема</a>
                        <img src="images/MoonThemeToggler.png"
                        class="theme-toggler-mobile-icon"
                        width="56"
                        height="61"
                        alt="Переключатель тем">
                    </span>
            </nav>
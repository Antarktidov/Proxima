<?php $proximaTheme1 = $_COOKIE[$proximaTheme];
    if ($proximaTheme1 == 'light') {
        $themeSelector = 'theme-light';
    } else if ($proximaTheme1 == 'dark') {
        $themeSelector = 'theme-dark';
    } else {
        $themeSelector = 'theme-light';
    }
?>
<body class="<?=$themeSelector;?>">
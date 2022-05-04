<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="body">
    <header>
        <div class="header_maxwidth">
            <div>
                <div class="burger">
                    <img src="images/burger.png" title="Меню">
                </div>
            </div>
            <div class="nazvanie">
                <h1>Название</h1>
            </div>
            <div class="ssilki">
                
                <?php
                if (proverka()){
                    echo '<a href="index.php" class="a">Главная</a>';
                    if(roleName() == 'администратор'){
                        echo '<a href="adminpanel.php" class="a">Админ</a>';
                    }
                    if(roleName() == 'модератор'){
                        echo '<a href="adminpanel.php" class="a">Модерация</a>';
                    }
                    echo '<a href="obyavlenie.php" class="a">Объявления</a>';
                    echo '<a href="tokenclear.php" class="a">Выйти</a>';
                }
                ?>
            </div>
        </div>  
    </header>
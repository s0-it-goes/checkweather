<?php
    require_once '/var/www/app/description/information.php';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Погода в <?= $city ?></title>
    
</head>
<body>
    <div style = 'margin-left: 40px; margin-top: 70px'>
        <form action='index.php' method='POST' >
            <h1>Введите город</h1>
            <input name='city' type='text'>
        </form>
        
        <div>
            <?php
                if(isset($_POST['city'])):
            ?>      
                    <p style = 'line-height: 40px; font-size: 20px; font-weight: bold'>
                        Погода в городе <?= $city ?>: <br />
                        <?= $temp . '°C' ?> , <?= $feels_like . '°C' ?> <br />
                        <span style = 'display: flex; align-items: center;'><?= $weather ?><?= $icon ?></span>
                        <?= 'Ветер ' . $wind['direction'] ?> <?= $wind['speed'] . ' м/с' ?> 
                        <?php 
                            if(isset($wind['gust'])) {
                                echo 'с порывами до ' . $wind['gust'] . ' м/с';
                            }
                        ?>
                        <br />
                        Рассвет: <?= $time['sunrise'] ?>
                        <br />
                        Закат: <?= $time['sunset'] ?>
                    </p>
            <?php
                endif;
            ?>
        </div>
        <img src="images/01d.png">
    </div>
</body>
</html>
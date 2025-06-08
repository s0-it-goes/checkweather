<?php

declare(strict_types=1);

require_once '/var/www/main/description/Description.php';

$Des = new Description(new Data);

$city = $Des->getCity();

$weather = $Des->getWeather();

$temp = $Des->getTemp();

$feels_like = $Des->getFeelsLike();

$wind = $Des->getWind();

$time = $Des->getTime();

$icon = $Des->getIcon();
<?php

declare(strict_types=1);

namespace App\description;

spl_autoload_register(function($class){
    $path = '/var/www/' . lcfirst(str_replace('\\', '/', $class)) . '.php';
    if(file_exists($path)) {
        require $path;
    }
});

use App\Data\Data;

$Des = new Description(new Data);

$city = $Des->getCity();

$weather = $Des->getWeather();

$temp = $Des->getTemp();

$feels_like = $Des->getFeelsLike();

$wind = $Des->getWind();

$time = $Des->getTime();

$icon = $Des->getIcon();
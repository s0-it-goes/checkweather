<?php

declare(strict_types=1);

namespace App\description;

require_once '/var/www/app/Data/Data.php';
require_once '/var/www/app/description/Description.php';

use App\Data\Data;

$Des = new Description(new Data);

$city = $Des->getCity();

$weather = $Des->getWeather();

$temp = $Des->getTemp();

$feels_like = $Des->getFeelsLike();

$wind = $Des->getWind();

$time = $Des->getTime();

$icon = $Des->getIcon();
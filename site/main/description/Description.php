<?php

declare(strict_types=1);

require_once '/var/www/main/data/Data.php';
require_once '/var/www/main/helpers/DateHandler.php';
require_once '/var/www/main/helpers/WindInfo.php';

class Description
{
    
    private $data;

    public function __construct(private Data $DataObject)
    {
        $this->data = $this->DataObject->getData();
    }

    public function getCity(): string
    {
        $city = $this->data['name'];

        return $city;
    }

    public function getWeather(): string
    {
        $weather = $this->data['weather'][0]['description'];
        $weather = mb_strtoupper(mb_substr($weather, 0, 1), 'utf-8') . 
            mb_substr($weather, 1, mb_strlen($weather) - 1);
        
        return $weather;
    }

    public function getTemp(): string
    {
        $temp =  (string) round($this->data['main']['temp'], 1, PHP_ROUND_HALF_UP);
        $temp = str_replace('.', ',', $temp);
        return 'Температура воздуха ' . $temp;
    }

    public function getFeelsLike(): string
    {
        $feels_like =  (string) round($this->data['main']['feels_like'], 1, PHP_ROUND_HALF_UP);
        $feels_like = str_replace('.', ',', $feels_like);
        return 'ощущается как ' . $feels_like;
    }

    public function getWind(): array
    {
        $Wind = new WindInfo($this->DataObject);
        $windinfo = [];

        $windinfo['speed'] = $Wind->speed();
        $windinfo['direction'] = $Wind->direction();

        if(isset($data['wind']['gust']))
            $windinfo['gust'] = $Wind->gust();

        return $windinfo;
    }

    public function getTime(): array
    {
        $Date = new DateHandler($this->DataObject);

        $time = [];

        $time['sunrise'] = $Date->sunrise();
        $time['sunset'] = $Date->sunset();

        return $time;
    }

    public function getIcon()
    {
        $iconId = $this->data['weather'][0]['icon'];
        $icon = "<img src='images/$iconId.png' style='width: 40px; padding: 0px '>";

        return $icon;
    }
}
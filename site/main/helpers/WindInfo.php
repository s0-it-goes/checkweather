<?php

declare(strict_types=1);

require_once '/var/www/main/data/Data.php';

class WindInfo
{
    private $data;

    public function __construct(private Data $DataObject) 
    {
        $this->data = $this->DataObject->getData();
    }

    public function speed(): int|float
    {
        $speed = $this->data['wind']['speed'];
        
        return $speed;
    }

    public function direction(): string
    {
        $deg = $this->data['wind']['deg'];

        if ($deg > 315 || $deg < 45) {
            return 'северный';
        } elseif ($deg >= 45 || $deg <= 135) {
            return 'восточный';
        } elseif ($deg > 135 || $deg < 225) {
            return 'южный';
        } elseif ($deg >= 225 || $deg <= 315) {
            return 'западный';
        }
        
        return 'error';
    }

    public function gust(): int|float
    {
        $gust = $this->data['wind']['gust'];

        return $gust;
    }
}
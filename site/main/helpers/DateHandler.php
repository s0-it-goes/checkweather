<?php

declare(strict_types=1);

require_once '/var/www/main/data/Data.php';

class DateHandler {
    private $data;
    private int $sunrise;
    private int $sunset;

    public function __construct(private Data $DataObject)
    {
        $this->data = $this->DataObject->getData();
        $this->sunrise = $this->data['sys']['sunrise'] + $this->data['timezone'];
        $this->sunset = $this->data['sys']['sunset'] + $this->data['timezone'];
    }

    public function sunrise() 
    {   
        $sunrise = date('H:i', $this->sunrise);

        return $sunrise;
    }

    public function sunset() 
    {   
        $sunset = date('H:i', $this->sunset);

        return $sunset;
    }
}
<?php

declare(strict_types=1);

namespace helpers;

require_once '/var/www/app/Data/Data.php';

use App\Data\Data;

class DateHandler {
    private $data;
    private int $sunrise;
    private int $sunset;

    public function __construct(private Data $DataObject)
    {
        $this->data = $DataObject();
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
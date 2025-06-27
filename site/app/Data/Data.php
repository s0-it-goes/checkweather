<?php

declare(strict_types=1);

namespace App\Data;

class Data
{
    private $ResponseObject;
    private $response;

    public function __construct()
    {
        $this->ResponseObject = new Response();
        $this->response = $this->ResponseObject->getResponse();
    }
    

    public function getData(): mixed
    {
        $data = json_decode($this->response, true);

        if((int)$data['cod'] === 404 ||(isset($_POST['city']) && $_POST['city'] === '')) {
            header("Location: http://localhost/index.php");
            die();
        }

        if ($data['sys']['country'] === 'UA') {
            $data['sys']['country'] = 'RU';
        }

        $this->ResponseObject->closeCurl();

        return $data;
    }

    public function __invoke()
    {
        return $this->getData();
    }
}
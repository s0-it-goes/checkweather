<?php

declare(strict_types=1);

class Response
{
    private string $url = 'https://api.openweathermap.org/data/2.5/weather';
    private array $options = [
        'appId' => 'f37d174bbf5e038e995bb44222aa505f',
        'units' => 'metric',
        'lang' => 'ru'
    ];
    
    private $ch;
    private $response;

    public function __construct()
    {
        if(isset($_POST['city'])) {
            $this->options['q'] = $_POST['city'];
        } else {
            $this->options['q'] = 'Москва';
        }

        $this->ch = curl_init();

        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($this->ch, CURLOPT_URL, $this->url . '?' . http_build_query($this->options));
    }

    public function getResponse(): bool|string 
    {
        $this->response = curl_exec($this->ch);

        return $this->response;
    }

    public function closeCurl()
    {
        curl_close($this->ch);
    }
}
<?php

namespace App\Services\PaymentSystem;

use GuzzleHttp\Client;

class GetPaymentSystemService
{
    public function __construct(
        private readonly Client $client
    )
    {
    }

    public function check(string $curdNumber): string
    {
        // прокидываем номер карты на урл, получаем результат в json, парсим его и получаем в ответ любые интересующие нас данные о карте
        $response = $this->client->request(
            'GET',
            'https://lookup.binlist.net/' . $curdNumber,
        );
        $result = json_decode($response->getBody()->getContents());

        return $result['scheme'];
    }
}

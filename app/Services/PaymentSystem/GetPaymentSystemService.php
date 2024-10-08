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
        $response = $this->client->request(
            'GET',
            'https://lookup.binlist.net/' . $curdNumber,
        );
        $result = json_decode($response->getBody()->getContents());

        return $result['scheme'];
    }
}

<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_check_payment_system_returns_a_successful_response()
    {
        $response = $this->post(
            '/files/check-payment-system',
            [
                'file' => 'filePath'
            ],
            [
                'sendLink' => 'sendLink',
            ]
        );

        $response->assertStatus(200);
    }
}

<?php

namespace App\Services\PaymentSystem;

class CheckPaymentSystemService
{
    private string $filePath;

    public function __construct(
        private readonly GetPaymentSystemService $getPaymentSystemService
    )
    {
    }

    public function setFilePath(string $filePath)
    {
        $this->filePath = $filePath;

        return $this;
    }

    public function definePaymentSystem(): static
    {
        // TODO foreach card list
        $cardNumber = '2222222222222222';

        $paymentSystem = $this->getPaymentSystemService->check($cardNumber);

        $this->saveToFile($paymentSystem);

        return $this;
    }

    private function saveToFile(string $paymentSystem): void
    {
        // TODO save payment system to file
    }

    public function getFilePath(): string
    {
        return $this->filePath;
    }

}

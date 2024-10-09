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
        // достаём номер карты, прокидываем на проверку и сохраняем результат
        $cardNumber = '2222222222222222';

        $paymentSystem = $this->getPaymentSystemService->check($cardNumber);

        $this->saveToFile($paymentSystem);

        return $this;
    }

    private function saveToFile(string $paymentSystem): void
    {
        // логика сохранения результата в файл
    }

    public function getFilePath(): string
    {
        return $this->filePath;
    }

}

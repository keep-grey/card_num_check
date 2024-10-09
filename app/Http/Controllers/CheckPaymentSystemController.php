<?php

namespace App\Http\Controllers;

use App\Services\PaymentSystem\CheckPaymentSystemService;
use App\Services\SendFile\SendFileService;
use Illuminate\Http\Client\Request;

class CheckPaymentSystemController extends Controller
{
    public function __construct(
        private readonly CheckPaymentSystemService $checkPaymentSystemService,
        private readonly SendFileService $sendFileService
    )
    {
    }

    public function check(Request $request)
    {
        // получаем файл и заголовки
        $file = $request->input('file');
        $header = $request->header('fileLink');
        // проверяем номер карты и записываем результат
        $resultFilePath = $this->checkPaymentSystemService
            ->setFilePath($file)
            ->definePaymentSystem()
            ->getFilePath();
        // отправляем файл
        $this->sendFileService
            ->setFilePath($resultFilePath)
            ->send($header[0]);

        return response();
    }
}

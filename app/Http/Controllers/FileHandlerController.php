<?php

namespace App\Http\Controllers;

use SystemCheckServicec;
use Illuminate\Http\Client\Request;
use SendFile;

class FileHandlerController extends Controller
{
    public function __construct(
        private readonly SystemCheckServicec $systemCheckServicec,
        private readonly SendFile $sendFile
    )
    {
    }

    public function systemCheck(Request $request)
    {
        $file = $request->input('file');
        $header = $request->header('fileLink');

        $resultFilePath = $this->systemCheckServicec
            ->setFilePath($file)
            ->definePaymentSystem()
            ->getFilePath();

        $this->sendFile
            ->setFilePath($resultFilePath)
            ->sendFile($header);

        return response();
    }
}

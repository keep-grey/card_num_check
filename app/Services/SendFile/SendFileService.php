<?php

namespace App\Services\SendFile;

class SendFileService
{
    private string $filePath;

    public function setFilePath(string $filePath): static
    {
        $this->filePath = $filePath;

        return $this;
    }

    public function send(string $sendLink): void
    {
        // отправка файла обратно по ссылке
    }
}

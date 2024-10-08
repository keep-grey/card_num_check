<?php

class SendFile
{
    private string $filePath;

    public function setFilePath(string $filePath): static
    {
        $this->filePath = $filePath;

        return $this;
    }

    public function sendFile(string $sendLink): void
    {
        // TODO:
    }
}

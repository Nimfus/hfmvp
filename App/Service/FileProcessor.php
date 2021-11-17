<?php

namespace App\Service;

use App\Service\Contract\FileProcessorInterface;

class FileProcessor implements FileProcessorInterface
{
    /**
     * @inheritDoc
     */
    public function getFileContent(string $fileName): string
    {
        return file_get_contents($fileName);
    }
}

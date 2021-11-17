<?php

namespace App\Service\Contract;

interface FileProcessorInterface
{
    /**
     * @param string $fileName
     * @return string
     */
    public function getFileContent(string $fileName): string;
}

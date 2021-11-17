<?php

namespace App\Validation\Contract;

use App\Exception\FileFormatIsNotSupported;

interface FileExtensionValidatorInterface
{
    /**
     * @param array $formats
     */
    public function setValidFormats(array $formats): void;

    /**
     * @param string extension
     * @throws FileFormatIsNotSupported
     */
    public function validate(string $extension): void;
}

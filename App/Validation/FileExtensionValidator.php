<?php

namespace App\Validation;

use App\Exception\FileFormatIsNotSupported;
use App\Validation\Contract\FileExtensionValidatorInterface;

class FileExtensionValidator implements FileExtensionValidatorInterface
{
    /** @var array */
    private array $validFormats;

    /**
     * @inheritDoc
     */
    public function setValidFormats(array $formats): void
    {
        $this->validFormats = $formats;
    }

    /**
     * @inheritDoc
     */
    public function validate(string $extension): void
    {
        if (!in_array($extension, $this->validFormats)) {
            throw new FileFormatIsNotSupported();
        }
    }
}

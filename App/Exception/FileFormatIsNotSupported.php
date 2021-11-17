<?php

namespace App\Exception;

use Exception;

class FileFormatIsNotSupported extends Exception
{
    /** @var string */
    protected $message = 'Uploaded file format is not supported';
}

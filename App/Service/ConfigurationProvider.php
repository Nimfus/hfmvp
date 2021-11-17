<?php

namespace App\Service;

class ConfigurationProvider
{
    /**
     * @return array
     */
    public static function getConfiguration(): array
    {
        return include('../config/app.php');
    }
}

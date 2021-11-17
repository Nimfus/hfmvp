<?php

namespace App\Service\Contract;

use App\Exception\FileFormatIsNotSupported;
use App\Service\Hydrators\Contract\HydratorInterface;

interface FileHydratorProviderInterface
{
    /**
     * @param string $extension
     * @return HydratorInterface
     * @throws FileFormatIsNotSupported
     */
    public function getHydrator(string $extension): HydratorInterface;
}

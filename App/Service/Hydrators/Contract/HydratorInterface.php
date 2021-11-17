<?php

namespace App\Service\Hydrators\Contract;

use App\Models\User;

interface HydratorInterface
{
    /**
     * @param string $fileContent
     * @return User[]
     */
    public function hydrate(string $fileContent): array;
}

<?php

namespace App\Service\Hydrators;

use App\Service\Hydrators\Contract\HydratorInterface;

abstract class GenericHydrator implements HydratorInterface
{
    /** @var string */
    const COLUMNS = 'columns';

    /** @var array */
    protected array $configuration;

    /**
     * @param array $configuration
     */
    public function __construct(array $configuration)
    {
        $this->configuration = $configuration;
    }
}

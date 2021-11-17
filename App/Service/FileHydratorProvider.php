<?php

namespace App\Service;

use App\Exception\FileFormatIsNotSupported;
use App\FormatsDictionary;
use App\Service\Contract\FileHydratorProviderInterface;
use App\Service\Hydrators\Contract\HydratorInterface;
use App\Service\Hydrators\CsvHydrator;
use App\Service\Hydrators\JsonHydrator;
use App\Service\Hydrators\XmlHydrator;

class FileHydratorProvider implements FileHydratorProviderInterface
{
    /** @var string */
    const CONFIG = 'config';

    /**
     * @inheritDoc
     */
    public function getHydrator(string $extension): HydratorInterface
    {
        $config = ConfigurationProvider::getConfiguration();
        switch ($extension) {
            case FormatsDictionary::JSON:
                $hydrator = new JsonHydrator($config[static::CONFIG][FormatsDictionary::JSON]);
                break;
            case FormatsDictionary::XML:
                $hydrator = new XmlHydrator($config[static::CONFIG][FormatsDictionary::XML]);
                break;
            case FormatsDictionary::CSV:
                $hydrator = new CsvHydrator($config[static::CONFIG][FormatsDictionary::CSV]);
                break;
            default:
                throw new FileFormatIsNotSupported();
        }

        return $hydrator;
    }
}

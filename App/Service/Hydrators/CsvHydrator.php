<?php

namespace App\Service\Hydrators;

use App\Models\User;

class CsvHydrator extends GenericHydrator
{
    /**
     * @inheritDoc
     */
    public function hydrate(string $fileContent): array
    {
        $hydratedUsers = [];

        $decodedUsers = explode(PHP_EOL, $fileContent);

        for ($i = 0; $i < count($decodedUsers); $i++) {
            if ($this->configuration['has_header'] && $i === 0) continue;
            $decodedUser = str_getcsv($decodedUsers[$i], $this->configuration['values_separator']);;
            $hydratedUser = [];
            foreach ($this->configuration[self::COLUMNS] as $key => $index) {
                $hydratedUser[$key] = str_replace('\'', '', $decodedUser[$index]);
            }
            array_push($hydratedUsers, new User(...array_values($hydratedUser)));
        }

        return $hydratedUsers;
    }
}

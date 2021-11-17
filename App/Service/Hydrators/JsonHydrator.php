<?php

namespace App\Service\Hydrators;

use App\Models\User;

class JsonHydrator extends GenericHydrator
{
    /**
     * @inheritDoc
     */
    public function hydrate(string $fileContent): array
    {
        $hydratedUsers = [];

        $decodedUsers = json_decode($fileContent, true);

        foreach ($decodedUsers as $decodedUser) {
            $hydratedUser = [];
            foreach ($this->configuration[self::COLUMNS] as $key => $property) {
                $hydratedUser[$key] = $decodedUser[$property];
            }
            array_push($hydratedUsers, new User(...array_values($hydratedUser)));
        }

        return $hydratedUsers;
    }
}

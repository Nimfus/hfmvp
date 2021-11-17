<?php

namespace App\Service\Hydrators;

use App\Models\User;
use Exception;
use SimpleXMLElement;

class XmlHydrator extends GenericHydrator
{
    /**
     * @inheritDoc
     * @throws Exception
     */
    public function hydrate(string $fileContent): array
    {
        $hydratedUsers = [];

        $decodedUsers = new SimpleXMLElement($fileContent);
        foreach ($decodedUsers->{$this->configuration['element_node']} as $decodedUser) {
            $hydratedUser = [];
            foreach ($this->configuration[self::COLUMNS] as $key => $property) {
                $hydratedUser[$key] = (string)$decodedUser->$property;
            }
            array_push($hydratedUsers, new User(...array_values($hydratedUser)));
        }

        return $hydratedUsers;
    }
}

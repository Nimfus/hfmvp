<?php

namespace App\Models;

class User
{
    /** @var string */
    private string $firstName;

    /** @var int */
    private int $age;

    /** @var string */
    private string $gender;

    /**
     * @param string $firstName
     * @param int $age
     * @param string $gender
     */
    public function __construct(string $firstName, int $age, string $gender)
    {
        $this->firstName = $firstName;
        $this->age = $age;
        $this->gender = $gender;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @return string
     */
    public function getGender(): string
    {
        return $this->gender;
    }
}

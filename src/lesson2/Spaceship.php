<?php

declare(strict_types=1);

class Spaceship implements UObject
{
    private array $map = [];

    public function getProperty(string $key): object|int|null
    {
        return $this->map[$key] ?? null;
    }

    public function setProperty(string $key, object|int $newValue): void
    {
        $this->map[$key] = $newValue;
    }
}
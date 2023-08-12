<?php

declare(strict_types=1);

interface UObject
{
    public function getProperty(string $key): object|int|null;

    public function setProperty(string $key, object|int $newValue);
}
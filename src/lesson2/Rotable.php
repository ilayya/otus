<?php

declare(strict_types=1);

interface Rotable
{
    public function getDirection(): int;

    public function getAngularVelocity(): int;

    public function setDirection(int $newV): void;

    public function getDirectionsNumber(): int;
}
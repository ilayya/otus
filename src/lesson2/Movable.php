<?php

declare(strict_types=1);

interface Movable
{
    public function getPosition(): Vector;

    public function setPosition(Vector $newV): void;

    public function getVelocity(): Vector;
}
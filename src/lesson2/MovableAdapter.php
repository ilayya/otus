<?php

declare(strict_types=1);

class MovableAdapter implements Movable
{
    public function __construct(private readonly UObject $o)
    {
    }

    public function getPosition(): Vector
    {
        return $this->o->getProperty('Position');
    }

    public function setPosition(Vector $newV): void
    {
        $this->o->setProperty('Position', $newV);
    }

    public function getVelocity(): Vector
    {
        $d = $this->o->getProperty('Direction');
        $n = $this->o->getProperty('DirectionsNumber');
        $v = $this->o->getProperty('Velocity');

        if (is_null($d) || is_null($n) || is_null($v)) {
            throw new LogicException('Один или несколько параметров не задано');
        }

        return new Vector($v * cos($d / 360 * $n), $v * sin($d / 360 * $n));
    }
}
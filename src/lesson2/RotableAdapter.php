<?php

class RotableAdapter implements Rotable
{
    public function __construct(private readonly UObject $o)
    {
    }

    public function getDirection(): int
    {
        return (int)$this->o->getProperty('Direction');
    }

    public function getAngularVelocity(): int
    {
        return (int)$this->o->getProperty('AngularVelocity');
    }

    public function setDirection(int $newV): void
    {
        $this->o->setProperty('Direction', $newV);
    }

    public function getDirectionsNumber(): int
    {
        return (int)$this->o->getProperty('DirectionsNumber');
    }
}
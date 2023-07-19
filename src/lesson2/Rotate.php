<?php

declare(strict_types=1);

class Rotate
{
    public function __construct(
        private readonly Rotable $r
    )
    {
    }

    public function execute(): void
    {
        $this->r->setDirection(
            ($this->r->getDirection() + $this->r->getAngularVelocity())
            % $this->r->getDirectionsNumber()
        );
    }
}
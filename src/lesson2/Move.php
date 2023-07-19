<?php

declare(strict_types=1);

class Move
{
    public function __construct(
        private readonly Movable $m
    )
    {
    }

    public function execute(): void
    {
        $this->m->setPosition(
            Vector::plus($this->m->getPosition(), $this->m->getVelocity())
        );
    }
}
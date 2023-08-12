<?php

declare(strict_types=1);

class Vector
{
    public function __construct(
        public ?float $x = null,
        public ?float $y = null,
    )
    {
    }

    /**
     * @param Vector $a
     * @param Vector $b
     * @return self
     */
    public static function plus(self $a, self $b): self
    {
        return new self($a->x + $b->x, $a->y + $b->y);
    }
}
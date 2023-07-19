<?php

declare(strict_types=1);

class CommandQueue implements IQueue
{
    private array $commands = [];

    public function push(ICommand $item): void
    {
        $this->commands[] = $item;
    }

    public function pop(): ?ICommand
    {
        return array_shift($this->commands);
    }
}
<?php

declare(strict_types=1);

class RetryExceptionHandler implements ICommand
{
    public function __construct(
        public readonly ICommand  $command,
        public readonly Throwable $throwable,
        public readonly IQueue $queue,
    ) {
    }

    public function Execute(): void
    {
        $this->queue->push(new RetryCommand($this->command, $this->queue));
    }
}
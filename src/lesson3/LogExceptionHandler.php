<?php

class LogExceptionHandler implements ICommand
{
    public function __construct(
        public readonly ICommand  $command,
        public readonly Throwable $throwable,
        public readonly IQueue $queue,
    )
    {
    }

    public function Execute(): void
    {
        $this->queue->push(new LogCommand($this->throwable->getMessage()));
    }
}
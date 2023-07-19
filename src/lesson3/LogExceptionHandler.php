<?php

class LogExceptionHandler implements ICommand
{
    public function __construct(
        private readonly IQueue $queue,
        private readonly string $message,
        private readonly string $level,
    )
    {
    }

    public function Execute(): void
    {
        $this->queue->push(new LogCommand($this->message, $this->level));
    }
}
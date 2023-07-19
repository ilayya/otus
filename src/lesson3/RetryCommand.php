<?php

class RetryCommand implements ICommand
{
    public function __construct(
        private readonly ICommand $command,
        private readonly IQueue   $queue,
    )
    {
    }

    public function execute(): void
    {
        $this->queue->push($this->command);
    }
}
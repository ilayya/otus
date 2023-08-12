<?php

class LogCommand implements ICommand
{
    public function __construct(
        private readonly string $message,
        private readonly ILogger $logger = new Logger,
    )
    {
    }

    public function execute(): void
    {
        $this->logger->log($this->message);
    }
}
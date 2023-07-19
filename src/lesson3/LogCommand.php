<?php

class LogCommand implements ICommand
{
    public function __construct(
        private readonly string $message,
        private readonly string $level,
    )
    {
    }

    public function execute(): void
    {
        $file = fopen('log.txt', 'r');
        fwrite($file, $this->level . ': ' . $this->message);
        fclose($file);
    }
}
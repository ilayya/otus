<?php

declare(strict_types=1);

class CommandQueueExecutor
{
    public function execute(IQueue $queue): void
    {
        while (null !== ($command = $queue->pop())) {
            try {
                $command->execute();
            } catch (Throwable $e) {
                ExceptionHandler::handle($command, $e, $queue)->execute();
            }
        }
    }
}
<?php

declare(strict_types=1);

class CommandQueueExecutor
{
    public function execute(IQueue $queue, ExceptionHandler $exceptionHandler): void
    {
        while (null !== ($command = $queue->pop())) {
            try {
                $command->execute();
            } catch (Throwable $e) {
                $exceptionHandler->handle($command, $e, $queue)->execute();
            }
        }
    }
}
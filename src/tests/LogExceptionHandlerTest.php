<?php

use PHPUnit\Framework\TestCase;

class LogExceptionHandlerTest extends TestCase
{
    public function testLogCommand(): void
    {
        $queue = $this->getMockBuilder(IQueue::class)->getMock();
        $throwable = $this->getMockBuilder(Throwable::class)->getMock();
        $command = $this->getMockBuilder(ICommand::class)->getMock();

        $queue->expects($this->once())->method('push');

        (new LogExceptionHandler($command, $throwable, $queue))->Execute();
    }
}
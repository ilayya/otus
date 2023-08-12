<?php

use PHPUnit\Framework\TestCase;

class RetryExceptionHandlerTest extends TestCase
{
    public function testRetryExceptionHandler(): void
    {
        $queue = $this->getMockBuilder(IQueue::class)->getMock();
        $throwable = $this->getMockBuilder(Throwable::class)->getMock();
        $command = $this->getMockBuilder(ICommand::class)->getMock();

        $queue->expects($this->once())->method('push');

        (new RetryExceptionHandler($command, $throwable, $queue))->Execute();
    }
}
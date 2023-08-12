<?php

use PHPUnit\Framework\TestCase;

class RetryCommandTest extends TestCase
{
    public function testRetryCommand()
    {
        $queue = $this->getMockBuilder(IQueue::class)->getMock();
        $command = $this->getMockBuilder(ICommand::class)->getMock();

        $queue->expects($this->once())->method('push')->with($command);

        (new RetryCommand($command, $queue))->Execute();
    }
}
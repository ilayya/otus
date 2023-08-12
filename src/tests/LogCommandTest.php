<?php

use PHPUnit\Framework\TestCase;

class LogCommandTest extends TestCase
{
    public function testLogging()
    {
        $logger = $this->getMockBuilder(ILogger::class)->getMock();

        $logger->expects($this->once())->method('log')->with('тест');

        (new LogCommand('тест', $logger))->execute();
    }
}
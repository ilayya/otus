<?php

use PHPUnit\Framework\TestCase;

class MacroCommandTest extends TestCase
{
    /**
     * @throws MacroCommandException
     */
    public function testMacroCommand(): void
    {
        $command1 = $this->getMockBuilder(ICommand::class)->getMock();
        $command2 = $this->getMockBuilder(ICommand::class)->getMock();

        $command1->expects($this->once())->method('execute');
        $command2->expects($this->once())->method('execute');

        (new MacroCommand([$command1, $command2]))->execute();
    }

    /**
     * @throws MacroCommandException
     */
    public function testMacroCommandException(): void
    {
        $command1 = $this->getMockBuilder(ICommand::class)->getMock();
        $command2 = $this->getMockBuilder(ICommand::class)->getMock();

        $command1->expects($this->once())->method('execute');
        $command2->expects($this->once())->method('execute')->willThrowException(new Exception());

        $this->expectException(MacroCommandException::class);

        (new MacroCommand([$command1, $command2]))->execute();
    }
}
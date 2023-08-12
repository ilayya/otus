<?php

use PHPUnit\Framework\TestCase;

class CheckFuelBurnFuelAndMoveCommandTest extends TestCase
{
    /**
     * @throws MacroCommandException
     */
    public function testCommand(): void
    {
        $moveCommand = $this->getMockBuilder(ICommand::class)->getMock();
        $burnFuelCommand = $this->getMockBuilder(ICommand::class)->getMock();
        $checkFuelCommand = $this->getMockBuilder(ICommand::class)->getMock();

        $moveCommand->expects($this->once())->method('execute');
        $burnFuelCommand->expects($this->once())->method('execute');
        $checkFuelCommand->expects($this->once())->method('execute');

        (new CheckFuelBurnFuelAndMoveCommand($moveCommand, $burnFuelCommand, $checkFuelCommand))->execute();
    }

    /**
     * @throws MacroCommandException
     */
    public function testCommandException(): void
    {
        $moveCommand = $this->getMockBuilder(ICommand::class)->getMock();
        $burnFuelCommand = $this->getMockBuilder(ICommand::class)->getMock();
        $checkFuelCommand = $this->getMockBuilder(ICommand::class)->getMock();

        $moveCommand->expects($this->once())->method('execute');
        $burnFuelCommand->expects($this->once())->method('execute')->willThrowException(new Exception());
        $checkFuelCommand->expects($this->never())->method('execute');

        $this->expectException(MacroCommandException::class);

        (new CheckFuelBurnFuelAndMoveCommand($moveCommand, $burnFuelCommand, $checkFuelCommand))->execute();
    }
}
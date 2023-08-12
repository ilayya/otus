<?php

use PHPUnit\Framework\TestCase;

class CheckFuelCommandTest extends TestCase
{
    public function testPositiveFuel(): void
    {
        $uObject = $this->getMockBuilder(UObject::class)->getMock();
        $uObject->expects($this->once())->method('getProperty')->willReturn(1);

        (new CheckFuelComamnd($uObject))->execute();
    }

    public function testNegativeFuel(): void
    {
        $uObject = $this->getMockBuilder(UObject::class)->getMock();
        $uObject->expects($this->once())->method('getProperty')->willReturn(0);

        $this->expectException(MacroCommandException::class);

        (new CheckFuelComamnd($uObject))->execute();
    }
}
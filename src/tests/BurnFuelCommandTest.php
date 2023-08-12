<?php

use PHPUnit\Framework\TestCase;

class BurnFuelCommandTest extends TestCase
{
    public function testBurnFuel(): void
    {
        $uObject = $this->getMockBuilder(UObject::class)->getMock();
        $uObject->method('getProperty')->willReturn(10);

        $uObject->expects($this->once())->method('setProperty')->with('fuelLevel', 0);

        (new BurnFuelCommand($uObject))->execute();
    }
}
<?php

use PHPUnit\Framework\TestCase;

class MovableAdapterTest extends TestCase
{
    public function testVelocityNotBind()
    {
        $this->expectException(LogicException::class);

        $moveMock = $this->getMockBuilder(UObject::class)
            ->disableOriginalConstructor()
            ->getMock();


        $moveMock->method('getProperty')->willReturnCallback(fn($property) => match ($property) {
            'Direction', 'DirectionsNumber' => 1,
            'Velocity' => null,
        });

        (new MovableAdapter($moveMock))->getVelocity();
    }

    public function testDirectionNotBind()
    {
        $this->expectException(LogicException::class);

        $moveMock = $this->getMockBuilder(UObject::class)
            ->disableOriginalConstructor()
            ->getMock();


        $moveMock->method('getProperty')->willReturnCallback(fn($property) => match ($property) {
            'Velocity', 'DirectionsNumber' => 1,
            'Direction' => null,
        });

        (new MovableAdapter($moveMock))->getVelocity();
    }

    public function testDirectionsNumberNotBind()
    {
        $this->expectException(LogicException::class);

        $moveMock = $this->getMockBuilder(UObject::class)
            ->disableOriginalConstructor()
            ->getMock();


        $moveMock->method('getProperty')->willReturnCallback(fn($property) => match ($property) {
            'Velocity', 'Direction' => 1,
            'DirectionsNumber' => null,
        });

        (new MovableAdapter($moveMock))->getVelocity();
    }
}
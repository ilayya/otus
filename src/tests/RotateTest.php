<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class RotateTest extends TestCase
{
    public function testNormalRotate()
    {
        $rotableMock = $this->getMockBuilder(RotableAdapter::class)
            ->disableOriginalConstructor()
            ->getMock();

        $rotableMock->method('getDirection')->willReturn(2);
        $rotableMock->method('getDirectionsNumber')->willReturn(16);
        $rotableMock->method('getAngularVelocity')->willReturn(5);

        $rotableMock->expects($this->once())->method('setDirection')->with(7);

        (new Rotate($rotableMock))->execute();
    }

    public function testRotateOverZero()
    {
        $rotableMock = $this->getMockBuilder(RotableAdapter::class)
            ->disableOriginalConstructor()
            ->getMock();

        $rotableMock->method('getDirection')->willReturn(15);
        $rotableMock->method('getDirectionsNumber')->willReturn(16);
        $rotableMock->method('getAngularVelocity')->willReturn(5);

        $rotableMock->expects($this->once())->method('setDirection')->with(4);

        (new Rotate($rotableMock))->execute();
    }
}
<?php

use PHPUnit\Framework\TestCase;

class MoveTest extends TestCase
{
    public function testMove()
    {
        $adapterMock = $this->getMockBuilder(MovableAdapter::class)
            ->disableOriginalConstructor()
            ->getMock();

        $adapterMock->method('getPosition')->willReturn(new Vector(12, 5));
        $adapterMock->method('getVelocity')->willReturn(new Vector(-7, 3));
        $adapterMock->expects($this->once())->method('setPosition')->with(new Vector(5, 8));

        (new Move($adapterMock))->execute();
    }
}
<?php

use PHPUnit\Framework\TestCase;

class IoCTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testScopes(): void
    {
        $scopes = $this
            ->getMockBuilder(Scopes::class)
            ->getMock();

        $scopes->expects($this->once())->method('createScope')->with('create');
        $scopes->expects($this->once())->method('setCurrentScope')->with('current');

        $container = new IoC($scopes);

        $this->assertTrue($container->resolve(IoC::SCOPES_NEW, 'create'));
        $this->assertTrue($container->resolve(IoC::SCOPES_CURRENT, 'current'));
    }
}
<?php

use PHPUnit\Framework\TestCase;

class ScopesTest extends TestCase
{
    public function testScopes(): void
    {
        $scopes = new Scopes();

        $scopes->createScope('scope');
        $scopes->setCurrentScope('scope');
        $this->assertSame(Scope::class, $scopes->getCurrentScope()::class);
    }

    public function testNoScope(): void
    {
        $this->expectException(IoCException::class);

        $scopes = new Scopes();
        $scopes->setCurrentScope('scope');
    }
}